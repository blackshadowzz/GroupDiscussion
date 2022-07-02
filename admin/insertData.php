<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Datas</title>
    <?php include_once "./bootrap.php" ?>
</head>
<body>
    <?php include_once './../assets/navbar.php' ?>
    
    <?php 
        require_once "./connectDB.php";
        include_once './functions.php';
        $mes=$view="";
        $e_name=$e_phone=$e_email=$e_pw="";
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $uname=$_POST['username'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $pw=$_POST['password'];
            if(empty($_POST['username'])){
                $e_name="Username cannot empty!";
            }elseif(empty($_POST['phone'])){
                $e_phone="Phone cannot empty!";
            }
            elseif(empty($_POST['email'])){
                $e_email="Email cannot empty!";
            }elseif(empty($_POST['password'])){
                $e_pw="Password cannot empty!";
            }else{
                $sql="INSERT INTO `admin`(username,phone,email,password)";
                $sql.="VALUES (?,?,?,?)";
                
                if(insertData($conn,$sql,[$uname,$phone,$email,$pw])){
                    $mes="One record has been created!"."\t";
                    $view="<a class'text-info' href='./readData.php'>View</a>";
                }else{
                    $mes="Create new record is failed, try again!";
                }
            }
            
        }
    ?>
    <div class="container mt-3">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="card">
                <div class="mb-3 mt-2" style="text-align: center;">
                <div class="text-primary" role="alert">
                    <?php 
                        echo $mes;
                        echo $view;
                    ?>
                </div>
                </div>
                <div class="card-header">
                    <strong>Register Admin</strong>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        <div class="text-danger" style="font-size:14px;">
                            <p>
                                <?php echo $e_name; ?>
                            </p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                        <div class="text-danger" style="font-size:14px;">
                            <p>
                                <?php echo $e_phone; ?>
                            </p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        <div class="text-danger" style="font-size:14px;">
                            <p>
                                <?php echo $e_email; ?>
                            </p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <div class="text-danger" style="font-size:14px;">
                            <p>
                                <?php echo $e_pw; ?>
                            </p>
                        </div>
                    </div>
                   
                    <div class="mb-2">
                        <button type="submit" class="btn btn-info">Create New</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>