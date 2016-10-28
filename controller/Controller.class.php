<?php

namespace PlayList\Controller;


include(dirname(__FILE__).'/IController.php');

/**
 * Description of Controller
 *
 * @author lionel
 */
abstract class Controller implements \PlayList\Controller\IController {
    
    
    protected $errors;
    
    public function hasErrors(){
        return ($this->errors!=null);
    }
    public function getErrors(){
        return $this->errors;
    }

    public abstract function run();

}
