# daemon-examples

This repository contains examples of daemons built with [comodojo/daemon](https://github.com/comodojo/daemon).

For more information please check the [comodojo/daemon documentation](https://docs.comodojo.org/projects/daemon/en/latest).

## Usage

First clone the repository and install dependencies using composer:

`` composer install ``

Once the installation is complete, use the scripts in the */bin* folder to launch daemons and clients.

## Package content

In the */src/DaemonExamples* folder:

1. EchoDaemon: a daemon that replicates user messages via RPC socket
3. CopyDaemon: a daemon that uses a worker to copy a file every {looptime} seconds
4. CopyWorker: the worker for the CopyDaemon

In the */bin* folder:

1. echodaemon: launch script for the EchoDaemon
2. echodaemon_client: client to interact with the EchoDaemon
3. copydaemon: launch script for the CopyDaemon
4. copydaemon_client: client to interact with the CopyDaemon