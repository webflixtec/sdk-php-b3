<?php

namespace B3\Exceptions;

use Exception;

class B3Exception extends Exception{
    
    public function __construct(Exception $ex) {
        $message = $ex->getMessage() . PHP_EOL . $ex->getTraceAsString();        
        parent::__construct($message, $ex->getCode(), $ex->getPrevious());
    }
    
    public static function fromObjectMessage($message, $code, $previous = null){
        
        if(is_array($message)){
            
            $newMessageString = [];
            
            foreach($message as $error){
                $newMessageString[] =  $error;
            }                           
            
            return new B3Exception( new Exception(implode("\n", $newMessageString), $code, $previous) );     
        }
        
        if(is_string($message)){
            
            return new B3Exception( new Exception($message, $code, $previous) );     
            
        }
        
    }
    
}
