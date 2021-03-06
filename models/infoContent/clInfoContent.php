<?php
require_once( PATH_MODELS . 'infoContent/cfInfoContent.php' );
require_once( PATH_CORE . 'clDbPDO.php' );

class clInfoContent {

	public $oDb;

	public function __construct() {
		$this->oDb = new clDbPDO();
	}

	public function create( $aData = array() ) {
		$sContentTitle = $aData['contentTitle'];
		$sContentText = $aData['contentText'];
		$sContentMetaKeywords = $aData['contentMetaKeywords'];
		$sContentMetaDescription = $aData['contentMetaDescription'];
		$sContentCanonicalUrl = $aData['contentMetaCanonicalUrl'];
		$sContentStatus = $aData['contentStatus'];
		$sContentCreated = strtotime( "Y-m-d H:i:s", time() );
		$this->oDb->query( "INSERT INTO `entinfocontent`(`contentTitle`, `contentText`, `contentMetaKeywords`, `contentMetaDescription`, `contentMetaCanonicalUrl`, `contentStatus`, `contentCreated`) VALUES (
			'$sContentTitle',
			'$sContentText',
			'$sContentMetaKeywords',
			'$sContentMetaDescription',
			'$sContentCanonicalUrl',
			'$sContentStatus',
			'$sContentCreated'
		)" );
		$this->oDb->execute();
		return $this->oDb->lastInsertId();
	}

	public function update( $iContentId, $aData = array() ) {
		$sContentTitle = $aData['contentTitle'];
		$sContentText = $aData['contentText'];
		$sContentMetaKeywords = $aData['contentMetaKeywords'];
		$sContentMetaDescription = $aData['contentMetaDescription'];
		$sContentCanonicalUrl = $aData['contentMetaCanonicalUrl'];
		$sContentStatus = $aData['contentStatus'];
		$sContentUpdated = strtotime( "Y-m-d H:i:s", time() );
		$this->oDb->query( "UPDATE `entinfocontent` SET 
			`contentTitle`='$sContentTitle', 
			`contentText`='$sContentText',
			`contentMetaKeywords`='$sContentMetaKeywords',
			`contentMetaDescription`='$sContentMetaDescription',
			`contentMetaCanonicalUrl`='$sContentCanonicalUrl',
			`contentStatus`='$sContentStatus',
			`contentUpdated`='$sContentUpdated' WHERE `contentId`=$iContentId" );
		return $this->oDb->execute();
		// return $this->oDb->lastInsertId();
	}

	public function read( $iContentId ) {
		$this->oDb->query( "SELECT * FROM `entinfocontent` WHERE `contentId`=$iContentId " );
		return $this->oDb->single();
	}

	public function readAll( $aFields = array() ) {
		$sFields = implode( " ", $aFields );
		$this->oDb->query( "SELECT $sFields FROM `entinfocontent`" );
		return $this->oDb->resultset();
	}

	public function delete( $iContentId ) {
		$this->oDb->query( "DELETE FROM `entinfocontent` WHERE `contentId`=$iContentId" );
		return $this->oDb->execute();
	}


}