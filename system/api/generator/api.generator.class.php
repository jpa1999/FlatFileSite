<?PHP

require_once "../base.class.php";
require_once "../content/api.folders.php";

class Generator extends Base{

	var $folders;
	
	public function Generator(){
		$this->log( "Generator" );
		$this->folders = new Folders();
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
		
		$paths = file( "data/structure/list/index.html" );	
		
		
		foreach( $paths as $path ){
			
			$path = trim( $path );
			
			$main = $this->get_include_contents("templates/main.tpl.php", "data/content/" . $path . "/index.html" );
			$this->folders->checkFolders( $path );
			file_put_contents( "../" . $path . "/index.html", $main );
		}
		
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
			
			$tabs = str_repeat("\t", $level );
			
			if( $level > $previous_level ) $html_list .= $tabs . "<ul>\n";
			if( $level < $previous_level ) $html_list .= str_repeat("\t", $level+1 ) . str_repeat("</ul>", $previous_level - $level ) . "\n";
			
			$html_list .= str_repeat("\t", $level+1 ) . "<li>" . array_pop( $components ) . "</li>\n";

		}
		
		$html_list .= "</ul>\n";
		
		file_put_contents( $data_folder . "data/structure/list/index.html", 		$list );
		file_put_contents( $data_folder . "data/structure/html_list/index.html", 	$html_list );
	}
	
	

}



?>