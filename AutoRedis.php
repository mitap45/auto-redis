<?php

class AutoRedis extends Redis
{

    /**
     * AutoRedis constructor.
     * @param string $host
     * @param int $port
     * @param float $timeout
     * @param null $reserved
     * @param int $retryInterval
     * @param float $readTimeout
     * @param bool $prefixedWithCallingClassName
     */
    public function __construct(
        string $host,
        int $port = 6379,
        float $timeout = 0.0,
        $reserved = null,
        int $retryInterval = 0,
        float $readTimeout = 0.0,
        bool $prefixedWithCallingClassName = false
    )
    {
        parent::__construct();
        $this->connect($host, $port, $timeout, $reserved, $retryInterval, $readTimeout);

        if ($prefixedWithCallingClassName) {
            $this->setOption(Redis::OPT_PREFIX, self::get_calling_class());
        }

        echo $this->getOption(Redis::OPT_PREFIX);
    }

    private static function get_calling_class() {

        $trace = debug_backtrace();

        $class = $trace[1]['class'];

        for ($i=1, $iMax = count($trace); $i< $iMax; $i++ ) {
            if (isset($trace[$i]) && $class !== $trace[$i]['class'])
            {
                return $trace[$i]['class'];
            }
        }

        throw new RuntimeException('Calling class could not be found for prefix of the redis');
    }
}