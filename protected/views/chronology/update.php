<?php
/* @var $this ChronologyController */
/* @var $model Chronology */

$this->breadcrumbs=array(
	'Chronologies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Chronology', 'url'=>array('index')),
	array('label'=>'Create Chronology', 'url'=>array('create')),
	array('label'=>'View Chronology', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Chronology', 'url'=>array('admin')),
);
?>

<h1>Update Chronology <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>