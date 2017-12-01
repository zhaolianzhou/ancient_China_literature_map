<?php
/* @var $this LiteratureController */
/* @var $model Literature */

$this->breadcrumbs=array(
	'Literatures'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Literature', 'url'=>array('index')),
	array('label'=>'Create Literature', 'url'=>array('create')),
	array('label'=>'Update Literature', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Literature', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Literature', 'url'=>array('admin')),
);
?>

<h1>View Literature #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'author',
		'content',
		'written_time',
		'position',
		'type',
	),
)); ?>
