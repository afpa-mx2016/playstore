<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayStore\Controller;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../dao/PlayListStore.php');
/**
 * Description of PlayListFileUploadHandler
 *
 * @author lionel
 */
class PlayListFormHandler extends Controller{
    //put your code here
    public function run() {
        
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        
        $playList = new \PlayStore\Model\PlayList();
        $playList->setUser_id($this->getCurrentUserId());
        if (!$name){
            $this->errors .= "name is required\n";
        }else{
            $playList->setName($name);
            $playList->setDescription($description);

        }
        
        
        
        

        if (!empty($_FILES["myFile"])) {
            $myFile = $_FILES["myFile"];

            if ($myFile["error"] !== UPLOAD_ERR_OK) {
                $this->errors .= "An error occurred.";
                return;
            }

            // ensure a safe filename
            //$name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
            $fileInfo = pathinfo($myFile["name"]);
            $name = uniqid() . '.' . $fileInfo["extension"];
            

            // don't overwrite an exis$pictureting file
//            $i = 0;
//            $parts = pathinfo($name);
//            while (file_exists(UPLOAD_DIR . $name)) {
//                $i++;
//                $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
//            }

            // preserve file from temporary directory
            $success = move_uploaded_file($myFile["tmp_name"],
                UPLOAD_DIR . $name);
            if (!$success) { 
                $this->errors .= "<p>Unable to save file.</p>";
                return;
            }

            // set proper permissions on the new file
            chmod(UPLOAD_DIR . $name, 0644);
            
            $playList->setPicture($name);
        }
        
        //all required fields are ok
        if (!$this->hasErrors()){
            
            
            $ok = \PlayStore\Dao\PlayListStore::save($playList);
            
            
            if(!$ok){
                $this->errors .= "error while saving to database";
            }
            
        }
        
        if($this->hasErrors()){
             //replay form when error occurs
             $view = new \PlayStore\View\View('PlayListFormView'); 
             $view->render(
                array('object'=> $playList,
                       'errors'=> $this->errors));
        }else{
            header("Location: /index.php?action=PlayList",true,303);
        }

    }

}
