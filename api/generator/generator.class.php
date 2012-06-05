<?PHP

include "../base.class.php";

class Generator extends Base{


	public function Generator(){
		echo "Generator";
	}
	
	public function run(){
		$main 		= 	$this->get_include_contents("../../templates/main.tpl.php");
		//$js_src 	= 	get_file_contents("../../templates/js_src.tpl.php");
		//$content 	= 	get_file_contents("../../templates/content.tpl.php");
		
		file_put_contents( "../../index.html", $main );
	}

}



?>