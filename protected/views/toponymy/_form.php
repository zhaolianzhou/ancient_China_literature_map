<?php
/* @var $this ToponymyController */
/* @var $model Toponymy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'toponymy-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'current_name'); ?>
		<?php echo $form->textField($model,'current_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'current_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ancient_name'); ?>
		<?php echo $form->textField($model,'ancient_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ancient_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_chronology'); ?>
		<?php echo $form->textField($model,'start_chronology'); ?>
		<?php echo $form->error($model,'start_chronology'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_chronology'); ?>
		<?php echo $form->textField($model,'end_chronology'); ?>
		<?php echo $form->error($model,'end_chronology'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_year'); ?>
		<?php echo $form->textField($model,'start_year'); ?>
		<?php echo $form->error($model,'start_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_year'); ?>
		<?php echo $form->textField($model,'end_year'); ?>
		<?php echo $form->error($model,'end_year'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->