<?php
/* @var $this ChronologyController */
/* @var $data Chronology */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dynasty')); ?>:</b>
	<?php echo CHtml::encode($data->dynasty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reign_title')); ?>:</b>
	<?php echo CHtml::encode($data->reign_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_year')); ?>:</b>
	<?php echo CHtml::encode($data->start_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_year')); ?>:</b>
	<?php echo CHtml::encode($data->end_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duration')); ?>:</b>
	<?php echo CHtml::encode($data->duration); ?>
	<br />


</div>