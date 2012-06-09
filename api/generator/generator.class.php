<?PHP

include "../base.class.php";

class Generator extends Base{


	public function Generator(){
		echo "Generator";
	}
	
	public function run(){
	
		$this->getDirStructure();
		
		$main 		= 	$this->get_include_contents("../../templates/main.tpl.php");
		//$js_src 	= 	get_file_contents("../../templates/js_src.tpl.php");
		//$content 	= 	get_file_contents("../../templates/content.tpl.php");
		
		file_put_contents( "../../index.html", $main );
	}
	
	public function getDirStructure(){
		
		
		$output = array();
		//| grep -v '.git
		//List -Recursively | choose everyline that end to : | 
		exec( "ls -R ../.. | grep ':$' | sed -e 's/:$//' -e 's/\.\.\/\.\.\///' | grep -v '\.' ", $output );
		
		print_r( $output );
		
		//Print list out
		$output_string = "";
		
		$level = 0;
		
		for( $i=0; $i< count( $output ); $i++ ){
			
			$components = explode( "/", $output[$i] );
			$previous_level = $level;
			$level = count( $components );
			
			if( $level > $previous_level ) $output_string .= "<ul>";
			if( $level < $previous_level ) $output_string .= "</ul>";
			
			$output_string .= "<li>" . array_pop( $components ) . "</li>";
			
			//print_r( $components );
		
		
		}
		
		echo $output_string;
		
		//print_r( $output );
				
		/*$path = realpath('../../');
		
		//Directory iterator
		$dit = new RecursiveDirectoryIterator( $path );
		// Skip "dot" files 
		$dit->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
		
		$pit = new ParentIterator($dit);
		$rit = new RecursiveIteratorIterator( $pit, RecursiveIteratorIterator::SELF_FIRST );
		
		foreach ($rit as $fileinfo) {
			//print_r( $fileinfo );
			$filename = $fileinfo->getFilename();
			echo "<br>" . substr ( $filename , 0, 1 )  . "<br>";
			
			if( substr ( $filename , 0, 1 ) != "." ){
				echo "Depth: " . $rit->getDepth();
    			echo $fileinfo->getPathname() . "<br>";
    		}
		}  
		
		// *******************
		// TEST 3
		// TEST 4
		// *******************
		/*$path = realpath('../../');

		$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST  );
		
		foreach($objects as $name => $object){
    		echo "<br>$name\n";
    		echo "<br>Depth:" . $objects->getDepth();
    		echo "Is dir:" . $object->isDir() . "<br>";
		}*/
	}

}



?>