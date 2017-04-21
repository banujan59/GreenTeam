<style>
	#formContainer
	{
		position: absolute;
		left: 50%;
		top: 50%;
		width: 750px;
		height: 277.5px;
		margin-left: -375px;
		margin-top: -138.75px;
	}
	.loginForm, .passRecovery
	{
		position: absolute;
		left: 0%;
		top: 0%;
		
		width: inherit;
		height: inherit;
		
		clear: both;
		
		backface-visibility: hidden;
		transform-style: preserve-3d;
		transition: .5s;
	}
	
	.loginForm
	{
		background-image: url("images/car.png");
		background-size: cover;
	}
	
	.passRecovery
	{
		padding-left: 200px;
		
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
	
	.loginForm input
	{
		position: relative;
		background-color: rgba(30, 39, 142, 0.35);
		/*border: solid rgba(255,255,255,0.75) 2px;*/
		border: solid rgba(30, 39, 142, 0.75) 2px;
		padding-left: 5px;
		padding-right: 5px;
		color: white;
		font-size: 18px;
	}
	
	.loginForm input::placeholder
	{
		color: white;
	}
	
	.loginForm input:focus
	{
		outline: none;
	}
	
	.loginForm input[type=email]
	{
    	left: 155px;
		top: 117px;
    	width: 155px;
    	height: 47px;
	}
	
	.loginForm input[type=password]
	{
		left: 233px;
    	top: 117px;
    	width: 155px;
    	height: 47px;
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
	
	#backButton
	{
		margin-left: -85px;
		margin-top: 50px;
	}
	
	#backToLoginButton
	{
		margin-left: -170px;
	}
	
	#sendEmailKeyButton, #verifyKeyButton, #backToLoginButton
	{
		position: absolute;
		left: 42%;
		top: 35%;
	}
</style>

<div id="formContainer">
	<div class="loginForm">
		<form>
			<input name="emailField" type="email" placeholder="Email"/>
			<input name="pwdField" type="password" placeholder="Password"/>
		</form>
	
		<div id="forgotPasswordButton" class="button loginFormButton">Forgot Password?</div>
		<div id="loginToHomeButton" class="button loginFormButton">Login</div>
        	<br/>
        <div id="backButton" class="button loginFormButton">Back</div>
	</div>

	<div class="passRecovery">
		<form>
			<p class="instructions">
				Step 1 - Enter an email address to recover your password.
			</p>
			<input name="passRecInputField" type="text"/>
				<br/>
			<div id="sendEmailKeyButton" class="button loginFormButton">Send Email</div>
            <div id="backToLoginButton" class="button loginFormButton">Back to login</div>
		</form>
	</div>
</div>

<script>
	$(".button").click(buttonClicked);
</script>