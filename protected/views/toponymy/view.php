<?php
/* @var $this ToponymyController */
/* @var $model Toponymy */

$this->breadcrumbs=array(
	'Toponymies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Toponymy', 'url'=>array('index')),
	array('label'=>'Create Toponymy', 'url'=>array('create')),
	array('label'=>'Update Toponymy', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Toponymy', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Toponymy', 'url'=>array('admin')),
);
?>

<h1>View Toponymy #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'current_name',
		'ancient_name',
		'start_chronology',
		'end_chronology',
		'start_year',
		'end_year',
	),
)); ?>
