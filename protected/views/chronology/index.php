<?php
/* @var $this ChronologyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Chronologies',
);

$this->menu=array(
	array('label'=>'Create Chronology', 'url'=>array('create')),
	array('label'=>'Manage Chronology', 'url'=>array('admin')),
);
?>

<h1>Chronologies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
