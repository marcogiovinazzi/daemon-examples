<?php namespace DaemonExamples;

use \Comodojo\Daemon\Worker\AbstractWorker;

class CopyWorker extends AbstractWorker {

    protected $path;

    protected $file = 'test.txt';
    
    protected $copy = 'copy_test.txt';
    
    public function spinup() {

        $this->logger->info("CopyWorker ".$this->getName()." spinning up...");
        $this->path = realpath(dirname(__FILE__)."/../../tmp/");

        // Hook on daemon.worker.changename event to change the output file name
        $this->getEvents()
            ->subscribe('daemon.worker.changename', '\DaemonExamples\ChangeNameListener');

    }

    public function loop() {
        
        $filename = $this->path."/".$this->file;

        if ( file_exists($filename) ) {
            $this->logger->info("Copying file ".$this->file." to ".$this->copy);
            copy($filename, $this->path."/".$this->copy);
        }

    }

    public function spindown() {

        $this->logger->info("CopyWorker ".$this->getName()." spinning down.");
        unlink($this->path."/".$this->copy);

    }

    public function changeName() {
        $this->logger->info("Changing filename...");
        $this->copy = 'copy_test_2.txt';

    }

}
