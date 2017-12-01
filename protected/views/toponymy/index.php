<?php
/* @var $this ToponymyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Toponymies',
);

$this->menu=array(
	array('label'=>'Create Toponymy', 'url'=>array('create')),
	array('label'=>'Manage Toponymy', 'url'=>array('admin')),
);
?>

<h1>Toponymies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
