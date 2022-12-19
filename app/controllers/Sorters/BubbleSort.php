<?php

class BubbleSort
{
    public function sort($arr)
    {
        $arrLen = count($arr);

        for($i=0; $i<$arrLen; $i++)
        {
            for($j=0; $j<($arrLen-$i-1); $j++)
            {
                if($arr[$j] > $arr[$j+1])
                {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j+1];
                    $arr[$j+1] = $temp;
                }
            }
        }

        return $arr;
    }
}