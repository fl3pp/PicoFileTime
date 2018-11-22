<?php

namespace PicoFileTime;

class Plugin {
    private $config;
    private $fileSystem;

    public function __construct($config, $fileSystem) {
        $this->config = $config;
        $this->fileSystem = $fileSystem;
    }
    
    public function getCreationDate($id) {
        $fileTime = $this->fileSystem->getFileLastWrite($this->createPath($id));
        if (!$fileTime) return null;
        return date('Y-m-d', $fileTime);
    }

    private function createPath($id) {
        $pathBuilder = $this->config['content_dir'];
        if (substr($pathBuilder, -1) != '/' && substr($pathBuilder, -1) != '\\')
            $pathBuilder .= '/';
        $pathBuilder .= $id;
        if (substr($pathBuilder, -1) == '/' || substr($pathBuilder, -1) == '\\')
            $pathBuilder = substr($pathBuilder, 0, strlen($pathBuilder) - 1);
        $pathBuilder .= $this->config['content_ext'];
        return $pathBuilder;
    }
    
}