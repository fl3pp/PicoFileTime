<?php

namespace PicoFileTime;

/**
 * @codeCoverageIgnore
 */
class FileSystemWrapper {

    public function getFileLastWrite($file) {
        return @filemtime($file);
    }
    
}