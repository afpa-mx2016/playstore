<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayStore\Controller;

/**
 * Description of Controller
 *
 * @author lionel
 */
interface IController {
    public function run($params);
    public function hasErrors();
    public function getErrors();
    
}
