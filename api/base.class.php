<?PHP

class Base{

	var $original_dir;
	
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
	//---------------------------
	//
	//----------------------------
	/*function normalizeDir(){
		chdir( "../..");
		$this->original_dir = getcwd();	
		$this->log( "Main dir:" . $this->original_dir );
	}*/
	//--------------------------
	// LOG 
	//--------------------------
	function log( $message ) {
		echo "---------------------------<br>\n";
		echo $message . "<br>\n";
	}
	
	
}


?>