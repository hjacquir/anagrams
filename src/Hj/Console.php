<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj;

use \Symfony\Component\Console\Command\Command;
use \Symfony\Component\Console\Input\InputArgument;
use \Symfony\Component\Console\Input\InputInterface;
use \Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of Console
 */
class Console extends Command
{
    protected function configure()
    {
        $this->setName('g:a')
                ->setDescription('Generate anagram in command line')
                ->addArgument('word', InputArgument::REQUIRED, 'The word that you want anagrams');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $word        = $input->getArgument('word');
        $permutation = new Permutation();
        
        $allPossiblePermutation = $permutation->permute($word);
        
        $api     = new Api('fren');
        $anagram = new Anagram();
        
        foreach ($allPossiblePermutation as $permutation) {
            if ($api->checkIfTheWordExist($permutation)) {
                $anagram->addValidAnagram($permutation);
            }
        }
        
        $anagrams = implode(' , ', $anagram->getAllValidAnagrams());
        
        $output->writeln('<info>All anagrams are : ' . $anagrams . '</info>');
    }
}
