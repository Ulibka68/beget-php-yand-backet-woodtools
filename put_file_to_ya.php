#!/usr/bin/env php7.3
<?php
require 'aws_functions.php';

if ($argc != 3) {
    die(PHP_EOL . 'Use: php put_file_to_ya.php fileName destFileName' . PHP_EOL);
};

AWSputObject ($argv[2], realpath( $argv[1]));