<?php
/* @var $this RelationsController */
/* @var $model Relations */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'relations-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'relations'); ?>
		<?php echo $form->textField($model,'relations',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'relations'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_1'); ?>
		<?php echo $form->textField($model,'author_1'); ?>
		<?php echo $form->error($model,'author_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_2'); ?>
		<?php echo $form->textField($model,'author_2'); ?>
		<?php echo $form->error($model,'author_2'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->