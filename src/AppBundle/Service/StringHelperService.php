<?php

namespace AppBundle\service;
/**
 * Description of StringHelperService
 *
 * @author lganne
 */
class StringHelperService {
    
    private $doctrine;
    private $mailer;
    public function _construct($doctrine,$mailer)
    {
        $this->doctrine=$doctrine;
        $this->mailer=$mailer;
    }
    public function randomString($numCar=30)
    {
        $string="";
        $char="abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        
        for($i=0;$i<$numCar;$i++)
        {
            $chif=rand(0,strlen($char)-1);
            $string.=$char[$chif];
        }
        return $string;
    }
    
    
}
