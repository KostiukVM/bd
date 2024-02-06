<?php
class Stack
{
    private $array = [];

    public function add(int $value)
    {
        $this->array[] = $value;
    }

    public function isEmpty():int
    {
        return empty($this->array);
    }
    public function get()
    {
        if (!$this->isEmpty()){
            return array_pop($this->array);
        } else {
            return null;
        }

    }

    public function count()
    {
        return count($this->array);
    }

    public function clear() :array
    {
       return $this->array = [];
    }
}


$array1 = new Stack;

$array1->add(10);
$array1->add(11);
$array1->add(12);

echo var_dump($array1) . PHP_EOL;
echo 'count = ' . $array1->count() . PHP_EOL;
echo 'get = ' . $array1->get() . PHP_EOL;
echo 'count 2 = ' . $array1->count() . PHP_EOL;
echo var_dump($array1) . PHP_EOL;

echo $array1->clear() . PHP_EOL;
echo 'count 3 = ' . $array1->count() . PHP_EOL;
echo var_dump($array1) . PHP_EOL;
