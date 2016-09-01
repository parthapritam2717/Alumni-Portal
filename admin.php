<?php

	$user='root';$pass = '';
	$con = mysql_connect('localhost',$user,$pass);
	mysql_select_db('alumini',$con);
	
	echo $name = $_POST['name'];
?>
<title>Admin</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.ttf" type="text/css">
<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.eot" type="text/css">
<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.svg" type="text/css">
<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.woff" type="text/css">

<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<style>
	.navbar{
		background:#0099ff;
		color:#FFFFFF !important;	
	}
	td,th{
		padding:1%;
		border-bottom:1px #000000;
	}
</style>
<body background="images/bgr.jpg">
<div class="container">
    <header>
    	<nav class="navbar navbar-default" role="navigation"> 
        	<div class="navbar-header pull-right"> 
            	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse"> 
                	<span class="sr-only">Toggle navigation</span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                </button> 
                <a class="navbar-brand" href="#" style="color:#FFFFFF !important">Signed in as Admin</a> 
            </div> 
            <div class="collapse navbar-collapse pull-right" id="example-navbar-collapse"> 
            	<ul class="nav navbar-nav">   
                    <li class="dropdown"> 
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#FFFFFF"><span class="glyphicon glyphicon-cog"></span> </a> 
                    		<ul class="dropdown-menu"> 
                            	<li><a href="#">Change Settings</a></li>
                            	<li><a href="#">Log Out</a></li>  
                            </ul> 
                    </li> 
                </ul> 
            </div> 
    	</nav>
    </header>
    
    
    <!----------------- Content ---------------------------->
    
    <div class="row" style="margin:auto">
    <div id="accordion" class="panel-group">	
        
        <!------------- Register/Block -------------------->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" id="alumini">Alumini Section</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1" style="padding:1%">
                        <span class="pull-left"><h4 class="text-center text-primary"><span id="filter">All</span> Aluminis</h4></span>
                        <span class="pull-right">
                        <select id="select" style="height:35px">
                            <option value="Filter">Filter</option>
                            <option value="Registered">Registered</option>
                            <option value="Not Registered">Not Registered</option>
                            <option value="Blocked">Blocked</option>
                        </select>
                        </span>
                        
                        <script>
                            $(document).ready(function(e) {
                                $("#alumini").click(function(){	
									var list_val = $("#select").val();
									 if(list_val !='Filter'){
                                        $("#filter").text(list_val);	
                                    }
                                    else{
                                        $("#filter").text("All")
                                    }
									$("#results").fadeIn(400).html('<center>Loading <img src="images/ajax-loader.gif" /></center>');
									$.ajax({
                                        url:'admin_set.php',
                                        type:'POST',
                                        data: 'list_val='+list_val,
                                        success:function(data){
                                            $("#results").html(data);
                                        },
										timeout:$("#results").html("Sorry thhe connection timed out.Please try again"),
                                	})
								});
                                $('#select').change(function(){
                                    var list_val = $("#select").val();
                                    if(list_val !='Filter'){
                                        $("#filter").text(list_val);	
                                    }
                                    else{
                                        $("#filter").text("All")
                                    }
									$("#results").fadeIn(400).html('<center>Loading <img src="images/ajax-loader.gif" /></center>');
                                    $.ajax({
                                        url:'admin_set.php',
                                        type:'POST',
                                        data:'list_val='+list_val,
                                        success:function(data){
                                            $("#results").html(data);
                                        }
                                    })
                                });
                            });
                            function register(id,list){
								$("#results").fadeIn(400).html('Loading <img src="images/ajax-loader.gif" />');
                                $.ajax({
                                    url:'admin_set.php',
                                    type:'POST',
                                    data:'reg='+id+'&pre_list_val='+list,
                                    success:function(data){
                                        $("#results").html(data);	
                                    }
                                })
                            }
                            function block(id,list){
								$("#results").fadeIn(400).html('Loading <img src="images/ajax-loader.gif" />');
                                $.ajax({
                                    url:'admin_set.php',
                                    type:'POST',
                                    data:'block='+id+'&pre_list_val='+list,
                                    success:function(data){
                                        $("#results").html(data);	
                                    }
                                })
                            }
                        </script>
                    
                    </div>
                </div>
                <!div class="row">
                <div class="panel-body row" id="results">
                    
                </div>
                <!/div>
            </div>
        </div>
        
        <!------------- Manage Content --------------------->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Content</a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>
                        <ul class="list-group"> 
                            <li class="list-group-item">Prepositions</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</body>