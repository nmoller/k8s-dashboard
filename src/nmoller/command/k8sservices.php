<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 15/07/17
 * Time: 12:04 PM
 */

namespace nmoller\command;
use Symfony\Component\Process\Process;

class k8sservices {
    public function __invoke($ns) {
        /*
        $headP = new Process("kubectl -n $ns get services --output=jsonpath={.items..metadata.name}");
        $headP->run();
        $list = $headP->getOutput();
        $ns = explode(' ', $list);
        return $ns;
        */
        $headP = new Process("kubectl -n $ns get services --output=json");
        $headP->run();
        $list = $headP->getOutput();
        return $list;
    }

}