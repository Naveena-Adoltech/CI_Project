<h1> Update Process </h1>

<?php
foreach($books as $book)
{
?>
<form method="post" action="<?php echo base_url('dashboard/update_book');?>">
<table width="600" border="1" cellspacing="5" cellpadding="5">

    <input type="hidden" name="id" value="<?php echo $book->book_id; ?>"> 
<tr>
    <td> Author </td>
    <td> <input type=text name="author" value="<?php echo $book->author; ?>" /></td>
</tr>
    <tr>
    <td> Title </td>
    <td> <input type=text name="title" value="<?php echo $book->title; ?>" /></td>
</tr>
<tr>
    <td>Published Year</td>
    <td> <input type=text name="published_year" value="<?php echo $book->published_year; ?>" /></td>
</tr>
<tr>
    <td>Quantity</td>
    <td> <input type=number name="quantity" value="<?php echo $book->quantity; ?>" /></td>
</tr>

<tr>
    <td colspan="2" align="center">
    <input type=submit value="Update_Records" /></td>
</tr>

</table>
</form>

<?php } ?>