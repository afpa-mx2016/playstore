<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayStore\Controller;

include(dirname(__FILE__).'/Controller.class.php');




class Welcome extends Controller {
    
    public function run(){
        
        $this->render('WelcomeView'); //
    }
}
