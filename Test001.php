<?php
    /*header('Content-Type:application/json; charset=UTF-8');*/
    // 定資料類型為 JSON 編碼 utf8

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_GLOBALS['HTTP_RAM_POST_DATA'])){
            echo "8888877";
        }else{
            echo "777788";
        }
    }else{
        echo "ErrOr";
    }

?>
