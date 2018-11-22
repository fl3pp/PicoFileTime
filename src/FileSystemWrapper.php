<?php

namespace PicoFileTime;

class FileSystemWrapper {

    public function getFileLastWriteDate($file) {
        return date('Y-m-d', filemtime("test.txt"));
    }
    
}