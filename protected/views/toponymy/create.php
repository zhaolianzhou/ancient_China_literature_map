<?php
/* @var $this ToponymyController */
/* @var $model Toponymy */

$this->breadcrumbs=array(
	'Toponymies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Toponymy', 'url'=>array('index')),
	array('label'=>'Manage Toponymy', 'url'=>array('admin')),
);
?>

<h1>Create Toponymy</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>