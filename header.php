<?php ob_start();  
require 'functions.php'; 
include dirname(__FILE__) . '/config.php';  

session_start(); //session is a way to store information (in variables) to be used across multiple pages.

if (isset($_SESSION["username"])) {
  $username = $_SESSION["username"];
}


$host  = $_SERVER['HTTP_HOST'];  

$res = new Users();

$reg     = ''; //initialize variable for first load
$log_res = '';


$reg_res = $res->userRegister();
$log_res = $res->userLogin(); 

/*--------------------------------------------------------*/

echo "Current user id =" . $res->getUserID() . "<br>";


$itemupload = $res->uploadItem();

echo $itemupload;

echo "<br>";

echo $res->getUploadedItem();

echo "<br>";

echo $res->getThumb();  
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Window Shopping</title>
    <link rel="stylesheet" href="/app/css/style.css">
    <link rel="stylesheet" href="/app/css/custom.css">
    <link rel="author" href="humans.txt">

    <link rel="icon" type="image/png" href="/app/img/favicon.ico">
    
    <link rel="stylesheet" type="text/css" href="/app/packages/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app/packages/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/app/packages/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="/app/packages/bootstrap/css/bootstrap-theme.min.css">

    <link rel='stylesheet' type="text/css" href='/app/packages/guillotine/css/jquery.guillotine.css'>
    <link rel='stylesheet' type="text/css" href='/app/packages/guillotine/css/guillotine.css'>


    <!--[if lt IE 9]>
      <script src='//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script>
    <![endif]-->    

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
    
    <script src="/app/packages/bootstrap/js/bootstrap.min.js"></script>    
    <script src="/app/js/jquery.min.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> uncomment this if you want to grab online--> 

  </head>
  <body>
    <header>
      <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="http://localhost">
            <img id="logo" class="img-responsive" alt="Brand" src="/app/img/windowshopping-logo.jpg">
           </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://localhost">Home</a></li>
            <li><a href="hot-item.php">What's Hot!</a></li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
               <ul class="dropdown-menu">
                  <li><a href="health-and-beauty.php">Health and Beauty</a></li>
                  <li><a href="fashion.php">Fashion</a></li>
                  <li><a href="music.php">Musical Instruments</a></li>
                  <li><a href="kids.php">Toys & Kids</a></li>
                  <li><a href="electronics.php">Electronics</a></li>
                  <li><a href="motors.php">Motors</a></li>
               </ul>
            </li>
          </ul>
           <!-- Search form -->
          <form style="display: none;" class="navbar-form navbar-left pull-right" role="search">
              <div class="form-group">
                 <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
          </form>

            <ul class="nav navbar-nav navbar-right"> 
              <li>
                <div style="padding: 15px; margin-right: 10px; color: #fff;">
                  <a style="color: #fff;" href="<?php $host; ?>/admin">
                    <?php 
                      if(isset($_SESSION['username'])){
                        echo "Dashboard"; 
                      }
                    ?>
                  </a>
                </div>
              </li>
              <li>   
                <?php if(isset($_SESSION['username'])){ ?> 

                <div class="dropdown">                  
                  <div style="padding: 15px; margin-right: 10px; color: #fff;" class="dropdown-toggle" type="button" id="user-profile" data-toggle="dropdown">
                    <?php echo "Hello " . ucfirst($_SESSION['username']); ?>
                    <span style="margin-left: 5px;" class="caret"></span>
                  </div>                    
                  <ul class="dropdown-menu" role="menu" aria-labelledby="user-profile">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="settings.php">Settings</a></li>                  
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Log out</a></li>
                  </ul>
                </div>

                <?php }else{ ?>    

                  <!-- Trigger the modal with a button -->
                  <a class="navbar-right" data-toggle="modal" data-target="#myModal" style="padding: 15px; margin-right: 10px;" >Register</a>     
                  <!-- Modal Start : Register-->
                  <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Register</h4>
                        </div>
                        <div class="modal-body" style="padding: 25px;">   
                    
                            <div class="row">   
                              <form role="form" action="" method="POST">
                                <?php             
                                  echo $reg_res;
                                ?>

                                <div class="form-group">
                                    <input type="username" name="username" id="username" class="form-control input-sm" autofocus="autofocus" placeholder="Username" required>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">                
                                      <div class="form-group">
                                              <input type="text" name="firstname" id="firstname" class="form-control input-sm" placeholder="First Name" required>
                                      </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <input type="text" name="lastname" id="lastname" class="form-control input-sm" placeholder="Last Name" required>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" required>
                                  </div>

                                  <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required>
                                      </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                      <div class="form-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password" required>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <input type="submit" name="registerForm" value="Register" class="btn btn-info btn-block">         
                                </form>  
                            </div>    
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal End : Register-->

                  <!-- Modal Start : Sign in-->
                  <a class="navbar-right" data-toggle="modal" data-target="#modalLogin" style="padding: 15px; margin-right: 10px;">Login</a>

                  <!-- Modal -->
                  <div id="modalLogin" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Sign in</h4>
                        </div>
                        <div class="modal-body" style="padding: 25px;">                                
                          <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">                       
                              <div class="form-group">
                                <?php 
                                  echo $log_res;
                                ?>
                                 <label class="sr-only" for="username">Username</label>
                                 <input type="username" class="form-control" id="username" name="username" placeholder="Username" autofocus="autofocus" required>
                              </div>
                              <div class="form-group">
                                 <label class="sr-only" for="password">Password</label>
                                 <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                              </div>
                              <div class="checkbox">
                                 <label><input type="checkbox"> Remember me</label>
                              </div>
                              <div class="form-group">                      
                                 <button type="submit" name="loginForm" class="btn btn-success btn-block">Log in</button>
                                 <p class="text-center" style="padding-top:10px"><a href="forgotpassword.php">Forgot your password?</a></p>
                              </div>                            
                          </form>

                          <ul class="nav">
                            <hr>
                            <li class="divider"></li>
                              <li>
                                <div class="col-md-6 col-md-offset-3">
                                  <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                                    <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
                                </div>                                            
                              </li>
                              <div class="col-md-6 col-md-offset-3">  
                                <hr>
                                <p class="text-center"><a href="register.php">Create account</a></p>
                              </div>
                          </ul>   
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default action-login" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal End : Sign in-->
                <?php }?>
              </li>
            </ul>           
        </div>
        <!-- /.navbar-collapse -->
      </nav> 
    </header>