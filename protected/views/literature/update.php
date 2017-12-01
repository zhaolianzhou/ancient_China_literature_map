<?php
/* @var $this LiteratureController */
/* @var $model Literature */

$this->breadcrumbs=array(
	'Literatures'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Literature', 'url'=>array('index')),
	array('label'=>'Create Literature', 'url'=>array('create')),
	array('label'=>'View Literature', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Literature', 'url'=>array('admin')),
);
?>

<h1>Update Literature <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>