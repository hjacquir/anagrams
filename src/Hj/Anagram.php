<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj;

/**
 * Class which return all valid anagram for a given word
 * A anagram is valid when the word exist on the dictionary
 */
class Anagram
{
    /**
     * @var array $anagrams An array which contain all valid anagram
     */
    private $anagrams;
    
    /**
     * @param string $word
     */
    public function addValidAnagram($word)
    {
        $this->anagrams[] = $word;
    }
    
    /**
     * @return array 
     */
    public function getAllValidAnagrams()
    {
        return $this->anagrams;
    }
}
