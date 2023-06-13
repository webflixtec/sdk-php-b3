<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace B3;

use B3\Core\B3Controller;
use B3\Core\B3Http;
use B3\Core\B3Token;
use B3\Exceptions\B3Exception;
use Exception;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

/**
 * Description of Autorizacao
 *
 * @author weslley
 */
class Autorizacao extends B3Http{
    private $controller;
    
    public function __construct() {
        $this->controller = B3Controller::create();
        parent::__construct($this->controller->getConfig());
    }   
    
    public function gerar(array $data): B3Token{
        try{
            $response = $this->http->post('api/oauth/token', [
                'headers' => [
                    'content-type' => 'application/x-www-form-urlencoded'
                ],
                'form_params' => $data,
                'cert' => $this->controller->getCert(),
                'ssl_key' => $this->controller->getSslKey(),
            ]);

            $body = (string)$response->getBody();
                        
            return new B3Token($body);
            
        } catch (ServerException $ex) {
            $body = (string)$ex->getResponse()->getBody();
            
            throw B3Exception::fromObjectMessage('[ServerException] ' . $body . ' - ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
                        
        } catch (ClientException $ex) {
            $body = (string)$ex->getResponse()->getBody();
            
            throw B3Exception::fromObjectMessage('[ClientException] ' . $body . ' - ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (BadResponseException $ex) {
            $body = (string)$ex->getResponse()->getBody();
            
            throw B3Exception::fromObjectMessage('[BadResponseException] ' . $body . ' - ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (Exception $ex) {
            throw new B3Exception($ex);
        }
    }
}
