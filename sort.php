<?php

class arraySort {

    private $array;

    public function getArray(int $count)
    {
        $this->array = [];

        for ($i = 1; $i <= $count; $i++) {
            $this->array[] = rand(0, 100);
        }
        return $this->array;
    }

    public function showArray(array $array)
    {
        $unsort = '[' . implode(', ', $this->array) . ']';
        return $unsort;
    }
    public function sortArray(array $array)
    {
        for ($i = 0; $i < count($array) - 1; $i++){
            for ($j = 0; $j < count($array) - $i - 1; $j++) {
                if ($this->array[$j] > $this->array[$j + 1]) {
                    $abstractElement     = $this->array[$j];
                    $this->array[$j]     = $this->array[$j + 1];
                    $this->array[$j + 1] = $abstractElement;
                }
            }
        }
        return $array;
    }
    public function minValue(array $array)
    {
        return $this->array[0];
    }
}

$array1 =  new arraySort();
$arrayUnsorted = $array1->getArray(10);
echo "unsorted array = " . $array1->showArray($arrayUnsorted) . PHP_EOL;
$arraySort = $array1->sortArray($arrayUnsorted);
echo "sorted array   = " .  $array1->showArray($arraySort) . PHP_EOL;
echo "smallest value = " . $array1->minValue($arraySort);