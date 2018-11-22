<?php

class PicoFileTime extends AbstractPicoPlugin {
    private $plugin;

    function __construct($pico) {
        $this->plugin = new \PicoFileTime\Plugin();        
        parent::__construct($pico);
    }

    public function onMetaParsed(array &$meta)
    {
        
    }

    
    public function onSinglePageLoaded() {

    }
    
    
}