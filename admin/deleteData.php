<?php
    require_once './connectDB.php';
    $mes="";
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM `admin` WHERE ID=$id";

        if($conn->exec($sql)){
            
            header("Location:readData.php");
            $mes="One record has been deleted!";
            $mes = '<script>alert("hrkkk");</script>';
            
        }else{
            $mes="Cannot delete!";
        }
    }
?>