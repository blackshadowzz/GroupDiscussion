<?php

function insertData($conn,$sql,$data):bool{
    if(count($data)==0) return false;
    if($stmt=$conn->prepare($sql)){

        if($stmt->execute($data)){
            return true;
        }
            return false;
    }

}
