<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayStore\Model\Entities;

/**
 * Description of User
 *
 * @author lionel
 */
class User {
    private $id;
    private $username;
    private $passwd;
    private $email;
    
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

        
    function getUsername() {
        return $this->username;
    }

    function getPasswd() {
        return $this->passwd;
    }

    function getEmail() {
        return $this->email;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPasswd($passwd) {
        $this->passwd = $passwd;
    }

    function setEmail($email) {
        $this->email = $email;
    }


}
