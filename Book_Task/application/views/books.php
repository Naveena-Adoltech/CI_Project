
<!DOCTYPE html>
<html>
    <head>
        <title> Books </title>
        <style>
     table {
         font-family: arial, sans-serif;
         border-collapse: collapse;
         width: 100%;
        }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
          }

    tr:nth-child(even) {
    background-color: #dddddd;
        }
</style>
   </head>
   <body> 
    <center> 
      <nav class="navbar navbar-inverse">
          <div class="container">
              <h3><center> Books </center></h3>
                  <table border="1">
                        <tr>
                           
                            <th> Title </th>
                            <th> Author </th>
                            <th> Published_year </th>
                            <th> Quantity</th>
                            <th> Price </th>
                            
                            
                           
                        </tr>
                           <?php foreach($books as $book):?>
                        <tr>
                           
                            <td><?php echo $book->title;?></td>
                            <td><?php echo $book->author;?></td>
                            <td><?php echo $book->published_year;?></td>
                            <td><?php echo $book->quantity;?></td>
                            <td><?php echo $book->price;?></td>

                            <td>
                                <a href="<?php echo base_url('dashboard/edit_book/'.$book->book_id);?>">Edit</a>
                                <a href="<?php echo base_url('dashboard/delete_book/'.$book->book_id);?>">  Delete</a>
                                <a href="<?php echo base_url('dashboard/add_books/');?>">  Add Book</a>
                            </td>  
                        </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </nav>
    
    </center>
    </body>  
</html>  


