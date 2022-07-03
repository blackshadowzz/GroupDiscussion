<?php 

        require_once './connectDB.php';
        $uname=$phone=$email=$pw="";
        $e_uname=$e_phone=$e_email=$e_pw="";
        //$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //get data from database to show 
        if(isset($_GET['id'])&& !empty($_GET['id'])){
            $id=$_GET['id'];
            //echo $id;
            $sql="SELECT * FROM `admin` WHERE ID=:id";
            $presql=$conn->prepare($sql);
            
            $presql->bindParam(":id",$pa_id);
            $pa_id=$id;
            $presql->execute();
            if($presql->rowCount()==1){
                $result=$presql->fetch(PDO::FETCH_ASSOC);
                
                $uname=$result['username'];
                $phone=$result['phone'];
                $email=$result['email'];
                $pw=$result['password'];
            }else{
                echo "not found!";
            }
        }

        //update data to Mysql 
        if(isset($_POST['id'])&& !empty($_POST['id'])){
            $id=$_POST['id'];
            $uname=$_POST['username'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $pw=$_POST['password'];
    
            $sqlUp="UPDATE `admin` SET username=:uname, phone=:phone, email=:email, `password`=:pw WHERE ID=:id";
            $stm=$conn->prepare($sqlUp);

            $stm->bindParam(":uname",$pa_name);
            $stm->bindParam(":phone",$pa_phone);
            $stm->bindParam(":email",$pa_email);
            $stm->bindParam(":pw",$pa_pw);
            $stm->bindParam(":id",$pa_id);

            $pa_id=$id;
            $pa_name=$uname;
            $pa_phone=$phone;
            $pa_email=$email;
            $pa_pw=$pw;
            
            if($stm->execute()){                
                header("Location:readData.php");
                exit;
            }
            else{
                echo "Cannot update!";
            }
        }else{
            echo "Try again!";
        }
        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Page</title>
    <?php include_once './bootrap.php'; ?>
</head>
<body>
    <?php include_once "./../assets/navbar.php"; ?>
    
    <div class="container">
        <form action="" method="post">
            <div class="card">
                <div class="card-header">
                    <h3>Update Admin Info</h3>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="" value="<?php echo $uname; ?>" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="" value="<?php echo $phone; ?>" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="" value="<?php echo $email; ?>" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" id="" value="<?php echo $pw; ?>" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Update Now</button>
                    <a href="./readData.php">
                        <label for="" class="btn btn-info">Cancel</label>
                    </a>
                    
            </div>
        </form>
    </div>
</body>
</html>