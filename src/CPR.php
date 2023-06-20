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
            $response = $this->http->get('pipeline/b3/v2/cpr/instruments/' . $id, [
                'headers' => [
                    'Authorization' => $this->controller->getAuthorization(),
                ],
                'cert' => $this->controller->getCert(),
                'ssl_key' => $this->controller->getSslKey(),
            ]);

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
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
    
    public function registrar(array $data){
        try{
            $response = $this->http->post('pipeline/b3/v2/cpr/instruments', [
                'headers' => [
                    'Authorization' => $this->controller->getAuthorization(),
                ],
                'cert' => $this->controller->getCert(),
                'ssl_key' => $this->controller->getSslKey(),
                'json' => $data
            ]);

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
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
