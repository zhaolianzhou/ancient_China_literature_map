<?php
/* @var $this ChronologyController */
/* @var $model Chronology */
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
		<?php echo $form->label($model,'dynasty'); ?>
		<?php echo $form->textField($model,'dynasty',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reign_title'); ?>
		<?php echo $form->textField($model,'reign_title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_year'); ?>
		<?php echo $form->textField($model,'start_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_year'); ?>
		<?php echo $form->textField($model,'end_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'duration'); ?>
		<?php echo $form->textField($model,'duration'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->