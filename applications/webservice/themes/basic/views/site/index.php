<?php
$this->breadcrumbs=array(
	'Materials',
);

$this->menu=array(
	array('label'=>'Create Material', 'url'=>array('create')),
	array('label'=>'Manage Material', 'url'=>array('admin')),
);
?>

<div class="row">
    
    <?php $this->renderPartial('_filters', array('model'=>$model)) ?>
    <h1>Материалы</h1>
<div class="span7"    


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->search(),
	'itemView'=>'_view',
        "sortableAttributes"=>array(
        'title',
        'created'=>'Time',
            //"itemsCssClass"=>"span7"
    ),
)); ?>

</div>
</div>
