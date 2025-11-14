<?php
interface Logger
{
    public function log(string $message);
}

class ThirdPartyLogger
{
    public function writeLog(string $msg)
    {
        echo "3rd-party logging: $msg";
    }
}

class LoggerAdapter implements Logger
{
    public function __construct(private ThirdPartyLogger $logger) {}

    public function log(string $message)
    {
        $this->logger->writeLog($message);
    }
}

$appLogger = new LoggerAdapter(new ThirdPartyLogger());
$appLogger->log("Adapter Pattern Works!");
