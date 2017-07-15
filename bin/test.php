<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 15/07/17
 * Time: 10:53 AM
 */

require __DIR__.'/../vendor/autoload.php';

$test = new nmoller\command\k8sns();
print_r($test());
