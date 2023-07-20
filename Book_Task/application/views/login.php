<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> User Login Form </title>
		<link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>  
<div>
    <center>
     
       <h1 align="center">Login Form</h1>

					   <form method="post" autocomplete="off" action="<?=base_url('auth/loginNow')?>">


						    <label for="exampleInputEmail1" class="form-label">Email address</label>
						    <input type="email"  placeholder="Email Address" name="email" class="form-control" id="exampleInputEmail1"> 
						    <br>
						
						    <label for="exampleInputPassword1" class="form-label">Password</label>
						    <input type="password" name="password"  placeholder="User Password"  class="form-control" id="exampleInputPassword1">
						    <br>
                            <br>
						    <div class="text-center">
						    <button type="submit" class="btn btn-primary">Login Now</button>
						   </div>

					     <?php
						   if($this->session->flashdata('error')) {	?>
						 <p class="text-danger text-center"> <?=$this->session->flashdata('error')?></p>
						<?php } ?>
						
                </form>
                <br>
               <a href = <?=base_url('auth/index')?>>Register</a>
    </center>
</div>
</body>
</html>

    