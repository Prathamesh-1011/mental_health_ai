<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration | PHP</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: left;

  }

  .container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 10);
    text-align: center;
  }

  h1 {
    font-size: 44px;
    color: #333333;
  }

  label {
    font-weight: bolder;
    color: #555555;
    align-content: center;
  }

  input[type="text"],
  input[type="email"],
  input[type="password"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 1px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #ffffff;
    font-size: 16px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #0056b3;
  }
</style>

</head>
<body>

<div>
    <?php
    
    ?>  
</div>

<div>
    <form action="registration.php" method="post" >
        <div class="container">
            
            <div class="row">
                <div class="col-sm-3">
                    <h1>REGISTRATION</h1>
                    <p>Please fill the form with correct information.</p>
                    <hr class="mb-3">
                    <label for="firstname"><b>First Name</b></label>
                    <input class="form-control" id="firstname" type="text" name="firstname" required>

                    <label for="lastname"><b>Last Name</b></label>
                    <input class="form-control" id="lastname"  type="text" name="lastname" required>

                    <label for="email"><b>Email Address</b></label>
                    <input class="form-control" id="email"  type="email" name="email" required>

                    <label for="phonenumber"><b>Phone Number</b></label>
                    <input class="form-control" id="phonenumber"  type="text" name="phonenumber" required>

                    <label for="password"><b>Password</b></label>
                    <input class="form-control" id="password"  type="password" name="password" required>
                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function(){
        $('#register').click(function(e){

            var valid = this.form.checkValidity();

            if(valid){


            var firstname   = $('#firstname').val();
            var lastname    = $('#lastname').val();
            var email       = $('#email').val();
            var phonenumber = $('#phonenumber').val();
            var password    = $('#password').val();
            

                e.preventDefault(); 

                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: {firstname: firstname,lastname: lastname,email: email,phonenumber: phonenumber,password: password},
                    success: function(data){
                    Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'type': 'success'
                                })
                            
                    },
                    error: function(data){
                        Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors while saving the data.',
                                'type': 'error'
                                })
                    }
                });

                
            }else{
                
            }

            



        });     

        
    });
    
</script>
</body>
</html>