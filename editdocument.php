<?php 
session_start();
include('header.php');
?>
<body>
<div class="container">
<br>
<br>
<form action="editd.php" method="post">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><i class="icon-user icon-large"></i>&nbsp;Edit Multiple</strong>&nbsp;check first the radio button to edit the data you want to edit
                            </div>
                            <thead>
                                <tr>
								<th></th>
                                    <th>FileName</th>
									<th>FileFolder</th>
                                    <th>FileType</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
							if (isset($_SESSION['userType'])) {
							if($_SESSION['userType']=="U"){
							$query=mysql_query("select * from filetable where permission='U'")or die(mysql_error());}
							else if($_SESSION['userType']=="S"){
							$query=mysql_query("select * from filetable where permission='U' or permission='S'")or die(mysql_error());}
							else
							$query=mysql_query("select * from filetable ")or die(mysql_error());
							}
							while($row=mysql_fetch_array($query)){
							$id=$row['filename'];
							?>
                                
										<tr>
										<td>
										<input name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
                                         <td><?php echo $row['filename'] ?></td>
										 <td><?php echo $row['filepath'] ?></td>
                                         <td><?php echo $row['permission'] ?></td>

                                </tr>
                         <?php  } ?>
						 
                            </tbody>
                        </table>
						
						<button class="btn btn-success"  name="submit_mult" type="submit">
Edit
</button>
</form>
		    <p><a href="home.php" class="btn btn-success" target='_top'>Return</a></p>


</div>
</body>
</html>