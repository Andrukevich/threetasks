<?php

namespace App;

class Task1
{
// доступ возможен только к конструктору класса и get методам,
// остальные методы и все свойства защищены инкапсуляцией

    protected $array;
    protected $arr_count;
    protected $mas_check;

    public function __construct($array)
    {
        $this->array = $array;
        $this->arr_count = count($array);
        $this->mas_check = [];
        self::combination(-1);
    }

    public function get_array()
    {
        return $this->array;
    }

    public function get_arr_count()
    {
        return $this->arr_count;
    }

    public function get_mas_check()
    {
        return $this->mas_check;
    }

    protected function wap(&$arr, $i, $j)
    {
        $c = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $c;
    }

    protected function combination($k)
    {
        $cur_value = '';
        if ($k == $this->arr_count - 1) {
            foreach ($this->array as $value) {
                $cur_value .= $value;
            }
            array_push($this->mas_check, $cur_value);
            $cur_value = '';
        } else {
            for ($j = $k + 1; $j < $this->arr_count; $j++) {
                self::wap($this->array, $k + 1, $j);
                self::combination($k + 1);
                self::wap($this->array, $k + 1, $j);
            }
        }
    }


}



