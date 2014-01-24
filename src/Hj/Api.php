<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj;

use \Httpful\Request;

/**
 * Class which call an specific uri of the API and return the response
 */
class Api
{
    /**
     * @var string $uri The called uri without the parameter
     */
    private $baseUriWithoutParameter;
    
    /**
     * @param string $dictionary The dictionary (eg : fren, enfr ...)
     */
    public function __construct($dictionary)
    {
        $this->baseUriWithoutParameter = 'http://api.wordreference.com/f0e5c/json/' . $dictionary . '/';
    }
    
    /**
     * Return the uri without the parameter
     * 
     * @return string The base URI without parameter
     */
    public function getBaseUriWithoutParameter()
    {
        return $this->baseUriWithoutParameter;
    }
    
    /**
     * Return true if the word exist in the dictionary
     * 
     * @param string $word
     * 
     * @return boolean $exist
     */
    public function checkIfTheWordExist($word)
    {
        $exist = false;
        
        $baseUriWithParameter = $this->baseUriWithoutParameter . $word;
        $apiResponse          = Request::get($baseUriWithParameter)->send();
        $encodedJson          = json_encode($apiResponse->body);
        
        if (strpos($encodedJson, 'PrincipalTranslations') > 0) {
            $exist = true;
        }
        
        return $exist;
    }
}