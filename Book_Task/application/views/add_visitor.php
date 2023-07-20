<!DOCTYPE html>
<html>
     <head>
        <title>Add Visitor</title>
        <link rel="stylesheet" href="https://bootswatch.com/3/united/bootstrap.min.css">
     </head>
  <body>
   <center>
    <h1>Add Visitor</h1>
<form method="post" action="<?php echo base_url('dashboard/add_visitor');?>">
   <label>Name</label>
   <input type="text" name="name" required><br><br>
   <br>
   
   <input type="submit" value="Add Visitor" class="btn btn-danger">
</form>
</center>
</body>
</html>