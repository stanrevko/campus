<?php
$filterTables = FiltersHelper::getTables();
?>
<div class="span4  pull-left sidebar">
    <div>
<h3>Фільтри </h3>    
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'material-form',
        'enableAjaxValidation' => false,
        'method' => 'get'
            ));
    ?>
    <?php echo CHtml::activeDropDownList($model, 'term', FiltersHelper::getTerms(), array('empty' => 'Виберіть семестр')); ?>
    <?php echo CHtml::activeDropDownList($model, 'subj_id', CHtml::listData($filterTables['subject'], 'id', 'title'), array('empty' => 'Виберіть предмет')); ?>
    <?php echo CHtml::activeDropDownList($model, 'teacher_id', CHtml::listData($filterTables['teacher'], 'id', 'name'), array('empty' => 'Виберіть препода')); ?>
    <?php echo CHtml::activeDropDownList($model, 'type_id', CHtml::listData($filterTables['type'], 'id', 'title'), array('empty' => 'Виберіть тип')); ?>
    <?php echo CHtml::activeDropDownList($model, 'kind_id', CHtml::listData($filterTables['kind'], 'id', 'title'), array('empty' => 'Виберіть вид')); ?>    
 <?php echo CHtml::activeDropDownList($model, 'year', FiltersHelper::getYears(), array('empty' => 'Виберіть рік')); ?>    
	<?php echo CHtml::activeDropDownList($model, 'state', FiltersHelper::getStates(), array('empty' => 'Виберіть статус')); ?>    
    <div class="row-fluid">	
<?php echo CHtml::submitButton('Фільтрувати', array('class' => 'btn btn-primary')); ?>
    </div>	
<?php $this->endWidget(); ?>
</div>
    </div>     