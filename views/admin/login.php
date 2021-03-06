<?php
require_once( PATH_MODELS . '/admin/login.php' );

require_once( PATH_CORE . '/clRouter.php' );

$oLogin = new login();
$oRouter = new clRouter();

if( !empty($_POST) ) {
	$aLoginResult = $oLogin->login( $_POST['username'], $_POST['password'] );
	if( $aLoginResult == true ) {
		$oRouter->redirect( '/admin' );
	} else {
		$aErr = array(
			'Invalid username or password'
		);
	}
}
?>
<div id="backgroundImage"></div>
<form action="/admin/login" method="post" id="formLogin" class="center panel">
	<img src="../images/views/admin/logo.png" class="logo">
	<h1>Login</h1>
	&nbsp;
	<?php 
		if( !empty($aErr) ) {
			echo '<div class="error panel" style="background-color: red;">';
			foreach( $aErr as $sError ) {
				echo $sError;
			}
			echo '</div><br />';
		}
	?>
	<label for="username">Username</label>
	<br />
	<input type="text" value="" required id="username" name="username" />
	<br />
	<label for="password">Password</label>
	<br />
	<input type="password" value="" required id="password" name="password" />
	<br />
	<input type="hidden" name="frmLogin" value="true" />
	<input type="hidden" name="ajax" value="false" />
	<button class="formLoginButton raised">Login</button>
</form>