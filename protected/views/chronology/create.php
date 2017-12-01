<?php
/* @var $this ChronologyController */
/* @var $model Chronology */

$this->breadcrumbs=array(
	'Chronologies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Chronology', 'url'=>array('index')),
	array('label'=>'Manage Chronology', 'url'=>array('admin')),
);
?>

<h1>Create Chronology</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>