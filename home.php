<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'header.php';
/*
if($_SESSION['login']==1){
    
    echo "you have successfully logged in";
    
    
}
*/

?>
<title>Alumini Portal</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.ttf" type="text/css">
<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.eot" type="text/css">
<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.svg" type="text/css">
<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.woff" type="text/css">
<link rel="stylesheet" href="css/sidebar.css" type="text/css">

<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<style>
	.navbar{
		background:#ffb0bb;	
	}
	td,th{
		padding:1%;
		border-bottom:1px #000000;
	}
</style>
<body background="images/bgr.jpg">
<div class="container">
    <!--<header>
    	<nav class="navbar navbar-default" role="navigation"> 
        	<div class="navbar-header pull-right"> 
            	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse"> 
                	<span class="sr-only">Toggle navigation</span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                </button> 
                <a class="navbar-brand" href="#">Signed in as <span id="user">Guest</span></a> 
            </div> 
            <div class="collapse navbar-collapse pull-right" id="example-navbar-collapse"> 
            	<ul class="nav navbar-nav">   
                    <li class="dropdown"> 
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> </a> 
                    		<ul class="dropdown-menu"> 
                            	<li><a href="#">Change Settings</a></li>
                            	<li><a href="#">Log Out</a></li>  
                            </ul> 
                    </li> 
                </ul> 
            </div> 
    	</nav>
    </header>-->
    
    <!------------------- Content -------------------------->
    <script>
		function refresh_not(time){
			var interval = setInterval(function(){
				time =time-1;
				
				if(time==0){
					clearInterval(interval);
					$("#notifications").html('<center>Loading <img src="images/ajax-loader.gif"></center>');
					$.ajax({
						url:'notifications.php',
						type:'POST',
						data:'check='+check,
						success: function(data){
							$("#notifications").html(data);
						}
					})
					//window.location.reload(true);	
				}
			},1000);
		}
		function blog_text(id){
			var name = "User";
			var branch = "Cse";
			$.ajax({
				url:'notifications.php',
				type:'POST',
				data:'id='+id+'&type='+'blog'+'&user_branch='+branch+'&user_name='+name,
				success: function(data){
					$("#notifications").html(data);
					$("#update").hide();	
				}
			})	
		}
		function blog_comment(id,branch,name){
			var comment = $("#blog_comment").val();
			$.ajax({
				url:'notifications.php',
				type:'POST',
				data:'id='+id+'&branch='+branch+'&name='+name+'&type='+'comment'+'&comment='+comment,
				success: function(data){
					$("#notifications").html(data);
					$("#update").hide();	
				}
			})
		}
		function goback(id){
			$.ajax({
				url:'notifications.php',
				data:'type='+'blog_show',
				type:'POST',
				success: function(data){
					$("#notifications").html(data);
					$("#update").show();
				}
			})
		}
		$(document).ready(function(){
			$("#notifications").html('<center>Loading <img src="images/ajax-loader.gif"></center>');
			$.ajax({
				url:'notifications.php',
				data:'type='+'blog_show',
				type:'POST',
				success: function(data){
					$("#notifications").html(data);
				}
			})
			//refresh_not(10);
			$("#blog_submit").click(function(){
				var blog = $("textarea#blog").val();alert(blog);
				var user = $("#user").text();
				/*$.ajax({
					url:'notifications.php',
					type:'POST',
					data:'user='+user+'&blog='+blog,
					success: function(data){
						$("#blog").val('');
						$("#notifications").html(data);
						window.location.reload(true);
					}
				})*/
			})
		})
		
	</script>
    
    <div class="row">
    	
        <!-------------- Left Sidebar --------------------->
        <div class=" col-lg-1 col-md-1 col-sm-1 col-xs-2">
        	<script src="js/sidebar.js" type="text/javascript"></script>
        	<nav class='sidebar sidebar-menu-collapsed'> 
            	<a href='#' id='justify-icon'>
                	<span class='glyphicon glyphicon-align-justify'></span>
              	</a>
                <ul class='level1'>
                    <li class='active'> 
                    	<a class='expandable' href='#' title='Dashboard'>
                    		<span class='glyphicon glyphicon-home collapsed-element'></span>
                    		<span class='expanded-element'>Dashboard</span>
                  		</a>
        				<ul class='level2'>
                            <li> <a href='#' title='Traffic'>Traffic</a></li>
                            <li> <a href='#' title='Conversion rate'>Conversion rate</a></li>
                            <li> <a href='#' title='Purchases'>Purchases</a></li>
                        </ul>
                    </li>
                    <!--<li><a class='expandable' href='#' title='APIs'><span class='glyphicon glyphicon-wrench collapsed-element'></span><span class='expanded-element'>APIs</span></a></li>-->
                    <li> 
                    	<a class='expandable' href='#' title='Settings'>
                    		<span class='glyphicon glyphicon-cog collapsed-element'></span>
                    		<span class='expanded-element'>Settings</span>
                  		</a>
        			</li>
                    <li> 
                    	<a class='expandable' href='#' title='Account'>
                    		<span class='glyphicon glyphicon-user collapsed-element'></span>
                    		<span class='expanded-element'>Account</span>
                  		</a>
                    </li>
                </ul> 
                <a href='#' id='logout-icon' title='Logout'>
                	<span class='glyphicon glyphicon-off'></span>
              	</a>
            </nav>
        </div>
    	
        <!-------------- Right Content -------------------->
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9" style=" background:url(images/header_1.jpg);">
        	
            <!------------------ Update Blog ---------------------->
            <div class="row">
            	<div class="col-md-12" id="update">
                    <p><h3 class="text-primary">Write a Blog</h3></p>
                    
                    <p>
                    	<!--<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
						<script>
                        tinymce.init({
                            selector: "textarea#blog",
                            theme: "modern",
                            /*width: 800,
                            height: 300,
                            plugins: [
                                 "advlist autolink autoresize link image lists charmap print preview hr anchor pagebreak spellchecker",
                                 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                                 "save table contextmenu directionality emoticons template paste textcolor"
                           ],*/
                           //content_css: "css/content.css",
                           /*toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
                           style_formats: [
                                {title: 'Bold text', inline: 'b'},
                                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                                {title: 'Example 1', inline: 'span', classes: 'example1'},
                                {title: 'Example 2', inline: 'span', classes: 'example2'},
                                {title: 'Table styles'},
                                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                            ]*/
                         }); 
                        </script>
						<textarea id="blog" style="height:50px"></textarea>-->
                        <textarea id="blog" style="height:150px; width:100%"></textarea>
                    </p>
                    <p><button type="button" class="btn btn-success pull-right" id="blog_submit">Update</button></p>
                    
        		</div>
            </div>
            <hr style="border-color:#302045 !important">
            <!----------------- Notifications --------------------->
            <div class="row">
            	<div class="col-md-12" id="notifications" style="padding:0 10px 20px 10px;">
                	
                </div>
            </div>
            
        </div>
        
    </div>
    
</div>
</body>    