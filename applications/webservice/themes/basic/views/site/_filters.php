<?php
$filterTables = FiltersHelper::getTables();
//dd(CHtml::listData($filterTables['subject'], 'id','title'));
// масив семестров




?>
<div class="span4  pull-left sidebar">
<h3>Фильтр матералов </h3>    
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'material-form',
        'enableAjaxValidation' => false,
        'method' => 'get'
            ));
    ?>
    <?php echo CHtml::activeDropDownList($model, 'term', FiltersHelper::getTerms(), array('empty' => 'Выберите семестр')); ?>
        <?php echo CHtml::activeDropDownList($model, 'subj_id', CHtml::listData($filterTables['subject'], 'id', 'title'), array('empty' => 'Выберите предмет')); ?>
        <?php echo CHtml::activeDropDownList($model, 'teacher_id', CHtml::listData($filterTables['teacher'], 'id', 'name'), array('empty' => 'Выберите препода')); ?>
    <?php echo CHtml::activeDropDownList($model, 'type_id', CHtml::listData($filterTables['type'], 'id', 'title'), array('empty' => 'Выберите тип')); ?>
    <?php echo CHtml::activeDropDownList($model, 'kind_id', CHtml::listData($filterTables['kind'], 'id', 'title'), array('empty' => 'Выберите вид')); ?>    
 <?php echo CHtml::activeDropDownList($model, 'year', FiltersHelper::getYears(), array('empty' => 'Выберите год')); ?>    
    <div class="row-fluid">	
<?php echo CHtml::submitButton('Фильтровать', array('class' => 'btn btn-primary')); ?>
    </div>	
<?php $this->endWidget(); ?>
</div>     