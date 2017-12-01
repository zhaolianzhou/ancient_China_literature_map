<?php
/* @var $this LiteratureController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Literatures',
);

$this->menu=array(
	array('label'=>'Create Literature', 'url'=>array('create')),
	array('label'=>'Manage Literature', 'url'=>array('admin')),
);
?>

<h1>Literatures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
