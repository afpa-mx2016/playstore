<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayList\Dao;

require_once(dirname(__FILE__).'/DB.php');

require_once(dirname(__FILE__).'/../model/PlayList.class.php');
require_once(dirname(__FILE__).'/../model/Track.class.php');

use \PlayList\Model\PlayList as PlayList;


use \PDO as PDO;

/**
 * Description of PlayListStore
 *
 * @author lionel
 */
class PlayListStore {
   
       /**
    *
    *@return last inserted id or -1 if any problem
    **/
    static function save(PlayList $playList){
        $pdo = DB::getConnection();
        
        $stmt = $pdo->prepare('
            INSERT INTO playlist ( name, description, user_id, picture)
                VALUES (:name, :description, :user_id, :picture)');
        $stmt->bindValue(':name', $playList->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $playList->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $playList->getUser_id(), PDO::PARAM_INT);
        $stmt->bindValue(':picture', $playList->getPicture(), PDO::PARAM_STR);
        $res = $stmt->execute();
        if ($res){
            return $pdo->lastInsertId();
        }else {
            return -1;
        }
        
    }
    /**
     * check if playList belong to user
     * @param type $playListId
     * @param type $userId
     * @return boolean true if playListId belongs to userId
     */
    static function exist($playListId, $userId){
        
        $pdo = DB::getConnection();
        
        $stmt = $pdo->prepare("SELECT count(*) FROM playlist WHERE id = :playlist_id AND user_id = :user_id");
        $stmt->bindValue(':playlist_id', $playListId);
        $stmt->bindValue(':user_id', $userId);
        $stmt->execute();
	$res = $stmt->fetchColumn();
        return ($res>0);
    }
    
    static function delete($playListId, $trackId, $userId){
        
        if (self::exist($playListId,$userId )){
        
            $pdo = DB::getConnection();

            $stmt = $pdo->prepare('DELETE FROM playlist_track WHERE playlist_id = :playlist_id AND track_id = :track_id');
            $stmt->bindValue(':playlist_id', $playListId);
            $stmt->bindValue(':track_id', $trackId);

            return $stmt->execute();
        }else{
            throw new \Exception("playlist id ". $playListId."is not owned by user id:" . $userId);
        }
    }
    
    static function  getPlayLists($userid){
       // connection BDD
	$pdo = DB::getConnection();
	
			
	$stmt = $pdo->prepare("SELECT * FROM playlist WHERE user_id = :user_id");
        $stmt->bindValue(':user_id', $userid);
        $stmt->execute();

	$pls = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, PlayList::class);
		   
	return $pls;
          
    }
    
    static function getPlayListById($playlist_id){
        $pdo = DB::getConnection();
	
			
	$stmt = $pdo->prepare("SELECT * FROM playlist WHERE id = :playlist_id");
        $stmt->bindValue(':playlist_id', $playlist_id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, PlayList::class);
	$pl = $stmt->fetch();


	return $pl;
    }
    
     static function getTracks($playlist_id){
        $pdo = DB::getConnection();
	
			
	$stmt = $pdo->prepare("SELECT * FROM track inner join playlist_track on track.id = playlist_track.track_id WHERE playlist_track.playlist_id = :playlist_id");
        $stmt->bindValue(':playlist_id', $playlist_id);
        $stmt->execute();

	$playLists = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \PlayList\Model\Track::class);
		   
	return $playLists;
    }
    
    static function addTrack($playlist_id, $track_id){
        $pdo = DB::getConnection();
        
        $stmt = $pdo->prepare('
            INSERT INTO playlist_track ( playlist_id, track_id)
                VALUES (:playlist_id, :track_id)');
        $stmt->bindValue(':playlist_id', $playlist_id, PDO::PARAM_INT);
        $stmt->bindValue(':track_id', $track_id, PDO::PARAM_INT);

        return $stmt->execute();
       
    }
}
