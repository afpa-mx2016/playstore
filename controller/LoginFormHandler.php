<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayStore\Controller;

use \PlayStore\Model\Dao\UserStore;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../model/dao/UserStore.php');



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
            
            
            $user = UserStore::getUser($username);
            if (!$user){
                $this->errors = "wrong password or username";
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

                    header("Location: /index.php?action=PlayList",true,303);
                    
                }
                
                
                
            }
            
           
            
           
        }else{
            $this->errors = 'username and password are mandatory';
        }
        
        if ($this->hasErrors()){
            //rebuild the form
            $this->render('LoginFormView', array("errors"=> $this->errors));

        }
    }

    //put your code here
}
