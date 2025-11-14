<?php
interface Observer
{
    public function update(string $data);
}

interface Subject
{
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify(string $data);
}

class Blog implements Subject
{
    private array $observers = [];

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $this->observers = array_filter(
            $this->observers,
            fn ($o) => $o !== $observer
        );
    }

    public function notify(string $data)
    {
        foreach ($this->observers as $observer) {
            $observer->update($data);
        }
    }

    public function publish(string $title)
    {
        echo "Publishing: $title\n";
        $this->notify($title);
    }
}

class EmailSubscriber implements Observer
{
    public function update(string $data)
    {
        echo "Email sent about: $data\n";
    }
}

class SmsSubscriber implements Observer
{
    public function update(string $data)
    {
        echo "SMS sent about: $data\n";
    }
}

$blog = new Blog();
$blog->attach(new EmailSubscriber());
$blog->attach(new SmsSubscriber());

$blog->publish("Observer Pattern in PHP");
