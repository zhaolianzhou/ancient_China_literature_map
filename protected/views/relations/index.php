<?php
/* @var $this RelationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Relations',
);

$this->menu=array(
	array('label'=>'Create Relations', 'url'=>array('create')),
	array('label'=>'Manage Relations', 'url'=>array('admin')),
);
?>

<h1>Relations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
