<?php
App::uses('AppModel', 'Model');
App::uses('Shell');
/**
 * Worker Model
 */
class Worker extends AppModel
{

    public function start()
    {
        Shell::runCommand('nautilus');
    }
}
