<?php

namespace PlayList\Controller;


include(dirname(__FILE__).'/IController.php');

/**
 * Description of Controller
 *
 * @author lionel
 */
abstract class Controller implements \PlayList\Controller\IController {
    
    
    protected $errors="";
    protected $current_userid;
      
   
    public function hasErrors(){
        return (!empty($this->errors));
    }
    public function getErrors(){
        return $this->errors;
    }
    
    public function setCurrentUserId($userid){
        $this->current_userid = $userid;
    }
    
     public function getCurrentUserId(){
       return $this->current_userid;
    }
    

    public abstract function run();

}
