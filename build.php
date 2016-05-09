#!/usr/bin/env php
<?php
chdir(dirname(__FILE__));

$autoload = (int)$argv[0];
if($autoload) {
    passthru(
        './vendor/bin/phpunit -c phpunit.xml', $returnStatus
    );
    if($reutnrStatus !== 0)
    {
        exit(1);
    }
}
exit(0);
