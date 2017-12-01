<?php
/* @var $this LiteratureController */
/* @var $model Literature */

$this->breadcrumbs=array(
	'Literatures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Literature', 'url'=>array('index')),
	array('label'=>'Manage Literature', 'url'=>array('admin')),
);
?>

<h1>Create Literature</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>