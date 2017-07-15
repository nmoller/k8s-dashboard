<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 15/07/17
 * Time: 1:17 PM
 */

namespace nmoller\k8sobjects;


class Base {
    public $apiVersion;
    public $kind;
    public $metadata;
    public $spec;
    public $status;

    public function __toString() {
        // TODO: Implement __toString() method.
        $vals = $this->spec->ports;
        $out2 = '<ul class="list-group">';
        $out2 .= '<li class="list-group-item active">'.$this->metadata->name.'</li>';
        $out2 .= '<li class="list-group-item">Node port: '.$vals[0]->nodePort.'</li>';
        $out2 .= '<li class="list-group-item">Port: '.$vals[0]->port.'</li>';
        $out2 .= '<li class="list-group-item">Protocol: '.$vals[0]->protocol.'</li>';
        $out2 .= '<li class="list-group-item">Target port: '.$vals[0]->targetPort.'</li>';
        $out2 .= '</ul>';
        return "$out2";
    }
}