<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/amazonwebservices/aws-sdk-for-php/services/s3.class.php';


if($_FILES['image'] !== null) {

	$credentials = array(
		"key"    => "your_key",
		"secret" => "your_secret"
	);

	$s3 = new AmazonS3($credentials);


	$bucket   = "test-bucket";
	$fileName = "profile/icon.png";
	$filepath = $_FILES["image"]["tmp_name"];

	$response = $s3->create_object($bucket, $fileName, array(
		"acl"         => AmazonS3::ACL_PUBLIC,
		"contentType" => "image/png",
		"fileUpload"  => $filepath
	));

	var_dump($response->isOK());

}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="image" />
		<input type="submit" />
	</form>
</body>
</html>
