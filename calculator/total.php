<?php
        $firstNum = $_POST['firstNum'];
        $secondNum = $_POST['secondNum'];
        $cal_tool = $_POST['cal'];

        echo $firstNum.$cal_tool.$secondNum.'=';

        if($cal_tool == '+'){
          $total = $firstNum + $secondNum;
          echo $total;
        }elseif($cal_tool == '-'){
          $total = $firstNum - $secondNum; 
          echo $total;
        }elseif($cal_tool == '*'){
          $total = $firstNum * $secondNum; 
          echo $total;
        }else{
          $total = $firstNum / $secondNum; 
          echo $total;
        }


    ?>