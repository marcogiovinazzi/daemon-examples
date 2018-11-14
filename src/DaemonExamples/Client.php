<?php namespace DaemonExamples;

use \Comodojo\Daemon\Socket\SocketTransport;
use \Comodojo\RpcClient\RpcClient;

class Client {

    const SOCKET_ADDRESS = 'tcp://127.0.0.1:10042';

    public static function create($socket_addr = null) {

        $remote = empty($socket_addr) ? self::SOCKET_ADDRESS : $socket_addr;

        return new RpcClient(
            $remote,
            null,
            SocketTransport::create($remote)
        );

    }

}