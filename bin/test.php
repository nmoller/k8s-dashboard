<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 15/07/17
 * Time: 10:53 AM
 */

require __DIR__.'/../vendor/autoload.php';

use \nmoller\k8sobjects\Base;

//$test = new nmoller\command\k8sns();

$test = new nmoller\command\k8sservices();
$svcs = json_decode($test('siad-moodle-dev-01'));
$my_ob = new Base();
$my_ob = $svcs->items[0];
print_r($my_ob->kind);
