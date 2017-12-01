<?php
/* @var $this ToponymyController */
/* @var $model Toponymy */

$this->breadcrumbs=array(
	'Toponymies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Toponymy', 'url'=>array('index')),
	array('label'=>'Create Toponymy', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#toponymy-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Toponymies</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'toponymy-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'current_name',
		'ancient_name',
		'start_chronology',
		'end_chronology',
		'start_year',
		/*
		'end_year',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
