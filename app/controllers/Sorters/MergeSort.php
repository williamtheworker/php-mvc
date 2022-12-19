<?php

class MergeSort
{
    public function sort($arr)
    {
        if(count($arr) == 1)
        {
            return $arr;
        }

        $mid = count($arr)/2;
        $left = array_slice($arr, 0, $mid);
        $right = array_slice($arr, $mid);

        $left = $this->sort($left);
        $right = $this->sort($right);

        return $this->merge($left, $right);
    }

    public function merge($left, $right) 
    {
        $result=array();
        $leftIndex=0;
        $rightIndex=0;
     
        while($leftIndex<count($left) && $rightIndex<count($right))
        {
            if($left[$leftIndex]>$right[$rightIndex])
            {
     
                $result[]=$right[$rightIndex];
                $rightIndex++;
            }
            else
            {
                $result[]=$left[$leftIndex];
                $leftIndex++;
            }
        }
        while($leftIndex<count($left))
        {
            $result[]=$left[$leftIndex];
            $leftIndex++;
        }
        while($rightIndex<count($right))
        {
            $result[]=$right[$rightIndex];
            $rightIndex++;
        }
        return $result;
    }
}