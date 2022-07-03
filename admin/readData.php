<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Data from Database</title>
    <?php include_once './bootrap.php' ?>
    
</head>
<body>
    <?php include_once './../assets/navbar.php' ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Administration Information</h2>
                    </div>
                    
                <div class="mb-2">
                    <div class="text-info">
                        <?php 
                            include_once './deleteData.php';
                            echo $mes;
                        ?>

                    </div>
                </div>
                <?php 
                    require_once './connectDB.php';
                    
                    $sql="SELECT * FROM `admin`";
                    $admins=$conn->query($sql);

                    if($admins->rowCount()>0){
                        echo "<table class='table table-striped table-hover'>";
                        echo "<thead>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Username</th>";
                            echo "<th>Phone</th>";
                            echo "<th>Email Address</th>";
                            echo "<th>Password</th>";
                            echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($adm=$admins->fetch()){
                            echo "<tr>";
                                echo "<td>".$adm['ID']."</td>";
                                echo "<td>".$adm['username']."</td>";
                                echo "<td>".$adm['phone']."</td>";
                                echo "<td>".$adm['email']."</td>";
                                echo "<td>".$adm['password']."</td>";
                                echo "<td>";
                                    echo "<a href='./deleteData.php?id=".$adm['ID']."' class='bi bi-trash'></a>";
                                    // echo nl2br("\t");
                                    // echo "<a href='' class='bi bi-card-text'></a>";
                                    echo nl2br("\t| ");
                                    echo "<a href='./editData.php?id=".$adm['ID']."' class='bi bi-file-earmark-medical'></a>";
                                echo "</td>";
                                
                            echo "</tr>";
                        }
                        echo "</tbody>";

                        echo "</table>";
                    }else{
                        echo "Datas not found!";
                    }

                ?>
                    <div class="card-footer">
                        <div class="mb-1 mt-1">
                            <a href="./insertData.php">
                                <label for="" class="text-info" style="font-size: 20px;" >Create New Admin</label>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>