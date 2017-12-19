<?php
/* @var $this AuthorController */
/* @var $model Author */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'author-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php echo $form->textField($model,'dob'); ?>
		<?php echo $form->error($model,'dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dod'); ?>
		<?php echo $form->textField($model,'dod'); ?>
		<?php echo $form->error($model,'dod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>


	<div class="row">
        <?php echo $form->labelEx($model,'native_place'); ?>
        <?php echo $form->textField($model,'native_place',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'native_place'); ?>
  </div>

  <div class="row">
      <?php echo $form->labelEx($model,'courtesy_name'); ?>
      <?php echo $form->textField($model,'courtesy_name',array('size'=>60,'maxlength'=>255)); ?>
      <?php echo $form->error($model,'courtesy_name'); ?>
  </div>

  <div class="row">
      <?php echo $form->labelEx($model,'pseudonym'); ?>
      <?php echo $form->textField($model,'pseudonym',array('size'=>60,'maxlength'=>255)); ?>
      <?php echo $form->error($model,'pseudonym'); ?>
  </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->