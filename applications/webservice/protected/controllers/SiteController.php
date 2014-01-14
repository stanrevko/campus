<?php
 class SiteController extends CController{
    public $layout = '//layouts/main';
    
     public function actionIndex(){
       
       $this->render('index');
     }
 }

