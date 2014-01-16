<?php $this->beginContent('/layouts/main'); ?>
<div class="container">
    <div id="content"> 
        <div class="row">
            <div class="span4  pull-left sidebar">
                <div id="sidebar">
                    <?php
                    $this->beginWidget('zii.widgets.CPortlet', array(
                        'title' => 'Operations',
                        //'type'=>'list',
                     
                    ));
                    $this->widget('core.extensions.bootstrap.widgets.TbMenu', array(
                        'items' => $this->menu,
                        'htmlOptions' => array('class' => 'operations'),
                        'stacked'=>true, // whether this is a stacked menu
                    ));
                    $this->endWidget();
                    ?>
                </div><!-- sidebar -->
            </div>
            <div class="span7">
                <?php echo $content; ?>
            </div>    
        </div>
    </div><!-- content -->   
</div>
<?php $this->endContent(); ?>