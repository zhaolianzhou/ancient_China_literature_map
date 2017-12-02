<?php
/* @var $this RelationsController */
/* @var $model Relations */

$this->breadcrumbs=array(
	'Relations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Relations', 'url'=>array('index')),
	array('label'=>'Create Relations', 'url'=>array('create')),
	array('label'=>'View Relations', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Relations', 'url'=>array('admin')),
);
?>

<h1>Update Relations <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>