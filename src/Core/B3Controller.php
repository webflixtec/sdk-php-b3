<?php

namespace B3\Core;

class B3Controller{
    private static $instance;
    
    private B3Token $token;
    private $cert;
    private $sslKey;
    private array $config = [];

    private function __construct(array $config = []) {        
        if(isset($config['token'])){
            $this->setToken($config['token']);
        }
        
        if(isset($config['cert'])){
            $this->setToken($config['cert']);
        }
    }
    
    public static function create(array $config = []): B3Controller{
        if(!self::$instance){
            self::$instance = new static($config);
        }
        
        return self::$instance;
    }
    
    public function getToken(): B3Token{
        return $this->token;
    }

    public function setToken(B3Token $token) {
        $this->token = $token;
        return $this;
    }
    
    public function getAuthorization(){
        if(!$this->token){
            throw \B3\Exceptions\B3Exception::fromObjectMessage('Autorização não encontrada', 404);
        }
        
        return $this->token->getToken_type() . ' ' . $this->token->getAccess_token();
    }
    
    public function getCert() {
        return $this->cert;
    }

    public function setCert($cert) {
        $this->cert = $cert;
        return $this;
    }
    
    public function getSslKey() {
        return $this->sslKey;
    }

    public function setSslKey($sslKey) {
        $this->sslKey = $sslKey;
        return $this;
    }
    
    public function getConfig(): array {
        return $this->config;
    }

    public function setConfig(array $config) {
        $this->config = $config;
        return $this;
    }
}
