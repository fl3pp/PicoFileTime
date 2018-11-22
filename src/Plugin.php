<?php

namespace PicoFileTime;

class Plugin {
    private $fileSystem;

    public function __construct($fileSystem) {
        $this->fileSystem = $fileSystem;
    }

    public function setTime(&$meta) {

    }


}