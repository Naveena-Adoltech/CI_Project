<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> User Registration Form </title>
        <link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>  
<div>
    <center>
     
       <h1 align="center">Registration Form</h1>

					   <form method="post" autocomplete="off" action="<?=base_url('auth/register')?>">

                           <label for="exampleInputUsername1" class="form-label">Username</label>
						    <input type="username"  placeholder="username" name="username" class="form-control" id="exampleInputUsername1"> 
						    <br>
						

						    <label for="exampleInputEmail1" class="form-label">Email address</label>
						    <input type="email"  placeholder="Email Address" name="email" class="form-control" id="exampleInputEmail1"> 
						    <br>
						
						    <label for="exampleInputPassword1" class="form-label">Password</label>
						    <input type="password" name="password"  placeholder="User Password"  class="form-control" id="exampleInputPassword1">
						    <br>
                            <br>
						    <div class="text-center">
						    <button type="submit" class="btn btn-primary">Register Now</button>
						   </div>

					     <?php
						   if($this->session->flashdata('error')) {	?>
						 <p class="text-danger text-center"> <?=$this->session->flashdata('error')?></p>
						<?php } ?>
						
                </form>
                <br>
               <a href = <?=base_url('auth/login')?>>Login</a>
    </center>
</div>
</body>
</html>

    