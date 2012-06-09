<?PHP

include "../base.class.php";

class Generator extends Base{


	public function Generator(){
		echo "Generator";
	}
	
	public function run(){
	
		chdir( "../.." );
		
		$this->getDirStructure();
		
		$main 		= 	$this->get_include_contents("templates/main.tpl.php");
		//$js_src 	= 	get_file_contents("../../templates/js_src.tpl.php");
		//$content 	= 	get_file_contents("../../templates/content.tpl.php");
		
		file_put_contents( "index.html", $main );
	}
	
	public function getDirStructure(){
		
		
		$directories = array();
		//| grep -v '.git
		//List -Recursively | choose everyline that end to : | 
		/*$list_recursively 			= "ls -R ../.. ";
		$grep_folders_only 			= "| grep ':$' ";
		$remove_path_and_ending 	= "| sed -e 's/:$//' -e 's/\.\.\/\.\.\///' ";
		$grep_dot_folders_out 		= "| grep -v '\.'";
		
		exec( $list_recursively.$grep_folders_only.$remove_path_and_ending.$grep_dot_folders_out, $output );*/
		
		
		//exec( "find ../.. -type d -name '[^.]*' -print | sed -e 's/\.\.\/\.\.\///' | grep -v '\.' ", $directories );
		exec( "find . -type d -regex './[^.].*'", $directories );
		
		
		print_r( $directories );
		
		
		$this->saveDirectoryList( $directories );
		
		
		
		
	}
	
	public function saveDirectoryList( $directories ){
		
		//Print list out
		$output_string = "";
		
		$level = 0;
		
		for( $i=0; $i< count( $directories ); $i++ ){
			
			$components = explode( "/", $directories[$i] );
			$previous_level = $level;
			$level = count( $components );
			
			if( $level > $previous_level ) $output_string .= "<ul>";
			if( $level < $previous_level ) $output_string .= "</ul>";
			
			$output_string .= "<li>" . array_pop( $components ) . "</li>";

		}
		
		echo $output_string;
		
		file_put_contents( "data/structure/index.html", $output_string );
	}
	

}



?>