<?php namespace DaemonExamples;

use \Comodojo\Daemon\Daemon as AbstractDaemon;
use \Comodojo\RpcServer\RpcMethod;

class CopyDaemon extends AbstractDaemon {

    public function setup() {

        // define the changename method using lambda function
        $change = RpcMethod::create("handyman.changename", function($params, $daemon) {
            return $daemon->getWorkers()
            ->get("handyman")
            ->getOutputChannel()
            ->send('changename') > 0;
        }, $this)
            ->setDescription("Change the output file name")
            ->setReturnType('string');

        // inject the method to the daemon internal RPC server
        $this->getSocket()
            ->getRpcServer()
            ->methods()
            ->add($change);
            
    }

}