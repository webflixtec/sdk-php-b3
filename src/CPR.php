<?php

namespace B3;

use B3\Core\B3Controller;
use B3\Core\B3Http;
use B3\Exceptions\B3Exception;
use Exception;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class CPR extends B3Http{
    private $controller;
    
    public function __construct() {
        $this->controller = B3Controller::create();
        parent::__construct($this->controller->getConfig());
    }   
    
    public function detalhes($id){
        try{
            $response = $this->http->get('pipeline/b3/v1/cpr/instruments/' . $id, [
                'headers' => [
                    'Authorization' => $this->controller->getAuthorization(),
                ],
                'cert' => $this->controller->getCert(),
                'ssl_key' => $this->controller->getSslKey(),
            ]);

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            throw B3Exception::fromObjectMessage('[ServerException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
                        
        } catch (ClientException $ex) {
            
            throw B3Exception::fromObjectMessage('[ClientException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (BadResponseException $ex) {
            
            throw B3Exception::fromObjectMessage('[BadResponseException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (Exception $ex) {
            throw new B3Exception($ex);
        }
    }
    
    public function registrar(array $data){
        try{
            $response = $this->http->post('pipeline/b3/v1/cpr/instruments', [
                'headers' => [
                    'Authorization' => $this->controller->getAuthorization(),
                ],
                'cert' => $this->controller->getCert(),
                'ssl_key' => $this->controller->getSslKey(),
            ]);

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            throw B3Exception::fromObjectMessage('[ServerException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
                        
        } catch (ClientException $ex) {
            
            throw B3Exception::fromObjectMessage('[ClientException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (BadResponseException $ex) {
            
            throw B3Exception::fromObjectMessage('[BadResponseException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (Exception $ex) {
            throw new B3Exception($ex);
        }
    }
}