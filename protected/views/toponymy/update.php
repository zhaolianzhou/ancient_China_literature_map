<?php
/* @var $this ToponymyController */
/* @var $model Toponymy */

$this->breadcrumbs=array(
	'Toponymies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Toponymy', 'url'=>array('index')),
	array('label'=>'Create Toponymy', 'url'=>array('create')),
	array('label'=>'View Toponymy', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Toponymy', 'url'=>array('admin')),
);
?>

<h1>Update Toponymy <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>