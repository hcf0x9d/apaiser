<?php
session_start();
include "include/includes.php";
$username=$_SESSION['username'];
if (!$username)
{ header("Location: login.php?mode=failed"); }
if (isset($_POST['operation'])){
	$arr_ids=$_POST['ch'];
	$str_ids=join(",",$arr_ids);

  if($_POST['operation']=="delete")
	{
		$sql="DELETE from sys_mail WHERE id IN ($str_ids)";
      $rset = mysql_query($sql);
    if (mysql_affected_rows() > 0) {
	$success="Successfully deleted";
}
	}else
	{
		$errmsg="Encountered some problem. Please try again later.";
	}
}
?>
<?php include "include/header.php"; ?>
<div id="content">			
<script type="text/javascript" src="js/cjs.js"></script>			
<h2>Welcome <?php echo $username; ?></h2>
<p>&nbsp;</p>
<h3>Contact Form Submissions</h3>
<p>&nbsp;</p>

<?php if ($success) {
    print "<div class='infobox success'><a href='#' class='close'><img src='img/close.png' title='Close' alt='close'/></a><div>$success</div></div>";
} ?>	

	
			<div class="clear"></div> 
						<form method="post" name="subjectform" action="index.php">
                         <input type="hidden" name="operation" value="">
						<table>
							<thead>
								<tr>
								   <th><input name="selectall" type="checkbox" value='-1' onClick="javascript:SelectAll();"></th>
								   <th>Name</th>
								   <th>Email</th>
                                   <th>Subscription</th>
								   <th>Date</th>
								   <th>Action</th>
								   	</tr>
								
							</thead>
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="alignleft">
													 <input type="button" class="button" name="Delete" value="Delete" onclick="javascript:deleteit();">				
				    			</div>
								
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
<?php $arr_mails = mailFetchAll($arr_parameters);
if (is_array($arr_mails)) {
    foreach ($arr_mails as $mails) {
?>
	<tr>
									<td><input type="checkbox" name="ch[]" value="<?php echo $mails['id']; ?>"></td>
									<td><?php echo $mails['name']; ?></td>
									<td><?php echo $mails['email']; ?></td>
									<td><?php echo $mails['subscribed']; ?></td>
									<td><?php echo $mails['date']; ?></td>
											<td>
										<!-- Icons -->
										 <a href="send.php?id=<?php echo $mails['id'] ?>" title="send mail" class="button">Read / Reply</a>
									</td>
								</tr>
<?php

    }
}else{
echo "<tr><td colspan=\"6\">No Records</td></tr>";
} 

?>

							
								
							
							</tbody>
							
						</table></form>

				<?php include "include/footer.php"; ?>	