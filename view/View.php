<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayList\View;

/**
 * Description of View
 *
 * @author lionel
 */
class View {
    
    private $viewTemplate;
    
    function __construct($viewFileName){
        //if (file_exists(dirname(__FILE__).'/'.$viewFileName)) {
            $this->viewTemplate = $viewFileName;
        //}
    }
    
    function render($data){
        
        require(dirname(__FILE__).'/'.$this->viewTemplate.'.php');
    }
}
    

