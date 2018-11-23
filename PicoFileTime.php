<?php

class PicoFileTime extends AbstractPicoPlugin {
    private $plugin;
    
    public function onConfigLoaded(&$config) {
        $this->plugin = new \PicoFileTime\Plugin(
            $config,
            new \PicoFileTime\FileSystemWrapper);        
    }

    private $url;
    public function onRequestUrl($url) {
        $this->url = $url;
    }
    
    public function onMetaParsed(&$meta) {
        $meta['creation_date'] = $this->plugin->getCreationDate($this->url);
    }
    
    
    public function onSinglePageLoaded(&$page) {
        if (!isset($page['meta']['creation_date'])) {
            $page['meta']['creation_date'] = $this->plugin->getCreationDate($page['id']);
        }
    }
    
}