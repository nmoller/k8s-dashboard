<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 15/07/17
 * Time: 10:47 AM
 */

namespace nmoller\command;
use Symfony\Component\Process\Process;


class k8sns {
    public function __invoke() {
        $headP = new Process("kubectl get ns --output=jsonpath={.items..metadata.name}");
        $headP->run();
        $list = $headP->getOutput();
        $ns = explode(' ', $list);
        return $ns;
    }
}