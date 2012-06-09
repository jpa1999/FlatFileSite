<?PHP
	
	include_once "api.generator.class.php";
	include_once "../base.class.php";
	
	chdir( "../..");
	
	$base = new Base();
	
	$q = ( !empty( $_POST['q'] ) )? $_POST['q'] : $_GET['q'];
	$q = $base->cleanString( $q );


	$generator = new Generator();
	
	
	if( $q == "generate"){
		$generator->run();
	}


?>