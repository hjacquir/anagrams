<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Tests\Unit;

use \PHPUnit_Framework_TestCase;
use \Hj\Api;

require '../../vendor/autoload.php';

/**
 * @covers Api
 */
class ApiTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Api
     */
    private $api;
    
    public function setUp()
    {
        $this->api = new Api('fren');
    }
    
    public function testShouldHaveABaseUriWithoutParameterByDefault()
    {
        $this->assertAttributeEquals('http://api.wordreference.com/f0e5c/json/fren/', 'baseUriWithoutParameter', $this->api);
    }
    
    public function testShouldReturnTheBaseUriWithoutParameter()
    {
        $this->assertContains('api.wordreference.com', $this->api->getBaseUriWithoutParameter());
    }
    
    public function testMethodCheckIfTheWordExistShouldReturnTrueWhenTheWordExist()
    {
        $this->assertTrue($this->api->checkIfTheWordExist('test'));
    }
    
    public function testMethodCheckIfTheWordExistShouldReturnFalseWhenTheWordNotExist()
    {
        $this->assertFalse($this->api->checkIfTheWordExist('zzzz'));
    }
}
