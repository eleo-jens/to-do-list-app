<?php

    if(isset($_POST['item'])){
        require '../config.php';

        $title = $_POST['item'];

        if(empty($title)){
            header("Location: ../index.php?mess=error");
        }
        else{
            $stmt = $conn->prepare("INSERT INTO todos(title) VALUE(?)");
            $res = $stmt->execute([$title]);

            if($res){
                header("Location: ../index.php?mess=success");
            }
            else{
                header("Location: ../index.php");
            }
            $conn = null;
            exit();
        }
    }
    else{
        header("Location: ../index.php?mess=error");
    }
?>