<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Tests\Unit;

use \Hj\Anagram;
use \PHPUnit_Framework_TestCase;

require '../../vendor/autoload.php';

/**
 * @covers \Hj\Anagram
 */
class AnagramTest extends PHPUnit_Framework_TestCase
{
    public function testShouldPermute()
    {
        $anagram = new Anagram();
        
        $expectedPermutations = array('bye', 'ybe', 'yeb', 'bey', 'eby', 'eyb');
        
        $this->assertSame($expectedPermutations, $anagram->permute('bye'));
    }
}
