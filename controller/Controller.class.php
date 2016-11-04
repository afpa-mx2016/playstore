<?php

namespace PlayList\Controller;


include(dirname(__FILE__).'/IController.php');
//include('view/View.php');

/**
 * Description of Controller
 *
 * @author lionel
 */
abstract class Controller implements \PlayList\Controller\IController {
    
    
    protected $errors="";
    protected $current_userid;
    protected $current_username;
      
   
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
    
    function getCurrentUsername() {
        return $this->current_username;
    }

    function setCurrentUsername($current_username) {
        $this->current_username = $current_username;
    }

    
    public abstract function run();

}
