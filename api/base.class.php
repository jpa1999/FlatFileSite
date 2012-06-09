<?PHP

class Base{


	public function Base(){
	
	}
	
	//--------------------------
	// Clean up strings
	//--------------------------
	function cleanString( $string ){
		return strip_tags( $string );
	}
	
	//--------------------------
	// Include 
	//--------------------------
	function get_include_contents( $filename ) {
		if (is_file($filename)) {
			ob_start();
			include $filename;
			return ob_get_clean();
		}
		return false;
	}
	//--------------------------
	// Include 
	//--------------------------
	function log( $message ) {
		echo "---------------------------<br>\n";
		echo $message . "<br>\n";
	}
	
	
}


?>