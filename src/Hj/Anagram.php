<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj;

/**
 * Anagram
 */
class Anagram
{
    /**
     * Return all permutations for given word
     * 
     * @param string $string The given word or string
     * 
     * @return array $permutations An array of all permutation possible 
     */
    public function permute($string)
    {
        if (strlen($string) < 2) {
            return array($string);
        }
        
        $permutations                = array();
        $stringWithoutFirstCharacter = substr($string, 1);
        foreach ($this->permute($stringWithoutFirstCharacter) as $permutation) {
            $length = strlen($permutation);
            for ($i =0; $i <= $length; $i++) {
                $permutations[] = substr($permutation, 0, $i) . $string[0] . substr($permutation, $i);
            }
        }
        
        return $permutations;
    }
}