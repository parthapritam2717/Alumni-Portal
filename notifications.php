<?php 
	$user='root';$pass = '';
	$con = mysql_connect('localhost',$user,$pass);
	mysql_select_db('alumini',$con);


/****************** Blog Post *************************/

if(isset($_POST['blog']) && isset($_POST['user'])){
	$user = $_POST['user'];
	$blog = $_POST['blog'];
	$branch = 'CSE';//it is to be have to put in dynamically through session variable
	
	$rs = mysql_query("INSERT INTO `alumini`.`blog` (`id`, `name`, `branch`, `blog`) VALUES (NULL, '$user', '$branch', '$blog')");
	if($rs){
		
	}
}

/********************* Blog Show ************************/

if(isset($_POST['type']) && ($_POST['type']=='blog_show')){
	$rs= mysql_query("select * from blog order by id desc");
	
	if($rs){
		if(mysql_num_rows($rs)==0){
			echo '<h4 class="text-danger text-center">No blogs available</h4>';	
		}
		else{
			while($row = mysql_fetch_array($rs)){
				echo '<div id="notify"><p class="text-right" style="font-size:16px;color:#fff">Branch: '.$row['branch'].' | '.' By: '.$row['name'].'</p><p class="text-success" style="font-size:20px;cursor:pointer;height:40px" onClick="blog_text('.$row['id'].')">'.$row['blog'].'</p></div><hr><br>';	
			}
		}
	}
}

/****************************** Particlar Blog Show/Insert ******************************/

if(isset($_POST['id']) && isset($_POST['type']) && ($_POST['type']=='blog' || $_POST['type']=='comment')){
	$id=$_POST['id'];$user_branch=$_POST['user_branch'];$user_name=$_POST['user_name'];
	
		if($_POST['type']=='comment'){
			$comment = $_POST['comment'];$name=$_POST['name'];$branch=$_POST['branch'];$id=$_POST['id'];
			$insert=mysql_query("INSERT INTO `alumini`.`blog_comment` (`id`, `parent_id`, `comment`, `name` , `branch`) VALUES (NULL, '$id', '$comment', '$name', '$branch')");
			if($insert){
			}
		}
		
		$rs= mysql_query("select * from blog where `id` = '$id'");
		while($row = mysql_fetch_array($rs)){
			$branch=$row['branch'];$name=$row['name'];$blog=$row['blog'];
		}
		?>
        <div id="blog_comment_box">
       	<p><h1 class="text-center text-danger">Blog Forum</h1></p>
        
        <button class="btn btn-lg btn-danger pull-right" style="color:#fff" onClick="goback('<?= $_POST['id']?>')"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
        <!--<p class="text-right" style="cursor:pointer; font-size:24px; color:#fff" onClick="goback('<?= $_POST['id']?>')">Back</p>-->
        <p class="clearfix"></p>
        <p class="text-right" style="font-size:16px;color:#fff;">Branch: <?= $branch?> | By: <?= $name?></p><p class="text-success" style="font-size:20px;cursor:pointer;height:40px;background:#f5f5f5;padding:5px 5px;padding-bottom:20px;border-radius:2px"><?= $blog?></p><hr><br><br>
        </div>
        <?php 
		
			$rs_new = mysql_query("select * from blog_comment where `parent_id` = '$id' order by id desc");
			while($row = mysql_fetch_array($rs_new)){?>
		
            <p id="user_comment" class="text-right" style="font-size:16px;color:#fff;">Branch: <?= $row['branch']?> |  By: <?= $row['name']?></p><p class="text-success" style="font-size:20px;cursor:pointer;height:40px" ><?= $row['comment']?></p><hr>
        <?php }?>
        <p><textarea style="width:100%; height:100px" id="blog_comment"></textarea></p>
        <p><button class="btn btn-primary pull-right" onClick="blog_comment('<?= $id?>','<?= $user_branch?>','<?= $user_name?>')">Comment</button></p>
        <p class="clearfix"></p>
        <button class="btn btn-lg btn-danger pull-right" style="color:#fff" onClick="goback('<?= $_POST['id']?>')"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
	<?php
}



/************************* Blog Comment *****************************/
