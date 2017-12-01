<?php
/* @var $this ChronologyController */
/* @var $model Chronology */

$this->breadcrumbs=array(
	'Chronologies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Chronology', 'url'=>array('index')),
	array('label'=>'Create Chronology', 'url'=>array('create')),
	array('label'=>'Update Chronology', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Chronology', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Chronology', 'url'=>array('admin')),
);
?>

<h1>View Chronology #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dynasty',
		'reign_title',
		'start_year',
		'end_year',
		'duration',
	),
)); ?>
