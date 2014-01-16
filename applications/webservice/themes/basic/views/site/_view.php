
<article class="post-row article">
    <h3>
        <a href="<?php echo $data->id; ?>"> <?php echo CHtml::encode($data->title);?></a>
        <small>Опублікував  <?php echo $data->created;?></small>
    </h3>
     <?php /* <img src="http://placehold.it/650x300" class="thumbnail bottom-space"> */?>
   <p>
       <?php $this->widget('bootstrap.widgets.TbBadge', array(
    'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>FiltersHelper::$_tables['subject'][$data->subj_id]["title"],
)); ?>
              <?php $this->widget('bootstrap.widgets.TbBadge', array(
    'type'=>'warning', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>$data->term,
)); ?>
       
        <?php $this->widget('bootstrap.widgets.TbBadge', array(
    'type'=>'important', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>$data->kind_id,
)); ?>
       
               <?php $this->widget('bootstrap.widgets.TbBadge', array(
    'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>$data->type_id,
)); ?>
       
                <?php $this->widget('bootstrap.widgets.TbBadge', array(
    'type'=>'inverse', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>$data->year,
)); ?>
    
    </p>  
    
    <p>
       <?php echo CHtml::encode($data->desc);?>
    </p>   
</article>