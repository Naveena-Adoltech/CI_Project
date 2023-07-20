<h1> Update Process </h1>

<?php
foreach($visitors as $visitor)
{
?>
<form method="post" action="<?php echo base_url('dashboard/update_visitor');?>">
<table width="600" border="1" cellspacing="5" cellpadding="5">
<input type="hidden" name="visitor_id" value="<?php echo $visitor->visitor_id; ?>"> 
    <tr>
    <td> Name </td>
    <td> <input type=text name="name" value="<?php echo $visitor->name; ?>" /></td>
</tr>
    <td colspan="2" align="center">
    <input type=submit name="update" value="Update_Records" /></td>
</tr>

</table>
</form>

<?php } ?>