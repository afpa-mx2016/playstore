<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayList\Dao;

require(dirname(__FILE__).'/DB.php');
require(dirname(__FILE__).'/../model/PlayList.class.php');

use \PlayList\Model\PlayList as PlayList;

use \PDO as PDO;

/**
 * Description of PlayListStore
 *
 * @author lionel
 */
class PlayListStore {
   
    static function  getPlayLists($userid){
       // connection BDD
	$pdo = DB::getConnection();
	
			
	$stmt = $pdo->prepare("SELECT * FROM playlist WHERE user_id = :user_id");
        $stmt->bindValue(':user_id', $userid);
        $stmt->execute();

	$playLists = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, PlayList::class);
		   
	return $playLists;
          
    }
}
