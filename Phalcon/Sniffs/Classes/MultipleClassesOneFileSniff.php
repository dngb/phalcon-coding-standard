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

/**
 * Throws errors if multiple classes are defined in a single file.
 *
 * PHP version 5
 *
 * Phalcon coding standard specifies: "Define one class per file;"
 *
 * @category PHP
 * @package  Phalcon-coding-standard
 * @author   Authors <pcguard@gmail.com>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     https://github.com/karen-nalbandian/phalcon-coding-standard
 */

namespace Phalcon\Sniffs\Classes;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

/**
 * MultipleClassesOneFileSniff.
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Phalcon
 * @author   Authors <pcguard@gmail.com>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     https://github.com/karen-nalbandian/phalcon-coding-standard
 */
class MultipleClassesOneFileSniff implements Sniff
{
    /**
     * The number of times the T_CLASS token is encountered in the file.
     *
     * @var int
     */
    protected $classCount = 0;

    /**
     * The current file this class is operating on.
     *
     * @var string
     */
    protected $currentFile;

    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = array(
        'PHP',
    );

    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_CLASS);
    }

    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param File $phpcsFile All the tokens found in the document.
     * @param int  $stackPtr  The position of the current token in
     *                        the stack passed in $tokens.
     *
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        if ($this->currentFile !== $phpcsFile->getFilename()) {
            $this->classCount  = 0;
            $this->currentFile = $phpcsFile->getFilename();
        }

        $this->classCount++;

        if ($this->classCount > 1) {
            $phpcsFile->addError(
                'Multiple classes defined in a single file',
                $stackPtr,
                'Invalid'
            );
        }

        return;
    }
}
