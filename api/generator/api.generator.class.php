<?PHP

include "../base.class.php";

class Generator extends Base{

	
	public function Generator(){
		
		$this->log( "Generator" );
	}
	
	public function run(){
	
		$this->getDirStructure();
		
		$this->createFullSite();
		
		//$main 		= 	$this->get_include_contents("templates/main.tpl.php");
		//$js_src 	= 	get_file_contents("../../templates/js_src.tpl.php");
		//$content 	= 	get_file_contents("../../templates/content.tpl.php");
		
		//file_put_contents( "index.html", $main );
	}
	
	public function createFullSite(){
		$files = file( "data/structure/list/index.html" );
		print_r( $files );
		foreach( $files as $file ){}
		
	}
	
	public function getDirStructure(){
		
		chdir( "data/content" );	
		$directories = array();
		exec( "find . -type d -regex './[^.].*'", $directories );
		chdir( "../.." );
		
		print_r( $directories );
		
		$this->saveDirectoryList( $directories, $data_folder );
		
	}

	public function saveDirectoryList( $directories ){
		
		//Print list out
		$list = "";
		$html_list = "";
		
		$level = 0;
		
		for( $i=0; $i< count( $directories ); $i++ ){
			
			$list .= str_replace("./","", $directories[$i] . "\n" );
			
			$components = explode( "/", $directories[$i] );
			$previous_level = $level;
			$level = count( $components );
			
			if( $level > $previous_level ) $html_list .= "<ul>";
			if( $level < $previous_level ) $html_list .= "</ul>";
			
			$html_list .= "<li>" . array_pop( $components ) . "</li>";

		}
		
		
		file_put_contents( $data_folder . "data/structure/list/index.html", 		$list );
		file_put_contents( $data_folder . "data/structure/html_list/index.html", 	$html_list );
	}
	
	public function changeDirectory(){
		
	}
	

}



?>