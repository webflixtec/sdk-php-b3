<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace B3\Helper;

/**
 * Description of MSHelper
 *
 * @author weslley
 */
class B3Helper {
        
    public static function dump($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    
}
