<?php
/* @var $this RelationsController */
/* @var $model Relations */
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
		<?php echo $form->label($model,'relations'); ?>
		<?php echo $form->textField($model,'relations',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'author_1'); ?>
		<?php echo $form->textField($model,'author_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'author_2'); ?>
		<?php echo $form->textField($model,'author_2'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->