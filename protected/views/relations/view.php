<?php
/* @var $this RelationsController */
/* @var $model Relations */

$this->breadcrumbs=array(
	'Relations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Relations', 'url'=>array('index')),
	array('label'=>'Create Relations', 'url'=>array('create')),
	array('label'=>'Update Relations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Relations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Relations', 'url'=>array('admin')),
);
?>

<h1>View Relations #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'relations',
		'author_1',
		'author_2',
	),
)); ?>
