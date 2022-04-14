<?php

require 'vendor/autoload.php';

require 'Demo.php';

try {

    $demo = new Demo();
    $demo->InitializeAutoRedis();

} catch (Exception $e) {

	echo $e->getMessage();
}
