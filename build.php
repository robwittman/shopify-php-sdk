#!/usr/bin/env php
<?php
chdir(dirname(__FILE__));

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
