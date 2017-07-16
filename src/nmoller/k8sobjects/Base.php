<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 15/07/17
 * Time: 1:17 PM
 */

namespace nmoller\k8sobjects;
use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;


class Base {
    protected $file_view;
    protected $output_folder;
    public $apiVersion;
    public $kind;
    public $metadata;
    public $spec;
    public $status;

    public function __construct() {
        $this->output_folder = __DIR__ . '/../../../output/';
        $this->file_view = new Mustache_Engine([
            'loader' => new Mustache_Loader_FilesystemLoader( __DIR__ . '/../../../src/views/k8s')
        ]);
    }
}