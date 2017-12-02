<?php
/* @var $this RelationsController */
/* @var $data Relations */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relations')); ?>:</b>
	<?php echo CHtml::encode($data->relations); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author_1')); ?>:</b>
	<?php echo CHtml::encode($data->author_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author_2')); ?>:</b>
	<?php echo CHtml::encode($data->author_2); ?>
	<br />


</div>