<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayList\Controller;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../dao/UserStore.php');
include(dirname(__FILE__).'/../view/LoginFormView.php');


/**
 * Description of LoginFormHandler
 *
 * @author lionel
 */
class LoginFormHandler extends Controller{  
    

    public function run() {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $passwd = filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_STRING);
        
        
        
        if ($username && $passwd){
            
            
            $user = \PlayList\Dao\UserStore::getUser($username);
            if (!$user){
                $this->errors= "wrong password or username";
            }else{

                 if (!password_verify($passwd, $user->getPasswd())){
                     
                     $this->errors= "wrong password or username";


                }else{
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['current_user'] = $user->getUsername();

                    header("Location: /index.php?action=TrackList",true,303);
                    
                }
                
                
                
            }
            
           
            
           
        }else{
            $this->errors = 'username and password are mandatory';
        }
        
        if ($this->hasErrors()){
            //rebuild the form
            $view = new \PlayList\View\LoginFormView(); 
            //$view->setContent(new Track());
            $view->render(array("errors"=> $this->errors)); 
        }
    }

    //put your code here
}
