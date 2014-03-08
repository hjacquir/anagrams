<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj;

/**
 * Class which call an specific uri of the API and return the response
 */
class Api
{
    const PRINCIPAL_TRANSLATIONS = 'PrincipalTranslations';
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
        
        $apiResponse = file_get_contents($baseUriWithParameter);
        
        if (strpos($apiResponse, self::PRINCIPAL_TRANSLATIONS) > 0) {
            $exist = true;
        }
        
        return $exist;
    }
}