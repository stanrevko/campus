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
<div>Select a Background image: <a href='#' id='file-picker'>click here</a>
			<img src='' width='50%' id='selected-image' />
		</div>

		<!-- required div layout begins - 
			DO NOT INSERT NESTED INTO AN EXISTING FORM TAG. 
				ie: <FORM>..here?NO..</FORM> -->
		<div id='file-picker-viewer'>
			<div class='body'></div>
			<hr/>
			<div id='myuploader'>
				<label rel='pin'><b>Upload Files <img style='float: left;' src='/images/pin.png'></b></label>
				<br/>
				<div class='files'></div>
				<div class='progressbar'>
					<div style='float: left;'>Uploading your file(s), please wait...</div>
					<img style='float: left;' src='/images/progressbar.gif' />
					<div style='float: left; margin-right: 10px;'class='progress'></div>
					<img style='float: left;' class='canceljob' src='/images/delete.png' title='cancel the upload'/>
				</div>
			</div>
			<hr/>
			<button id='select_file' class='ok_button'>Select File(s)</button>
			<button id='delete_file' class='delete_button'>Delete Selected File(s)</button>
			<button id='close_window' class='cancel_button'>Close Window</button>
		</div>
		<!-- required div layout ends -->

		<hr/>
		Logger:<br/>
		<div id='logger'></div>
                
                    
<?php
		// the widget
			//
			 $this->widget('core.extensions.yiifilemanagerfilepicker.component.MyYiiFileManViewer'
			,array(
				// layout selectors:
				'launch_selector'=>'#file-picker',
				'list_selector'=>'#file-picker-viewer',
				'uploader_selector' => '#myuploader',
				// messages:
				'delete_confirm_message' => 'Confirm deletion ?',
				'select_confirm_message' => 'Confirm selected items ?',
				'no_selection_message' => 'You are required to select some file',
				// events:
				'onBeforeAction'=>"function(viewer,action,file_ids) { return true; }",
				'onAfterAction'=>"function(viewer,action,file_ids, ok, response) { 
					if(action == 'select'){ // actions: select | delete
						$.each(file_ids, function(i, item){ 
							$('#logger').append('file_id='+item.file_id 
								+ ', <img src=\''+item.url+'&size=full\'><br/>');
						});
					}
				}",
				// 'onBeforeLaunch'=>"function(_viewer){ }",
				'onClientSideUploaderError'=>
					"function(messages){ 
						$(messages).each(function(i,m){ 
							alert(m); 
						}); 
					}
				",
				'onClientUploaderProgress'=>"function(status, progress){
					// $('#logger').append('progress: '+status+' '+progress+'%<br/>');
				}",
			));
		?>