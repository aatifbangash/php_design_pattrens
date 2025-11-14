<?php
interface LoggerInterface
{
    public function log(string $message);
}

class BasicLogger implements LoggerInterface
{
    public function log(string $message)
    {
        echo $message;
    }
}

class TimestampLogger implements LoggerInterface
{
    public function __construct(private LoggerInterface $logger) {}

    public function log(string $message)
    {
        $this->logger->log("[" . date('Y-m-d H:i:s') . "] " . $message);
    }
}

$logger = new TimestampLogger(new BasicLogger());
$logger->log("Hello World!");
