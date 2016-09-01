<?php 
	$user='root';$pass = '';
	$con = mysql_connect('localhost',$user,$pass);
	mysql_select_db('alumini',$con);

if(isset($_POST['reg']) || isset($_POST['block'])){
	$reg = $_POST['reg'];
	$block = $_POST['block'];
	$list_val = $_POST['pre_list_val'];
	if(isset($_POST['reg'])){
		$rs1 = mysql_query("UPDATE `alumini`.`user` SET `rights` = 'block' WHERE `user`.`id` = '$reg'");	
		if($rs1){
			echo '<script>alert("Blocked successfully")</script>';
		}
	}
	elseif (isset($_POST['block'])){
		$rs1 = mysql_query("UPDATE `alumini`.`user` SET `rights` = 'registered' WHERE `user`.`id` = '$block'");	
		if($rs1){
			echo '<script>alert("Registered successfully")</script>';
		}
	}
}

if(isset($_POST['list_val'])){
	$list_val = $_POST['list_val'];
}
	switch($list_val){
		case 'Filter' : $rs = mysql_query("select * from user");
						break;
		
		case 'Registered' : $rs = mysql_query("select * from user where `rights` = 'registered'");
							break;
		
		case 'Not Registered' : $rs = mysql_query("select * from user where `rights` = 'not registered'");
								break;
		
		case 'Blocked' : $rs = mysql_query("select * from user where `rights` = 'block'");
						 break;
		
		default : $rs = mysql_query("select * from user");
				  break;	
	}

    if($rs){
    echo '<table class="table-responsive col-md-10 col-md-offset-1" style="background:#f6f6f6; border-radius:8px"><thead><tr><th>Name</th><th>Year of Passing</th><th>Current Status</th><th>Branch</th><th>Status</th></tr></thead>';
                    while($row=mysql_fetch_array($rs)){
                    	$year = $row['year of passing'];
						$branch = $row['branch'];
						$current = $row['current status'];
					?>	
                        <tr class="" style="padding:5px">
                            <td><?= $row['name'];?></td>
                            <td><?php if(!empty($year)){echo $year;}else{echo 'Not mentioned';} ?></td>
                            <td><?php if(!empty($current)){echo $current;}else{echo 'Not mentioned';} ?></td>
                            <td><?php if(!empty($branch)){echo $branch;}else{echo 'Not mentioned';} ?></td>
                            <td><?= $row['rights']?></td>
                            <td>
								<?php if($row['rights']=='block'){?>
                                	<input type="submit" class="btn btn-primary" value="Register" onClick="block('<?= $row['id']?>','<?= $list_val?>')"><?php }
									else{?>
                                    <input type="submit" class="btn btn-primary" value="Block" onClick="register('<?= $row['id']?>','<?= $list_val?>')"><?php }?>
                            </td>
                        </tr>
                <?php		
                    }
                    
					if(mysql_num_rows($rs)==0){
					?>	<tr style="padding-top:25px">
                    		<td colspan="5" align="center"><?= "No data found";?></td>	
                        </tr>	<?php
					}echo '</table>';
       }
	   else{
			echo 'No data found';   
	   }   	
