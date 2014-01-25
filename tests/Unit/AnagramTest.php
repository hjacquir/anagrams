<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Tests\Unit;

use \Exception;
use \Hj\Anagram;
use \PHPUnit_Framework_TestCase;

require '../../vendor/autoload.php';

/**
 * @covers \Hj\Anagram
 */
class AnagramTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Anagram
     */
    private $anagram;
    
    public function setUp()
    {
        $this->anagram = new Anagram();
    }
    
    public function testShouldReturnAllValidAnagrams()
    {
        $this->anagram->addValidAnagram('chien');
        $this->anagram->addValidAnagram('niche');
        
        $this->assertSame(array('chien', 'niche'), $this->anagram->getAllValidAnagrams());
    }
    
    /**
     * @expectedException        Exception
     * @expectedExceptionMessage The word can not be empty
     */
    public function testShouldThrowAnExceptionWhenTheWordIsNull()
    {
        $this->anagram->addValidAnagram(null);
    }
    
    /**
     * @expectedException        Exception
     * @expectedExceptionMessage No anagram were found for that word
     */
    public function testShouldThrowAnExceptionWhenNoValidAnagramsAreAdded()
    {
        $this->anagram->getAllValidAnagrams();
    }
}
