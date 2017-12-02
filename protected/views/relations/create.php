<?php
/* @var $this RelationsController */
/* @var $model Relations */

$this->breadcrumbs=array(
	'Relations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Relations', 'url'=>array('index')),
	array('label'=>'Manage Relations', 'url'=>array('admin')),
);
?>

<h1>Create Relations</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>