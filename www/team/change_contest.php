<?php

if ( empty($_SERVER['HTTP_REFERER']) ) die("Missing referrer header.");

// Referer can not be submission_details or clarification, then we redirect
// back to index
$referer = $_SERVER['HTTP_REFERER'];

if ( preg_match('/(.*team\/)(?:submission_details|clarification)\.php/', $referer, $matches) ) {
	$referer = $matches[1];
}

setcookie('domjudge_cid', $_REQUEST['cid']);

header('Location: ' . $referer);
