<?php include('header.php'); ?>
<body>

    <div class="row-fluid">
        <div class="span12">


         

            <div class="container">

<br><br>
							<form method="post" action="deleteuser.php" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <div class="alert alert-info">
                              
                                <strong><i class="icon-user icon-large"></i>&nbsp;Delete Multiple Data</strong>
								&nbsp;&nbsp;Check the radion Button and click the Delete button to Delete Data 
                            </div>
                            <thead>
						
                                <tr>
                                    <th></th>
                                    <th>UserName</th>
                                    <th>UserType</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$query=mysql_query("select * from usertable")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['username'];
							?>
                              
										<tr>
										<td>
										<input name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
                                         <td><?php echo $row['username'] ?></td>
                                         <td><?php echo $row['usertype'] ?></td>
                                </tr>
                         
						          <?php } ?>
                            </tbody>
                        </table>
						<input type="submit" class="btn btn-danger" value="Delete" name="delete">
          
</form>
		    <p><a href="home.php" class="btn btn-success" target='_top'>Return</a></p>
        </div>
        </div>
        </div>
    </div>



</body>
</html>


