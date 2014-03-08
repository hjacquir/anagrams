<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\Tests\Unit;

use \Hj\Permutation;
use \PHPUnit_Framework_TestCase;

/**
 * @covers \Hj\Permutation
 */
class PermutationTest extends PHPUnit_Framework_TestCase
{
    public function testShouldReturnAllPossiblePermutations()
    {
        $permutation = new Permutation();
        
        $this->assertSame(array('he', 'eh'), $permutation->permute('he'));
    }
}
