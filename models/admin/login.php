<?php
require_once( PATH_CORE . 'clDbPDO.php' );

class login {

	private $oDb;

	public function __construct() {
		$this->oDb = new clDbPDO();
		
	}
	
	public function saltPassword( $sUsername, $sUserpass ) {
		$sUsername = $this->oDb->escapeStr( $sUsername );
		$sUserpass = $this->oDb->escapeStr( $sUserpass );
		return md5( $sUsername . $sUserpass . USER_PASS_SALT );
	}

	public function login( $sUsername, $sUserpass ) {
		$sUserpass = $this->saltPassword( $sUsername, $sUserpass );
		$this->oDb->query("SELECT * FROM `entusers` WHERE `userName`='$sUsername' AND `userPass`='$sUserpass'");
		$aRow = $this->oDb->single();
		if( !empty($aRow) ) {
			// User found
			$_SESSION['userId'] = $aRow['userId'];
			$_SESSION['userName'] = $aRow['userName'];
			$_SESSION['userStatus'] = $aRow['userStatus'];
			
			$iUserId = $aRow['userId'];
			$oLastLogin = date( "Y-m-d H:i:s", time() );

			$this->oDb->query("UPDATE `entusers` SET `userLastLogin`='$oLastLogin' WHERE `userId`='$iUserId'");
			$aResult = $this->oDb->execute();
			return true;
		} else {
			return false;
		}
	}

}
