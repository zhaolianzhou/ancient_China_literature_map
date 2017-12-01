<?php
/* @var $this ToponymyController */
/* @var $data Toponymy */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_name')); ?>:</b>
	<?php echo CHtml::encode($data->current_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ancient_name')); ?>:</b>
	<?php echo CHtml::encode($data->ancient_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_chronology')); ?>:</b>
	<?php echo CHtml::encode($data->start_chronology); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_chronology')); ?>:</b>
	<?php echo CHtml::encode($data->end_chronology); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_year')); ?>:</b>
	<?php echo CHtml::encode($data->start_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_year')); ?>:</b>
	<?php echo CHtml::encode($data->end_year); ?>
	<br />


</div>