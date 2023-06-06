<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace B3\Core;

use GuzzleHttp\Client;

/**
 * Description of MSHttp
 *
 * @author weslley
 */
class B3Http {
    protected Client $http;
    protected $config;

    const BASE_URL_AUTH_PROD = "https://api-balcao.b3.com.br/";
    const BASE_URL_AUTH_HOMO = "https://api-balcao-cert.b3.com.br/";
    
    const BASE_URL_PROD = "https://api-otc1-imercado.b3.com.br/";
    const BASE_URL_HOMO = "https://api-otc1-imercado-cert.b3.com.br/";
           
    public function __construct(array $config = []) {        
        $defaultConfig = array(
            'base_uri' => self::BASE_URL_PROD,
            'timeout' => 30,
            'headers' => array(
                'content-type' => 'application/json'
            )
        );
        
        $this->config = array_merge($defaultConfig, $config);
                
        $this->http = new Client($this->config);
    }
}
