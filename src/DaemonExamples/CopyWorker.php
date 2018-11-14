<?php namespace DaemonExamples;

use \Comodojo\Daemon\Worker\AbstractWorker;

class CopyWorker extends AbstractWorker {

    protected $path;

    protected $file = 'test.txt';
    
    protected $copy = 'copy_test.txt';
    
    public function spinup() {

        $this->logger->info("CopyWorker ".$this->getName()." spinning up...");
        $this->path = realpath(dirname(__FILE__)."/../../tmp/");

    }

    public function loop() {
        
        $filename = $this->path."/".$this->file;

        if ( file_exists($filename) ) {
            copy($filename, $this->path."/".$this->copy);
        }

    }

    public function spindown() {

        $this->logger->info("CopyWorker ".$this->getName()." spinning down.");
        unlink($this->path."/".$this->copy);

    }

}
