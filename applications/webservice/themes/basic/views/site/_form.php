<div class="form">

<?php 
$filterTables = FiltersHelper::getTables();

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'material-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

        <?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'author_id'); ?>
		<?php echo $form->textField($model,'author_id'); ?>
		<?php echo $form->error($model,'author_id'); ?>
	</div>
*/?>
	<div class="row">
		<?php echo $form->labelEx($model,'teacher_id'); ?>
		<?php echo CHtml::activeDropDownList($model, 'teacher_id', CHtml::listData($filterTables['teacher'], 'id', 'name'), array('empty' => 'Виберіть викладача')); ?>
		<?php echo $form->error($model,'teacher_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subj_id'); ?>
		<?php echo CHtml::activeDropDownList($model, 'subj_id', CHtml::listData($filterTables['subject'], 'id', 'title'), array('empty' => 'Виберіть предмет')); ?>
		<?php echo $form->error($model,'subj_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo CHtml::activeDropDownList($model, 'type_id', CHtml::listData($filterTables['type'], 'id', 'title'), array('empty' => 'Виберіть тип')); ?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kind_id'); ?>
		<?php echo CHtml::activeDropDownList($model, 'kind_id', CHtml::listData($filterTables['kind'], 'id', 'title'), array('empty' => 'Виберіть вид')); ?>    
		<?php echo $form->error($model,'kind_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'term'); ?>
		<?php echo CHtml::activeDropDownList($model, 'term', FiltersHelper::getTerms(), array('empty' => 'Виберіть семестр')); ?>
		<?php echo $form->error($model,'term'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo CHtml::activeDropDownList($model, 'year', FiltersHelper::getYears(), array('empty' => 'Виберіть рік')); ?>    
		<?php echo $form->error($model,'year'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo CHtml::activeDropDownList($model, 'state', FiltersHelper::getStates(), array('empty' => 'Виберіть статус')); ?>    
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->