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
        <div class="py-5">
        <form action="api.php" method="post">
            <div class="input-group flex-nowrap w-50 mx-auto">
                <span class="input-group-text bg-info" id="addon-wrapping"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control" value="" placeholder="Enter your Username" aria-label="Username" aria-describedby="addon-wrapping" name="name" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' required>
              </div>
              <div class="input-group flex-nowrap w-50 mx-auto mt-4">
                <span class="input-group-text bg-info" id="addon-wrapping"><i class="bi bi-list-ol"></i></span>
                <input type="text" class="form-control"  placeholder="Enter your Age" aria-label="Username" minlength="2" maxlength="25" aria-describedby="addon-wrapping" onkeypress='return ((event.charCode >= 48 && event.charCode <= 57))' name="age" required>
              </div>
              <div class="text-center">
      
                  <button type="submit" class="btn btn-info mt-3 px-5" name="btnsubmit" onkeypress="return((event.charcode = 13))">Submit</button>
              </div>
        </form>
    </div>
<div class="PY-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Age</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require("include/config.php");
          
          $query = "SELECT * FROM users";
          $result = mysqli_query($conn,$query);
          if($result->num_rows>0){
              $count = 1;
              while($row = $result -> fetch_assoc()){
              echo'
              <tr>
              <th scope="row">.'.$count++.'</th>
              <td>'. $row["username"].'</td>
              <td>'. $row["age"].'</td>
              <td><div class="d-flex gap-3">
                <a href="update.php?id='.$row["id"].'" class="btn btn-primary btn-sm" title="edit"><i class="bi bi-pencil-fill"></i></a>
                <a href="delete.php?id='.$row["id"].'" class="btn btn-danger btn-sm title="cancel"><i class="bi bi-x-circle"></i></a>
              </div>
              </td>
            </tr>';
            }
            
          }
          ?>
        

          
        </tbody>
      </table>
    </div>
     </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
