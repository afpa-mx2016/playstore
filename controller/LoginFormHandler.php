<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayStore\Controller;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../dao/UserStore.php');



/**
 * Description of LoginFormHandler
 *
 * @author lionel
 */
class LoginFormHandler extends Controller{  
    

    public function run($params) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $passwd = filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_STRING);
        
        
        
        if ($username && $passwd){
            
            
            $user = \PlayStore\Dao\UserStore::getUser($username);
            if (!$user){
                $this->errors= "wrong password or username";
            }else{

                 if (!password_verify($passwd, $user->getPasswd())){
                     
                     $this->errors= "wrong password or username";


                }else{
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['current_user'] = $user->getUsername();
                    //fake admin role
                    $_SESSION['isadmin'] = false;
                    if ($user->getUsername()=='admin'){
                        $_SESSION['isadmin'] = true;
                    }
                      //TODO redirect where user's clicked
                    header("Location: /playList",true,303);
                    
                }
                
                
                
            }
            
           
            
           
        }else{
            $this->errors = 'username and password are mandatory';
        }
        
        if ($this->hasErrors()){
            //rebuild the form
            $view = new \PlayStore\View\View('LoginFormView'); 
            //$view->setContent(new Track());
            $view->render(array("errors"=> $this->errors)); 
        }
    }

    //put your code here
}
