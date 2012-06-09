<?PHP

require_once "../base.class.php";

class Content extends Base{


	var $path = "data/content/";
	
	public function Content(){}
	
	public function create(){
		$this->checkFolders( $_GET['file'] );
		file_put_contents( $this->path . $_GET['file'] . "/index.html",  $_GET['content']  );
	}
	
	public function checkFolders( $path ){
		
		$exploded_path = explode( "/", $path );
		$traversed_path = "";
		
		for( $i=0;$i<count($exploded_path);$i++ ){
			$this->checkFolder( $this->path . $traversed_path . $exploded_path[$i] );
			$traversed_path .= $exploded_path[$i] ."/";
		}
	}
	
	public function checkFolder( $path ){
	
		$this->log("Check folder:" . $path );
		
		if( !is_dir( $path ) ){
			mkdir( $path );
		}else{
			$this->log("Folder exists allready: " . $path );
		}
	}

}



?>