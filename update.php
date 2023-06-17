<?php
 require("include/config.php");
 #fetch data y url id from dadtabse
 $id = "";
 $getName = "";
 $getAge = "";
 if(isset($_GET['id'])){


     $id = $_GET['id'];
     $qyery = "SELECT * FROM users WHERE id=$id";
     $result = mysqli_query($conn,$qyery);
     while($row = mysqli_fetch_array($result)){
        $getName = $row['username'];
        $getAge = $row['age'];
 }
 }
 
 #update form
 
 if(isset($_POST['btnsubmit'])){
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);
    if($name != "" && $age != ""){
        $upgquery = "UPDATE users SET username='$name',age='$age' WHERE id = '$id'";
        if (mysqli_query($conn,$upgquery)) {
                header("location:index.php");
        }
    }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<title>Todo list</title>
</head>
<body class="bg-light">
     <div class="container">
        <div class="text-center">
                <h2>UPdate</h2>
        </div>
        <div class="py-5">
        <form action="api.php" method="post">
            <div class="input-group flex-nowrap w-50 mx-auto">
                <span class="input-group-text bg-info" id="addon-wrapping"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control" value="<?php echo $getName?>" placeholder="Enter your Username" aria-label="Username" aria-describedby="addon-wrapping" name="name" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' required>
              </div>
              <div class="input-group flex-nowrap w-50 mx-auto mt-4">
                <span class="input-group-text bg-info" id="addon-wrapping"><i class="bi bi-list-ol"></i></span>
                <input type="text" class="form-control" value="<?php echo $getAge?>" placeholder="Enter your Age" aria-label="Username" minlength="2" maxlength="25" aria-describedby="addon-wrapping" onkeypress='return ((event.charCode >= 48 && event.charCode <= 57))' name="age" required>
              </div>
              <div class="text-center">
      
                  <button type="submit" class="btn btn-info mt-3 px-5" name="btnsubmit" onkeypress="return((event.charcode = 13))">Submit</button>
                  <button type="submit" onclick="canl()" class="btn btn-outline-danger mt-3 px-5 gap-2" name="btnsubmit">Cancel</button>

                </div>

        </form>
    </div>

        

          
        
     </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
<script>
    function canl() {
        window.location="index.php";
    }

</script>