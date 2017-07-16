<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 16/07/17
 * Time: 9:08 AM
 */

namespace nmoller\k8sobjects;


class Service extends Base {

    public function __construct() {
        parent::__construct();
    }

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

    public function getFileName($data) {
        $file_service = $data['service_ns'] . '-'.$data['service_name'];
        return $file_service;
    }

    public function toYaml($data) {
        // we put the data in the service template
        $svc = $this->file_view->render('service', ['service' => $data]);
        file_put_contents($this->output_folder. $this->getFileName($data) . '.yaml', $svc);
    }
}