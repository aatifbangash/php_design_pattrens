class Config
{
    private static ?Config $instance = null;

    private array $settings = [];

    private function __construct() {} // Prevent direct instantiation

    public static function getInstance(): Config
    {
        if (self::$instance === null) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    public function set(string $key, mixed $value): void
    {
        $this->settings[$key] = $value;
    }

    public function get(string $key): mixed
    {
        return $this->settings[$key] ?? null;
    }
}

$config = Config::getInstance();
$config->set('db', 'localhost');

echo Config::getInstance()->get('db');
