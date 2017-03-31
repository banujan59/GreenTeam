<style>
	.loginForm, .passRecovery
	{
		position: absolute;
		left: 50%;
		top: 15%;
		
		margin-left: -200px;
		
		width: 400px;
		height: 100px;
		
		clear: both;
		
		backface-visibility: hidden;
		transform-style: preserve-3d;
		transition: .5s;
	}
	
	.passRecovery
	{
		transform: rotateY(180deg);
		opacity: 0;
	}
	
	.flipped .loginForm
	{
		transform: rotateY(180deg);
		opacity: 0;
	}
	
	.flipped .passRecovery
	{
		transform: rotateY(0deg);
		opacity: 1;
	}
	
	form
	{
		display: table;
	}
	
	form input
	{
		display: table-cell;
	}
	
	.loginFormButton
	{
		height: 15px;
		padding-bottom: 10px;
		font-size: 15px;
		left: 50%;
		top: 90%;
	}
	
	#forgotPasswordButton
	{
		margin-left: -170px;
	}
	
	#loginToHomeButton
	{	
		margin-left: 0px;
	}
	
	#sendEmailKeyButton, #verifyKeyButton
	{
		position: relative;
		margin-top: 5px;
	}
</style>
	
<div id="backButton" class="button">Back</div>

<div id="formContainer">
	<div class="loginForm">
		<form>
			<input name="emailField" type="text" placeholder="Email"/>
				<br/>
			<input name="pwdField" type="password" placeholder="Password"/>
		</form>
	
		<div id="forgotPasswordButton" class="button loginFormButton">Forgot Password?</div>
		<div id="loginToHomeButton" class="button loginFormButton">Login</div>
	</div>

	<div class="passRecovery">
		<form>
			<p class="instructions">
				Step 1 - Enter an email address to recover your password.
			</p>
			<input name="passRecInputField" type="text"/>
				<br/>
			<div id="sendEmailKeyButton" class="button loginFormButton">Send Email</div>
		</form>
	</div>
</div>

<script>
	$("#backButton").click(buttonClicked);
	$("#forgotPasswordButton").click(buttonClicked);
	$("#loginToHomeButton").click(buttonClicked);
	$("#sendEmailKeyButton").click(buttonClicked);
	$("#verifyKeyButton").click(buttonClicked);
</script>