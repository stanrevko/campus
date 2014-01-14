<?php
 class SiteController extends FrontController{
   // public $layout = '//layouts/main';
    
     public function actionIndex(){
       $this->render('index');
     }
     
       public function actionTest(){
       $this->render('index');
     }
 }

