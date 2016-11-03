<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayList\Dao;

require(dirname(__FILE__).'/DB.php');
require(dirname(__FILE__).'/../model/User.class.php');

use \PlayList\Model\User as User;
use \PDO as PDO;
/**
 * Description of UserStore
 *
 * @author lionel
 */
class UserStore {
    //put your code here
    
    
    static function getUser($username){
	$pdo = DB::getConnection();
	
	$stmt = $pdo->prepare('SELECT * FROM user WHERE username = :username');
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, User::class);
	$user = $stmt->fetch();


	return $user;
    }
}
