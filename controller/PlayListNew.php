<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayStore\Controller;

use \PlayStore\Model\Track as Track;


include(dirname(__FILE__).'/Controller.class.php');




class PlayListNew extends Controller {
    
    public function run($params){
        
        $view = new \PlayStore\View\View('PlayListFormView'); 
        $view->render(NULL); //we pass a fake object 
    }
}


