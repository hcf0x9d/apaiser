<?php
session_start();
include "include/includes.php";
$mode=$_GET['mode'];
$username=$_SESSION['username'];
if (!$username)
{ header("Location: login.php?mode=failed"); }
if (isset($_POST['operation'])){
	$arr_ids=$_POST['ch'];
	$str_ids=join(",",$arr_ids);

  if($_POST['operation']=="delete")
	{
		$sql="DELETE from sys_subject WHERE id IN ($str_ids)";
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
<h3>View All Subjects - <small>( Below are the subjects which shows as dropdown select option in contact form. )</small> </h3>
<p>&nbsp;</p>

<?php if ($success)
{
	print "<div class='infobox success'><a href='#' class='close'><img src='img/close.png' title='Close' alt='close'/></a><div>$success</div></div>";
}?>
<?php if ($mode == "addsuccess")
{
    print "<div class='infobox success'><a href='#' class='close'><img src='img/close.png' title='Close' alt='close'/></a><div>Subject Added Successfully</div></div>";
} ?>
<?php if ($mode == "editsuccess")
{
    print "<div class='infobox success'><a href='#' class='close'><img src='img/close.png' title='Close' alt='close'/></a><div>Successfully Updated</div></div>";
} ?>
<div class="clear"></div> 
	<form method="post" name="subjectform" action="sall.php">
                         <input type="hidden" name="operation" value="">
						<table>
							<thead>
								<tr>
								   <th><input name="selectall" type="checkbox" value='-1' onClick="javascript:SelectAll();"></th>
								   <th>Subject</th>
								   <th>Email</th>
								   <th>Action</th>
								   	</tr>
								
							</thead>
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
													 <input type="button" class="button" name="Delete" value="Delete" onclick="javascript:deleteit();">		<a href="sadd.php" class="button">Add New</a>			
				    			</div>
								
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
<?php $arr_subject = subjectFetchAll($arr_parameters);
if (is_array($arr_subject))
{
foreach ($arr_subject as $subject)
{
?>
	<tr>
									<td><input type="checkbox" name="ch[]" value="<?php echo $subject['id']; ?>"></td>
									<td><?php echo $subject['subject']; ?></td>
									<td><?php echo $subject['email']; ?></td>
												<td>
										<!-- Icons -->
										 <a href="sedit.php?id=<?=$subject['id']?>" title="edit" class="button">edit</a>
									</td>
								</tr><?php

}
}

?>
		</tbody>
							
						</table></form>

				<?php include "include/footer.php"; ?>	