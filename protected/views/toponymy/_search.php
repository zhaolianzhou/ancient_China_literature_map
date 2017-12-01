<?php
/* @var $this ToponymyController */
/* @var $model Toponymy */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_name'); ?>
		<?php echo $form->textField($model,'current_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ancient_name'); ?>
		<?php echo $form->textField($model,'ancient_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_chronology'); ?>
		<?php echo $form->textField($model,'start_chronology'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_chronology'); ?>
		<?php echo $form->textField($model,'end_chronology'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_year'); ?>
		<?php echo $form->textField($model,'start_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_year'); ?>
		<?php echo $form->textField($model,'end_year'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->