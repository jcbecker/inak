<?php include "menu.php"; ?>

<script type="text/javascript">
	function checkForm(form){
		if(form.inputPassword.value == "") {
			alert("Error: Password cannot be blank!");
			form.inputPassword.focus();
			return false;
		}
		re = /^\w+$/;
		if(!re.test(form.inputUserName.value)) {
			alert("Error: Username must contain only letters, numbers and underscores!");
			form.inputUserName.focus();
			return false;
		}
		if(form.inputPassword.value == form.inputPassword2.value) {
			if(form.inputPassword.value.length > 256) {
				alert("Error: Password must contain less then 256 characters!");
				form.inputPassword.focus();
				return false;
			}
		} else {
			alert("Error: The passwords are different!");
			form.inputPassword.focus();
			return false;
		}
		return true;
	}
</script>

<?php
	if(isset($_GET['error']))
		$errorLogin = $_GET['error'];
	if(!isset($errorLogin))
		$errorLogin = 0;
?>
<script>
	$(document).ready(function(){
		var errorLogin = "<?php echo($errorLogin); ?>";
		if(errorLogin==4){
			alert("Please, check your e-mail and your password. If you aren't registered, sign up!");
		}
	});
</script>

<div class="jumbotron">
	<div class="container showHome">
		<h1>Welcome to INAK!</h1>
		<p style="text-align:justify">
		Here you can learn using Flash Cards . Based TWO Fundamentals structures ,
		which are decks ( platforms) and the card ( cards). CARDS THE INFORMATION What are like wish memorize texts. </p>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h2>LOGIN</h2>
			<form class="form-signin" action="login.php" method="POST">
				<label for="inputEmail" class="sr-only">E-mail</label>
				<input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">LOGIN</button>
			</form>
		</div>
		<div class="col-md-6">
			<h2>REGISTRAR-SE</h2>
			<form class="form-signin" action="validateRegister.php" method="POST" onsubmit="return checkForm(this);">
				<label for="inputUserName" class="sr-only">Username</label>
				<input type="text" name="inputUserName" class="form-control" placeholder="User name" required>
				<label for="inputEmail" class="sr-only"> E-mail</label>
				<input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
				<label for="inputPassword" class="sr-only">Passwd</label>
				<input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
				<label for="inputPassword2" class="sr-only">Passwd2</label>
				<input type="password" name="inputPassword2" class="form-control" placeholder="Retype password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">SIGN IN</button>
			</form>
		</div>
	</div>
</div>
<hr>
<?php include "footer.php"; ?>
