<?php

class PicoFileTime extends AbstractPicoPlugin {
    private $plugin;

    function __construct($pico) {
        $this->plugin = new \PicoFileTime\Plugin();        
        parent::__construct($pico);
    }

    
    
}