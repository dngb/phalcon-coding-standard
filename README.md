# Phalcon PHP CodeSniffer Coding Standard (PCGuard flavor)

A coding standard to check against the [Phalcon coding standards](https://github.com/framgia/coding-standards/blob/master/eng/php/phalcon.md),
with slight modifications.

_Important note:_ Please be careful using this library, as it is for internal usage, and probably will not be maintained

## Differences

The following standards has been modified:

- added the Phalcon.Commenting.FunctionComment.MissingParamType
- removed the Phalcon.Commenting.FunctionComment.SpacingAfterParamType
- removed the Phalcon.Commenting.Annotations.Invalid
- removed the Phalcon.Functions.Arguments.Invalid
- removed the Squiz.Strings.ConcatenationSpacing.PaddingFound
- removed the PSR2.Classes.PropertyDeclaration.Underscore
- removed the Zend.NamingConventions.ValidVariableName.ContainsNumbers
- removed the Zend.NamingConventions.ValidVariableName.MemberVarContainsNumbers
- removed the Zend.NamingConventions.ValidVariableName.NotCamelCaps

## Installation

### Composer

This standard can be installed with the [Composer](https://getcomposer.org/) dependency manager.

1. [Install Composer](https://getcomposer.org/doc/00-intro.md)

2. Install the coding standard as a dependency of your project

        composer require --dev karen-nalbandian/phalcon-coding-standard:dev-master

3. Add the coding standard to the PHP_CodeSniffer install path

        vendor/bin/phpcs --config-set installed_paths vendor/karen-nalbandian/phalcon-coding-standard

4. Check the installed coding standards for "Phalcon"

        vendor/bin/phpcs -i

5. Done!

        vendor/bin/phpcs /path/to/code

### Stand-alone

1. Install [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)

2. Checkout this repository

        git clone https://github.com/karen-nalbandian/phalcon-coding-standard.git

3. Add the coding standard to the PHP_CodeSniffer install path

        phpcs --config-set installed_paths /path/to/phalcon-coding-standard

   Or copy/symlink this repository's "Phalcon"-folder inside the phpcs `Standards` directory

4. Check the installed coding standards for "Phalcon"

        phpcs -i

5. Done!

        phpcs /path/to/code
        
