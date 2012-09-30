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

        $bills = $billModel->findAll();

        if(isset($_POST['Bill']))
        {
            $billModel->attributes=$_POST['Bill'];
            if($billModel->validate())
            {
                $billModel->save();
                $this->redirect('/site/index');
            }
        }
        $this->render('index',array('model'=>$billModel, 'bills' => $bills, 'categoryNames' => $categoryNames));
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

    public function actionTest()
    {
        echo 'asdfasdf';
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