<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> User Login Form </title>
</head>
<body>  
<div>
    <center>
    <form method="post" autocomplete="off" action="<?=base_url('welcome/loginNow')?>">
        <div class="container">
            
                <h1>Login</h1>
                <label for ="username"><b>Username:</b></label>
                <input class="form-control" type="username" name="username" required=""> <br>

                <label for="email"><b>Email:</b></label>
                <input class="form-control" type="email" name="email" required=""> <br>

                <label for="password"><b>Password:</b></label>
                <input class="form-control" type="password" name="password" required=""> <br>

                 <br>
                <button type="submit" name="submit">Login</button>

                <?php if($this->session->flashdata('success')) { ?>
                    <p class="text-success"> <?=$this->session->flashdata('success') ?> </p>
                    <?php } ?>
           </div>
    </form>
</center>
</body>
</html>