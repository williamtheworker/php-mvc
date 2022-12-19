<?php

include 'Sorters/BubbleSort.php';
include 'Sorters/MergeSort.php';

class Sorters extends Controller
{
    public function index() {
        echo 'you are in sort';
    }

    public function sort_data()
    {
        $result = array();
        $arr = str_split($_POST['text']);

        switch($_POST['strategy'])
        {
            case "bubble":
                $sort_result = new BubbleSort();
                break;
            case "merge":
                $sort_result = new MergeSort();
                break;
            default:
                throw new \Exception('No selected Strategy.');
        }

        $result['result'] = $this->clean_chars($sort_result->sort($arr));
        
        echo json_encode($result);
    }

    public function clean_chars ($arr)
    {
        for($i = 0; $i < count($arr); $i++) {
            $arr[$i] = htmlspecialchars($arr[$i]);
        }

        return $arr;
    }
}