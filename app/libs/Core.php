<?php

/*
	*this is core file
	*contain all the major rules in routing.
	*contains all the functionality before going to controller
	*creates and load the controller when its available
*/


class Core
{
	/*
	*create current controller and initialize it to home
	*create current method
	*create current parameters
	*/

	protected $defaultController='Home';
	protected $defaultMethod='index';
	protected $defaultparams=[];
	protected $errorhandler='';

	/*
	*constructor to run whenever an instance is created
	*/
	public function __construct(){
		$url=$this->getUrl();

		if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
			$this->defaultController=ucwords($url[0]);
			unset($url[0]);
		}else{
			require '../app/controllers/errorhandler.php';
			$this->errorhandler='Errorhandler';
			$this->errorhandler=new $this->errorhandler;
			exit;
		}

		require_once '../app/controllers/'.$this->defaultController.'.php';

		$this->defaultController=new $this->defaultController;

		if(isset($url[1])){
			if(method_exists($this->defaultController, $url[1])){
				$this->defaultMethod = $url[1];

				//unset the value in url[1] so it cant be used again
				unset($url[1]);
			}
		}

		//set parameter to the rest value in URL
		$this->defaultparams=$url? array_values($url) : [] ;

		//pass the obtained parameter in the method in controller using callbacl method

		call_user_func_array([$this->defaultController, $this->defaultMethod], $this->defaultparams);


	}

	/*
	* method which will handels the URL stuff
	*/

	public function getUrl(){
		if (isset($_GET['url'])) {
			$url=rtrim($_GET['url'], '/');
			$url=filter_var($_GET['url'],FILTER_SANITIZE_URL);
			$url= explode('/', $_GET['url']);
			return $url;
		}


	}

}
