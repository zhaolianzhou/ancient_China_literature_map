<?php
/* @var $this LiteratureController */
/* @var $model Literature */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'literature-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
      <?php echo $form->error($model,'author'); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
        'name' => 'author_id',
        'id' => 'autocomplete_author_id',
        'source' => "js:function(request, response) {
                    $.ajax({
							'url': '".Yii::app()->createUrl('/literature/authorList')."',
							'type':'GET',
							'data':{
								'term': request.term,
							},
							'success': function(data) {
								data = $.parseJSON(data);
								response(data);
							},
						});
              }",
        'options' => array(
            'select' => "js:function(event, ui) {
                                removeSelectedAuthor();
                                addItem('selected_author_wrapper', ui);   
                                return false;
                                }",
            'response' => 'js:function(event, ui){
                          if(ui.content.length === 0){
                            $("#no_author_result").show();
                          } else {
                            $("#no_author_result").hide();
                          }
                        }',
            ),
        'htmlOptions' => array(
            'placeholder' => 'search Roles',
        ),
    ));
    ?>
    <div id="selected_author_wrapper" class=" field-row">
      <div class="column selected_author end alert-box">
          <span class="name">
            <?php echo isset($model->author) ? $model->author->first_name : ''; ?>
          </span>
        <a href="javascript:void(0)" class="remove right" style="color:blue">remove</a>
      </div>
        <?php echo CHtml::hiddenField('Literature[author_id]'
            , $model->author, array('class' => 'hidden_id')); ?>
    </div>
    <div id="no_author_result" class=" field-row hide">
      <div class="large-offset-4  column selected_gp end">No result
      </div>
    </div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'written_time'); ?>
		<?php echo $form->textField($model,'written_time'); ?>
		<?php echo $form->error($model,'written_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position'); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
  function removeSelectedAuthor() {
    $('#no_author_result').hide();
    $('.selected_author span.name').text('');
    $('#selected_author_wrapper').hide();
    $('#Contact_author_id').val('-1');
  }

  function addItem(wrapper_id, ui){
    var $wrapper = $('#' + wrapper_id);
    $wrapper.find('span.name').text(ui.item.label);
    $wrapper.show();
    $wrapper.find('.hidden_id').val(ui.item.id);
  }

  $(document).ready(function () {
    $('#selected_author_wrapper').on('click', '.remove', function () {
      removeSelectedAuthor();
    });
  });
</script>