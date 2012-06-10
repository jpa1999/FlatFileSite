<?PHP

require_once "../base.class.php";
require_once "../content/api.folders.php";

class Content extends Base{

	var $folders;
	var $path = "data/content/";
	
	public function Content(){
		$this->folders = new Folders();
	}
	
	public function create(){
		foreach ( $_GET as $key => $value){
			if( $this->notRestricted( $key ) ){
				$this->folders->checkFolders( $this->path . $_GET['file'] . "/data/".$key );
				file_put_contents( 	$this->path . $_GET['file'] . "/data/".$key."/index.html",  $value  );
			}
		}
	}
	
	public function notRestricted( $key ){
		return ( $key != "q" && $key != "file" );
	}

}



?>