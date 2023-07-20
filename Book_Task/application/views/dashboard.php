<!DOCTYPE html>
<html>
    <head>
        <title> Dashboard</title>
        <link rel="stylesheet" href="https://bootswatch.com/3/cosmo/bootstrap.min.css">
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js" ></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
      
    </head>
<body>  
    <nav class="navbar navbar-inverse">
           <ul class="nav navbar-nav"> <br>
              <li><a href="<?php echo base_url('dashboard/Books');?>">Books <br></a></li> 
              <li><a href="<?php echo base_url('dashboard/Visitors');?>">Visitors</a></li>
              <li><button type="submit" class="btn btn-primary" onclick="window.location.replace('fetch_names');">Check Out</button></li>
              <li><button type="submit" class="btn btn-primary" onclick="window.location.replace('check_in');">Check In</button></li>
            </ul> 
            <ul class="nav navbar-nav navbar-right">
                <li> <a href="<?php echo base_url('auth/logout');?>">Logout</a></li>
            </ul>
     </nav>

</body>
</html>

