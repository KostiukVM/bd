<?php

class line
{
    private $array = [];

    public function add(int $value)
    {
        $this->array[] = $value;
    }

    public function isEmpty(): int
    {
        return empty($this->array);
    }

    public function get()
    {
        if (!$this->isEmpty()) {
            return array_shift($this->array);
        } else {
            return null;
        }

    }

    public function count()
    {
        return count($this->array);
    }

    public function clear(): array
    {
        return $this->array = [];
    }
}


$array2 = new line;

$array2->add(10);
$array2->add(11);
$array2->add(12);

echo var_dump($array2) . PHP_EOL;
echo 'count = ' . $array2->count() . PHP_EOL;
echo 'get = ' . $array2->get() . PHP_EOL;
echo 'count 2 = ' . $array2->count() . PHP_EOL;
echo var_dump($array2) . PHP_EOL;

echo $array2->clear() . PHP_EOL;
echo 'count 3 = ' . $array2->count() . PHP_EOL;
echo var_dump($array2) . PHP_EOL;
