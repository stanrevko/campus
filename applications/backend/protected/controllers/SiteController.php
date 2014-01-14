<?php

/**
 * @author    MobiDev Corporation
 * @license   http://mobidev.biz/backvendor_license
 * @link      http://mobidev.biz/backvendor
 */

class SiteController extends CBackendController
{
    public function init()
    {
        $this->reconfigureBackend();
        $this->reconfigureEntityParamsDictionary();
        $this->reconfigureAccessRules();
        return parent::init();
    }

    private function reconfigureBackend()
    {
        self::$configuration = CMap::mergeArray(parent::$configuration, array(
//                 some new parameters here
                ));
    }

    protected function reconfigureMenu()
    {
        if (is_object($this->model))
        {
            $this->additionalMenuItems = CMap::mergeArray($this->additionalMenuItems, array(
//                      additional menu items here
                    ));
        }
    }

    private function reconfigureEntityParamsDictionary()
    {
        self::$entityConfigDictionary = CMap::mergeArray(parent::$entityConfigDictionary, array(
//                  entity configurations here
					'material' => array( 'modelName' => 'Material',
						'linksBelongsToRelation' => array('teacher', 'subject','type','kind'),
						'notUseTitleOfRelation' => array('teacher', 'subject','type','kind'),
						'dropDown' => array( 
						'status' => array( 0 => 'waiting', 1 => 'published', -1 => 'Unpublished', -2 => 'deleted',), 
						),
						'datetime' => array('created','updated'),
						'selectable' => 0,
						),
					'teacher' => array( 'modelName' => 'Teacher', 'title'=>'name'),
					'file' => array( 'modelName' => 'File' ),
					'subject' => array( 'modelName' => 'Subject',
					//'title' => 'title',
					),
					'type' => array( 'modelName' => 'Type','title' => 'title', ),
					'kind' => array( 'modelName' => 'Kind','title' => 'title', ),
                ));
    }

    private function reconfigureAccessRules()
    {
        self::$accessRules = CMap::mergeArray(array(
                    array(
                        // additional access rules here
                    ),
                        ), parent::$accessRules);
    }
    
    protected function mainMenuTemplate()
    {
       return array(
          // array of entities, in exact order you want them to appear in the main menu 
		  'Docs'=>array(
			'material',	
			'teacher',
			'file',
			'subject',
			'type',
			'kind')
		  	 
       );
    }

}

?>