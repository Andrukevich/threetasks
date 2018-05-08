<?php

namespace App;

class Task2
{
    //ДОПУЩЕНИЕ: не работает с отрицательными числами, т.к. для ускорения была взята стандартная функция range

// доступ возможен только к конструктору класса и get методам,
// остальные методы и все свойства защищены инкапсуляцией

    protected $primary_arr;
    protected $str;
    protected $matches;

//конструктор класса, который принимает массив
    public function __construct($primary_arr)
    {
        $this->primary_arr = $primary_arr;
        self::pattern();
        self::transfer();
    }

    public function get_primary_arr()
    {
        return $this->primary_arr;
    }

    public function get_matches()
    {
        return $this->matches;
    }


    //возвращает последовательностьчисел
    public function get_str()
    {
        return $this->str;
    }

    //нахождение совпадения по регулярному выражению
    protected function pattern()
    {
        $re = "/(\\d+)->(\\d+)/";
        preg_match_all($re, $this->primary_arr, $matches, PREG_SET_ORDER);
        $this->matches=$matches;
    }

// перевод последовательности чисел в массив
    protected function transfer()
    {
        $this->str = [];
        foreach ($this->matches as $key => $value) {
            foreach (range($value[1], $value[2]) as $number) {
                array_push($this->str, $number);
            }
        }
    }
}


