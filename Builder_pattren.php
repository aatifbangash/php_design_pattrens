<?php
class User
{
    public function __construct(
        public string $name,
        public int $age,
        public ?string $email = null
    ) {}
}

class UserBuilder
{
    private string $name;
    private int $age;
    private ?string $email = null;

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function build(): User
    {
        return new User($this->name, $this->age, $this->email);
    }
}

$user = (new UserBuilder())
    ->setName("Alice")
    ->setAge(25)
    ->setEmail("alice@example.com")
    ->build();

print_r($user);
