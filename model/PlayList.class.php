<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayList\Model;


/**
 * Description of PlayList
 *
 * @author lionel
 */
class PlayList {
    
    
    private $id;
    private $name;
    private $description;
    private $picture;
    private $tracks;
    
    function getId() {
        return $this->id;
    }
    
    function getPicture() {
        return $this->picture;
    }

    function setPicture($picture) {
        $this->picture = $picture;
    }

        
    
    function getName() {
        return $this->name;
    }

    function getTracks() {
        return $this->tracks;
    }
    
    function getDescription() {
        return $this->description;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    
    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setTracks($tracks) {
        $this->tracks = $tracks;
    }


    
    
}

