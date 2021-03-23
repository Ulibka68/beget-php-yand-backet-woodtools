<?php
require 'aws_functions.php';

$dir_OS = "/home/w/woodtools/backups/";

function scan_dir()
{
    global $dir_OS;

    $files1 = scandir($dir_OS );
    $files1 = array_diff($files1, ['.', '..']);


    foreach ($files1 as $dir_l) {
        if (is_dir($dir_OS . $dir_l)) {
            echo "директория ", $dir_l, PHP_EOL;
        } else {
            if (substr($dir_l, -6) === 'tar.gz') {

                AWSputObject ( 'MYSQL_BACKUPS/'. $dir_l, $dir_OS .  $dir_l);
                echo "архив ",$dir_OS .  $dir_l, PHP_EOL;
                unlink($dir_OS .  $dir_l);
            }

        }
    }
    unset ($files1);

}

function main()
{
    initAws();
    scan_dir();
}

main();