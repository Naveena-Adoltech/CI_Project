<!DOCTYPE html>
<html>
     <head>
        <title>Add Book</title>
        <link rel="stylesheet" href="https://bootswatch.com/3/united/bootstrap.min.css">
     </head>
  <body>
   <center>
    <h1>Add Book</h1>
<form method="post" action="<?php echo base_url('dashboard/add_book');?>">
   <label>Author</label>
   <input type="text" name="author" required><br><br>
   <br>
   <label>Title</label>
   <input type="text" name="title" required><br><br>
   <br>
   <label>Published_year</label>
   <input type="text" name="published_year" required><br><br>
   <br>
   <label>Quantity</label>
   <input type="number" name="quantity" required><br><br>
   <br>
   
  

   <input type="submit" value="Add Book" class="btn btn-danger">
</form>
</center>
</body>
</html>