<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 16/07/17
 * Time: 9:21 AM
 */

namespace nmoller\k8sobjects;


class Pod extends Base {
    public function __construct() {
        parent::__construct();
    }

    public function __toString() {
        $out2 = '<ul class="list-group">';
        $out2 .= '<li class="list-group-item active">'.$this->metadata->name.'</li>';
        $specs = $this->spec;
        foreach ($specs->containers as $c) {
            $out2 .= '<li class="list-group-item">'.$c->image.'</li>';
        }
        $out2 .= '</ul>';
        return "$out2";
    }
}