<?php namespace DaemonExamples;

use \Comodojo\Daemon\Daemon as AbstractDaemon;
use \Comodojo\RpcServer\RpcMethod;

class EchoDaemon extends AbstractDaemon {

    public function setup() {

        // define the echo method using lambda function
        $echo = RpcMethod::create("examples.echo", function($params, $daemon) {
            $message = $params->get('message');
            return $message;
        }, $this)
            ->setDescription("I'm here to reply your data")
            ->addParameter('string','message')
            ->setReturnType('string');

        // inject the method to the daemon internal RPC server
        $this->getSocket()
            ->getRpcServer()
            ->methods()
            ->add($echo);
            
    }

}