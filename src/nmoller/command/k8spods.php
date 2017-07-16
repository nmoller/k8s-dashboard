<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 16/07/17
 * Time: 9:12 AM
 */

namespace nmoller\command;
use Symfony\Component\Process\Process;

class k8spods {
    public function __invoke($ns) {
        $headP = new Process("kubectl -n $ns get pods --output=json");
        $headP->run();
        $list = $headP->getOutput();
        return $list;
    }
}