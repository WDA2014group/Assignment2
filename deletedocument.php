<?php 
include('header.php');
session_start();
 ?>
<body>

    <div class="row-fluid">
        <div class="span12">


         

            <div class="container">

<br><br>
							<form method="post" action="deletefile.php" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            <div class="alert alert-info">
                              
                                <strong><i class="icon-user icon-large"></i>&nbsp;Delete Multiple Data</strong>
								&nbsp;&nbsp;Check the radion Button and click the Delete button to Delete Data 
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
							$query="select * from filetable where permission='U'";}
							else if($_SESSION['userType']=="S"){
							$query="select * from filetable where permission='U' or permission='S'";}
							else
                            $query="select * from filetable ";
							}
							
							$result=$pdo->prepare($query);
							$result->excute();
							while($row=$result->fetch(PDO::FETCH_ASSOC)){
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


