<?php include("include/head.php"); ?>

<body>
	<div class="main">
		<!-- Sign up form -->
		<section class="signup">
			<div class="container">
				<div class="signup-content">
					<div class="signup-form">
						<h2 class="form-title">Sign up</h2>
						<form method="POST" class="register-form" id="register-form">
							<div class="form-group">
								<div class="">
									<input name="uname" type="text" placeholder="Your Name"
										class="form-control input-height" /> </div>
							</div>
							<div class="form-group">
								<div class="">
									<input name="email" type="email" placeholder="Your Email"
										class="form-control input-height" /> </div>
							</div>
							<div class="form-group">
								<div class="">
									<input name="pwd" type="password" placeholder="Password"
										class="form-control input-height" /> </div>
							</div>
							<div class="form-group">
								<div class="">
									<input name="re-pwd" type="password" placeholder="Repeat Password"
										class="form-control input-height" /> </div>
							</div>
							<div class="form-group">
								<input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
								<label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
									statements in <a href="#" class="term-service">Terms of service</a></label>
							</div>
							<div class="form-group form-button">
								<button class="btn btn-round btn-primary" name="signup" id="register">Register</button>
							</div>
						</form>
					</div>
					<div class="signup-image">
						<figure><img src="../assets/img/pages/signup.jpg" alt="sing up image"></figure>
						<a href="login.html" class="signup-image-link">I am already member</a>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- start js include path -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<!-- bootstrap -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- end js include path -->
</body>


</html>