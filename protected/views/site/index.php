<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'bill-index-form',
    'enableAjaxValidation'=>false,
)); ?>

    <?php /** @var CActiveForm $form */ ?>

    <?php echo $form->errorSummary($billModel); ?>

    <div class="row">
        <?php echo $form->labelEx($billModel,'category_id'); ?>
        <?php echo $form->listBox($billModel, 'category_id', $categoryNames, array('size' => 1)) ?>
        <?php echo $form->error($billModel,'category_id'); ?>


        <?php echo $form->textField($categoryModel, 'name') ?>
        <?php echo $form->error($categoryModel,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($billModel,'sum'); ?>
        <?php echo $form->textField($billModel,'sum'); ?>
        <?php echo $form->error($billModel,'sum'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($billModel,'date_time'); ?>
        <?php echo $form->textField($billModel,'date_time'); ?>
        <?php echo $form->error($billModel,'date_time'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($billModel,'description'); ?>
        <?php echo $form->textField($billModel,'description'); ?>
        <?php echo $form->error($billModel,'description'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Send'); ?>
    </div>

<?php $this->endWidget(); ?>

</div>

<table class="bill-table">
<?php foreach($bills as $bill): ?>
    <tr>
        <td><?= $bill->bill_id ?></td>
        <td><?= $bill->sum ?></td>
	<td><?= $bill->date_time ?></td>
        <td><?= $bill->description ?></td>
        <td><?= $categoryNames[$bill->category_id] ?></td>
    </tr>
<?php endforeach ?>
</table>
