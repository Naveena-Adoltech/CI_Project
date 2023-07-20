<!DOCTYPE html>
<html>
<head>
  <title>Items</title>
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
  <h2>Returned Items</h2>
  <table>
    <tr>
      <th>Item ID</th>
      <th>Book ID</th>
      <th>Visitor ID</th>
      <th>Visitor Name</th>
      <th>Quantity</th>
      <th>Book_Returned</th>
    </tr>
    <?php foreach ($items as $item): ?>
    <tr>
      <td><?php echo $item->item_id; ?></td>
      <td><?php echo $item->book_id; ?></td>
      <td><?php echo $item->visitor_id; ?></td>
      <td><?php echo $item->visitor_name; ?></td>
      <td><?php echo $item->quantity; ?></td>
      <td><?php echo $item->book_returned; ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
