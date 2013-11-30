<?php

$parent_id = pcntl_fork();
if ($parent_id == -1) {
    //$this->out($this->error);
    exit;
} elseif ($parent_id) {
    exit;
} else {
    posix_setsid();
    chdir('/tmp');
    umask(0);
    touch('hello');
    while(true) {
        file_put_contents('/tmp/hello', 'world' . PHP_EOL, FILE_APPEND);
    }
    return posix_getpid();
}
