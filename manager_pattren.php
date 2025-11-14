<?php
// Manager Pattren
interface LoggerInterface {
    public function log();
}

class FileLogger implements LoggerInterface {
    public function log() { return 'File Logger'; }
}

class DBLogger implements LoggerInterface {
    public function log() { return 'DB Logger'; }
}

class RedisLogger implements LoggerInterface {
    public function log() { return 'Redis Logger'; }
}
class LogManager
{
	private $drivers;

	public function __construct()
	{
		$this->registerDrivers();
	}

	public function driver($driver): LoggerInterface
	{
		if (!isset($this->drivers[$driver])) {
            throw new InvalidArgumentException("Unknown logger [$driver]");
        }
		return $this->drivers[$driver];
	}

	private function registerDrivers()
	{
		$this->drivers = [
			'file' =>  new FileLogger(),
			'db' =>  new DBLogger(),
			'redis' =>  new RedisLogger(),
		];
	}
}

$Logger = new LogManager();
echo $Logger->driver('redis')->log();
