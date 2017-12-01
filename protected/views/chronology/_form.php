<?php
/* @var $this ChronologyController */
/* @var $model Chronology */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'chronology-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'dynasty'); ?>
		<?php echo $form->textField($model,'dynasty',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'dynasty'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reign_title'); ?>
		<?php echo $form->textField($model,'reign_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'reign_title'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model,'duration'); ?>
		<?php echo $form->error($model,'duration'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->