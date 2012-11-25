<?php
/**
 * ThreadTask file
 *
 * PHP version 5
 *
 * @category  Console
 * @package   app.Console.Command.Task
 * @author    Nicolas Ramy-Sepou <nicolas.ramy@darkelda.com>
 * @link      http://darkelda.com/
 * @license   All rights reserved
 */

class ThreadTask extends Shell
{
    //public $uses = array('Beanstalkd');

    public function execute()
    {
        return $this->start();
    }

    public function start()
    {
        $parent_id = pcntl_fork();
        if ($parent_id == -1) {
            $this->out($this->error);
            exit;
        } elseif ($parent_id) {
            exit;
        } else {
            $id = posix_setsid();
            chdir('/tmp');
            umask(0);
            touch('hello');
            // reserve
            return posix_getpid();
        }
    }

    public function stop()
    {

    }

    // status
}