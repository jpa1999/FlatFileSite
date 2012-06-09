<?PHP
	
	include_once "api.content.class.php";
	include_once "../base.class.php";
	
	chdir( "../..");
	$base = new Base();
	
	
	$q = ( !empty( $_POST['q'] ) )? $_POST['q'] : $_GET['q'];
	$q = $base->cleanString( $q );



	$content = new Content();
	
	
	if( $q == "create"){
		$content->create();
	}


?>