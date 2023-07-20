<!DOCTYPE html>
<html>
<head>
  <title>Items</title>
  <style>
  .book_returned-button {
    background-color: green;
    color: white;
}
</style>
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
  <script>
    function returnItem(itemId) {
        $.ajax({
            url: '<?php echo base_url();?>dashboard/return_item',
            method: 'POST',
            data: {itemId: itemId},
            success: function(response) {
                if (response.success) {
                    // Update the button to display "Returned"
                    var returnButton = $('#returnButton_' + itemId);
                    returnButton.text('Returned');
                    returnButton.removeClass('btn-primary').addClass('btn-success');
                    returnButton.attr('disabled', true);
                }
            }
        });
    }
</script>
<?php echo "<button type='submit' class='btn btn-primary' style='position: fixed; top: 10px; right: 10px;' onclick=\"window.location.replace('book_return');\">View</button>"; ?>

</head>
<body>
  <h2 class='align-center'>Items to be Returned</h2>
  <table>
    <tr>
        <th>Item ID</th>
        <th>Visitor Name</th>
        <th>Quantity</th>
        <th>Book Purchased</th>
        <th>Action</th>
    </tr>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?php echo $item->item_id; ?></td>
            <td><?php echo $item->visitor_name; ?></td>
            <td><?php echo $item->quantity; ?></td>
            <td><?php echo $item->book_purchased; ?></td>
            <td>
                <?php if ($item->book_returned): ?>
                    <button class="btn btn-success" disabled>Returned</button>
                <?php else: ?>
                    <form action="<?php echo base_url('dashboard/return_item'); ?>" method="post">
                        <input type="hidden" name="item_id" value="<?php echo $item->item_id; ?>">
                        <button type="submit" class="btn btn-primary">Return</button>
                    </form>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
