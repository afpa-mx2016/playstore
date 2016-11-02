<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayList\Controller;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../view/WelcomeView.php');




class Welcome extends Controller {
    
    public function run(){
        
        $view = new \PlayList\View\WelcomeView(); 
        $view->render(NULL); //
    }
}
