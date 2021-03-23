<?php

$dir_OS = "F:/tempg/2/";

for ($i=1;$i<10;$i++) {
    $fname = $dir_OS . 'wt_arch '.$i.'.tar.gz';
    file_put_contents($fname,$fname);
}