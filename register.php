<?php include 'header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">						
				<div id="mpane">
					<h4>Register</h4>
					<hr>
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
		</div>
	</div>

<?php include 'footer.php'; ?>
