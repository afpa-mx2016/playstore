<?php

namespace PlayList\Dao;

require_once(dirname(__FILE__).'/DB.php');
require(dirname(__FILE__).'/../model/Track.class.php');

use \PlayList\Model\Track as Track;
use \PDO as PDO;
/**
 * Description of TrackStore
 *
 * @author lionel
 */
class TrackStore {

    
    static function delete($id){
        $pdo = DB::getConnection();
        
        $stmt = $pdo->prepare('DELETE FROM track WHERE id = :id');
        $stmt->bindValue(':id', $id);
        
        return $stmt->execute();
        
    }
    
    /**
    *
    *@return last inserted id or -1 if any problem
    **/
    static function save(Track $track){
        $pdo = DB::getConnection();
        
        $stmt = $pdo->prepare('
            INSERT INTO track ( title, author, duration)
                VALUES (:title, :author, :duration)');
        $stmt->bindValue(':title', $track->getTitle(), PDO::PARAM_STR);
        $stmt->bindValue(':author', $track->getAuthor(), PDO::PARAM_STR);
        $stmt->bindValue(':duration', $track->getDuration(), PDO::PARAM_INT);
        $res = $stmt->execute();
        if ($res){
            return $pdo->lastInsertId();
        }else {
            return -1;
        }
        
    }
    
    static function update($track){
              // connection BDD
	$pdo = DB::getConnection();
	
	$stmt = $pdo->prepare('UPDATE track SET title = :title, author = :author, duration = :duration WHERE id = :id');
        
        $stmt->bindValue(':id', $track->getId(), PDO::PARAM_STR);
        $stmt->bindValue(':title', $track->getTitle(), PDO::PARAM_STR);
        $stmt->bindValue(':author', $track->getAuthor(), PDO::PARAM_STR);
        $stmt->bindValue(':duration', $track->getDuration(), PDO::PARAM_INT);
        $res = $stmt->execute();
        if ($res){
            return $stmt->rowCount() ? true : false;
        }else{
            return -1;
        }
        
    }
    
    
    
    static function  getTrackById($id){
       // connection BDD
	$pdo = DB::getConnection();
	
	$stmt = $pdo->prepare('SELECT * FROM track WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Track::class);
	$track = $stmt->fetch();

       
	$stmt->closeCursor(); // on ferme le curseur des résultats
		   
	

	return $track;
        
        
    }
    
    
    static function  getTracks(){
       // connection BDD
	$pdo = DB::getConnection();
	
	$sql = "SELECT * FROM track;";
			
	$stmt = $pdo->query($sql);

        $tracks = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Track::class);
        //var_dump($result);
	
	$stmt->closeCursor(); // on ferme le curseur des résultats
		   
	return $tracks;
        
        
    }
    
    static function  getTracksByTitle($title){
       // connection BDD
	$pdo = DB::getConnection();
			
	$stmt = $pdo->prepare("SELECT * FROM track WHERE title like :title");
        $stmt->bindValue(':title', '%'.$title.'%');
        $stmt->execute();
        $tracks = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Track::class);
        //var_dump($result);
	
	$stmt->closeCursor(); // on ferme le curseur des résultats
		   
	return $tracks;
        
        
    }
}
