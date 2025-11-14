<?php
interface UserRepository
{
    public function find(int $id): array;
}

class MySQLUserRepository implements UserRepository
{
    public function find(int $id): array
    {
        return ['id' => $id, 'name' => 'John Doe'];
    }
}

class UserService
{
    public function __construct(private UserRepository $repo) {}

    public function getUser(int $id)
    {
        return $this->repo->find($id);
    }
}

$service = new UserService(new MySQLUserRepository());
print_r($service->getUser(1));
