<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayList\View;

include(dirname(__FILE__).'/IView.php');

/**
 * Description of Welcome
 *
 * @author lionel
 */
class WelcomeView implements IView {
    

    function render($data){
       ?>

<h1>Hi there, welcome to myPlayStore</h1>


       <?php
    }
    
}
