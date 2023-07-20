<!DOCTYPE html>
<html>
    <head>
        <title> Visitors </title>
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
            <h3> Visitors </h3>
            <table class="table table-bordered">
                <table border="1">
                        <tr>
                            <th scope="col"> Name </th>
                            <th scope="col"> CheckOut Time </th>
                           
                        </tr>
                        <?php foreach ($visitors as $visitor):?>
                            <tr>
                                <td><?php echo $visitor->name;?></td>
                                 <td><?php echo date('H:i:s');?></td>
                                 <td>
                                <a href="<?php echo base_url('dashboard/edit_visitor/'.$visitor->visitor_id);?>">Edit</a>
                                <a href="<?php echo base_url('dashboard/delete_visitor/'.$visitor->visitor_id);?>">  Delete</a>
                                <a href="<?php echo base_url('dashboard/add_visitors/');?>">  Add Visitor</a>
                            </td>  
                            </tr>
                        <?php endforeach; ?>
                    </table>
            </table>
         </div>
     </nav>
    </center>
 </body>
</html>

      


