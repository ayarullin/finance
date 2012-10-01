<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'bill-index-form',
    'enableAjaxValidation'=>false,
)); ?>

    <?php /** @var CActiveForm $form */ ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'category_id'); ?>
        <?php echo $form->listBox($model, 'category_id', $categoryNames, array('size' => 1)) ?>
        <?php echo $form->error($model,'category_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'sum'); ?>
        <?php echo $form->textField($model,'sum'); ?>
        <?php echo $form->error($model,'sum'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textField($model,'description'); ?>
        <?php echo $form->error($model,'description'); ?>
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
        <td><?= $bill->description ?></td>
        <td><?= $categoryNames[$bill->category_id] ?></td>
    </tr>
<?php endforeach ?>
</table>
