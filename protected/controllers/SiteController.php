<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
        $billModel = new Bill();
        $categoryModel = new Category();

        $categoryNames = array();

        foreach ($categoryModel->findAll() as $category)
        {
            $categoryNames[$category->category_id] = $category->name;
        }

        $categoryNames[0] = '...or create new:';

        $bills = $billModel->findAll(array('order' => 'date_time DESC'));

	    $billModel->date_time = date('Y-m-d H:i:s');

        if(isset($_POST['Bill']))
        {
            $billModel->attributes=$_POST['Bill'];

            if (0 == $billModel->category_id)
            {
                $categoryModel->name = $_POST['Category']['name'];
                $categoryModel->save();

                $billModel->category_id = $categoryModel->category_id;
            }

            if($billModel->validate())
            {
                $billModel->save();
                $this->redirect('/site/index');
            }
        }
        $this->render('index',array('billModel'=>$billModel, 'categoryModel' => $categoryModel, 'bills' => $bills, 'categoryNames' => $categoryNames));
	}

	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error)
		{
			if (Yii::app()->request->isAjaxRequest)
			{
				echo $error['message'];
			}
			else
			{
				$this->render('error', $error);
			}
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
