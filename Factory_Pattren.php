<?php
// Factory pattren
interface ProductInterface {
    public function method();
}

class A implements ProductInterface {
    public function method() { return 'Class A method'; }
}

class B implements ProductInterface {
    public function method() { return 'Class B method'; }
}
class Factory
{
	public function create($class)
	{
		switch ($class) {
			case 'A':
				return new A();
			case 'B':
				return new B();
			default:
				throw new InvalidArgumentException("Unknown class $class");
		}
	}
}

$Factory = new Factory();
$object = $Factory->create('B');
echo $object->method();


