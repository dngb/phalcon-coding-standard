<?php

/**
 * This file is part of the Phalcon-coding-standard (phpcs standard)
 *
 * PHP version 5
 *
 * @category PHP
 * @package  Phalcon-coding-standard
 * @author   Authors <pcguard@gmail.com>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     https://github.com/karen-nalbandian/phalcon-coding-standard
 */

namespace Phalcon\Sniffs\Whitespace;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

/**
 * DiscourageFitzinatorSniff.
 *
 * Throws warnings if a file contains trailing whitespace.
 *
 * PHP version 5
 *
 * @category PHP
 * @package  Phalcon-coding-standard
 * @author   Authors <pcguard@gmail.com>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     https://github.com/karen-nalbandian/phalcon-coding-standard
 */
class DiscourageFitzinatorSniff implements Sniff
{
    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = array(
        'PHP',
        'JS',
        'CSS',
    );


    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_WHITESPACE);

    }

    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param File $phpcsFile All the tokens found in the document.
     * @param int $stackPtr The position of the current token in
     *                        the stack passed in $tokens.
     *
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        // Make sure this is trailing whitespace.
        $line = $tokens[$stackPtr]['line'];
        if (($stackPtr < count($tokens) - 1)
            && $tokens[($stackPtr + 1)]['line'] === $line
        ) {
            return;
        }

        if (strpos($tokens[$stackPtr]['content'], "\n") > 0
            || strpos($tokens[$stackPtr]['content'], "\r") > 0
        ) {
            $warning = 'Please trim any trailing whitespace';
            $phpcsFile->addWarning($warning, $stackPtr, 'Invalid');
        }
    }
}
