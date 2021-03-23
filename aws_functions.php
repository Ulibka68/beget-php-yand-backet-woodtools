<?php
require './vendor/autoload.php';
$config = require 'config.php';

function initAws() {
    global $config;

    $sharedConfig = [
        'credentials' => [
            'key'      => $config['credentials']['key'],
            'secret'   => $config['credentials']['secret'],
        ],
        'region'   => $config['region'],
        'endpoint' => $config['endpoint'],
        'version'  => 'latest',
    ];

    $sdk = new Aws\Sdk($sharedConfig);
    global $s3Client;
    $s3Client = $sdk->createS3();
}

function AWSputObject(string $fname,string $fpath) {
    global $s3Client,$config;
    try {
        $s3Client->putObject([
            'Bucket' => $config['backet-name'],
            'Key'    => $fname,
            'Body'   => fopen($fpath, 'r')
        ]);

    } catch (Aws\S3\Exception\S3Exception $e) {
        echo "There was an error uploading the file.",$fname , "\n";
    }
}

initAws();