<?php include 'header.php'; ?> 

<div class="container">
	<div class="row">				
		<div class="col-md-6 col-md-offset-3">
			<div id="mpane">
				<h4>Log in</h4>
				<hr>
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
             <label>
             <input type="checkbox"> Remember me
             </label>
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
		</div>		
	</div>
</div>


<?php include 'footer.php'; ?>








































