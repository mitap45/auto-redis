<?php

require 'AutoRedis.php';

class Demo
{
    public function InitializeAutoRedis(): void
    {
        $redis = new AutoRedis('app_redis', 6379, prefixedWithCallingClassName: true);
    }
}