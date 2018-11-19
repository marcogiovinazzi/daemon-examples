<?php namespace DaemonExamples;

use \League\Event\AbstractListener;
use \League\Event\EventInterface;
 
class ChangeNameListener extends AbstractListener {

    public function handle(EventInterface $event) {

        $worker = $event->getWorker()->getInstance();

        $worker->changeName();

        return true;

    }

}
