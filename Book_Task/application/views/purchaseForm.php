<style>
    .center-align {
        display: flex;
        justify-content: center;
    }

    .center-table {
        margin: 0 auto;
    }

    .added-button {
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
<?php echo "<button type='submit' class='btn btn-primary' style='position: fixed; top: 10px; right: 10px;' onclick=\"window.location.replace('view_items');\">View</button>"; ?>

<?php
if (isset($_GET['visitor'])) {
    $visitorName = $_GET['visitor'];
    echo "<h2><div class='center-align'><b>Visitor: " . $visitorName . "</b></h2></div>";

    // Example book data
    $books = [
        ['id' => 1, 'title' => 'Introduction to Computers', 'quantity' => 5],
        ['id' => 2, 'title' => 'Mobile Computing', 'quantity' => 5],
        ['id' => 3, 'title' => 'Artificial Intelligence', 'quantity' => 5],
        ['id' => 4, 'title' => 'Programming in MATLAB', 'quantity' => 5],
        ['id' => 5, 'title' => 'Database systems concepts', 'quantity' => 5],
    ];

    echo "<h4 class='center-align'>Book List</h4>";
    echo "<div class='center-align'>";
    echo "<table class='center-table'>";
    echo "<tr><th>Book Purchased</th><th>Quantity</th><th>Action</th></tr>";
    foreach ($books as $book) {
        echo "<tr>";
        echo "<td>" . $book['title'] . "</td>";
        echo "<td>";
        echo "<select name='quantity[" . $book['id'] . "]'>";
        for ($i = 0; $i <= $book['quantity']; $i++) {
            echo "<option value='" . $i . "'>" . $i . "</option>";
        }
        echo "</select>";
        echo "</td>";
        echo "<td>";
        echo "<button type='button' class='add-to-cart' data-book-id='" . $book['id'] . "' data-visitor-name='" . $visitorName . "'>Add</button>";
        echo "<span class='added-message' style='display: none;'>Added</span>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.add-to-cart').click(function() {
            var button = $(this);
            var bookId = button.data('book-id');
            var quantity = button.parent().prev().find('select').val();
            var visitorName = button.data('visitor-name');

            // Send an AJAX request to add the book to the cart
            $.ajax({
                url: '<?php echo base_url();?>dashboard/insert_items',
                method: 'POST',
                data: {
                    bookId: bookId,
                    quantity: quantity,
                    visitorName: visitorName
                },
                success: function(response) {
                    // Change the button text to "Added"
                    button.text('Added');
                    button.addClass('added-button');
                    button.attr('disabled', true);

                }
            });
        });
    });
</script>

<?php
} else {
    echo "No visitor specified.";
}
?>
