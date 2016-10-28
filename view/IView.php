<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayList\View;

/**
 * Description of IView
 *
 * @author lionel
 */
interface IView {
    
   
    public function setError($error);     

    public function setContent($content);
    
    public function render();
}
