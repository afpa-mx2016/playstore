<?php

namespace PlayList\Model;
/**
 * Description of newPHPClass
 *
 * @author lionel
 */
class Track {
    //put your code here
  private $id;
  private $title;
  private $duration;
  private $author;
  
//  function __construct($id, $title, $duration, $author) {
//      $this->id = $id;
//      $this->title = $title;
//      $this->duration = $duration;
//      $this->author = $author;
//  }

  
  function getId() {
      return $this->id;
  }

  function getTitle() {
      return $this->title;
  }

  function getDuration() {
      return $this->duration;
  }

  function getAuthor() {
      return $this->author;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setTitle($title) {
      $this->title = $title;
  }

  function setDuration($duration) {
      $this->duration = $duration;
  }

  function setAuthor($author) {
      $this->author = $author;
  }


  
    
}
