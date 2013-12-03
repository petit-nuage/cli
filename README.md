# flow

## Requirements

- Python 2.7
- Fabric
- Pystache

- Docker 0.7

- PHP 5.3
- PEAR Installer
- PHPUnit
- PHP Mess Detector
- PHP Code Sniffer
- PHPLOC
- PHP Copy,Paste Detector (PHPCPD)



### PEAR Installer

    pear config-set auto_discover 1

### PHPUnit - http://www.phpunit.de/

PHPUnit is the de-facto standard for unit testing in PHP projects. It provides
both a framework that makes the writing of tests easy as well as the
functionality to easily run the tests and analyse their results.

    pear install pear.phpunit.de/PHPUnit

### PHP Mess Detector - http://phpmd.org

PHPMD is a spin-off project of PHP Depend and aims to be a PHP equivalent of the
well known Java tool PMD. PHPMD can be seen as an user friendly frontend
application for the raw metrics stream measured by PHP Depend

    pear channel-discover pear.phpmd.org
    pear channel-discover pear.pdepend.org
    pear install --alldeps phpmd/PHP_PMD

### PHP Code Sniffer - http://pear.php.net/package/PHP_CodeSniffer/

PHP_CodeSniffer tokenises PHP, JavaScript and CSS files and detects violations
of a defined set of coding standards.

    pear install PHP_CodeSniffer

### PHPLOC - https://github.com/sebastianbergmann/phploc

phploc is a tool for quickly measuring the size and analyzing the structure of
a PHP project.

    pear install pear.phpunit.de/phploc

### PHP CPD - https://github.com/sebastianbergmann/phpcpd

phpcpd is a Copy/Paste Detector (CPD) for PHP code.

    pear install pear.phpunit.de/phpcpd

### PHP Documentor 2 - http://www.phpdoc.org/

phpDocumentor 2 is build to generate API documentation for all features
available in PHP 5.3 and higher.

    pear channel-discover pear.phpdoc.org
    pear install phpdoc/phpDocumentor-alpha

### Beanstalkd - http://

description

    apt-get install beanstalkd
