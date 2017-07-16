<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 16/07/17
 * Time: 9:08 AM
 */

namespace nmoller\k8sobjects;


class Service extends Base {
    public function __toString() {
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