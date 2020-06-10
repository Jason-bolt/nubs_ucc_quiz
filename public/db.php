<?php

	// define("DB_HOST", "remotemysql.com");
	// define("DB_USER", "5LjmMscBgr");
	// define("DB_PASSWORD", "01lIYfVvyy");
	// define("DB_NAME", "5LjmMscBgr");

	// $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// if (mysqli_connect_error()) {
	// 	die("Database connection failed "
	// 		.
	// 	 mysqli_connect_error()
	// 	);
	// }



	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "nubs_ucc_quiz");

	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if (mysqli_connect_error()) {
		die("Database connection failed "
			.
		 mysqli_connect_error()
		);
	}

?>