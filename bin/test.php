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

//$test = new nmoller\command\k8sservices();
//$svcs = json_decode($test('siad-moodle-dev-01'));
//$my_ob = new Base();
//$my_ob = $svcs->items[0];
//print_r($my_ob->kind);

$test = new nmoller\command\k8spods();
$pods = json_decode($test('siad-moodle-dev-01'));
//print_r($pods->items);
$my_pods = [];
foreach ($pods->items as $pod) {
    $p = new nmoller\k8sobjects\Pod();
    $p->kind = $pod->kind;
    $p->metadata = $pod->metadata;
    $p->spec = $pod->spec;
    $my_pods[] = $p;
}

foreach ($my_pods as $p) {
    echo $p;
}

