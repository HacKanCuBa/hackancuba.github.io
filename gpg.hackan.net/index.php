<?php
const KEYFILE = '0xECF0573B1C9B59E8.gpg';

$download = isset($_GET['d']) ?: isset($_GET['f']);
$response = 'Unknow error';

if (file_exists(KEYFILE)) {
	header('Content-Description: HacKan\'s GPG key');
	if ($download) {
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="' . basename(KEYFILE) . '"');
	} else {
		header('Content-Type: text/plain; charset=utf-8');
		header('Content-Disposition: inline');
	}
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize(KEYFILE));
	$response = readfile(KEYFILE);
} else {
	$response = "File: " . KEYFILE . " doesn't exists!";
}

exit($response);
