<?php 
class language_switch {
	private $language_available =array('en','id');
	private $language_default ='en';
	private $language_file =array(
		'flag',
		'footer',
		'form',
		'handling',
		'head',
		'label',
		'menu',
		'table',
		'title'
	);
	private $parameter_get = '';
	private $parametersession ='multilanguage';
	function __construct()
	{
		#parent::__construct();
		$this->run_language();
	}
	public function run_language()
	{
		$CI =& get_instance();
		$language = $this->language_default;
		// $language_switchto = $CI->input->get($this->parameter_get);
		$language_switchto = get_language();
		$parametersessioninrun = $this->parametersession;
		if ($language_switchto) {
			if (in_array($language_switchto, $this->language_available)) {
				$CI->session->set_userdata( array('multilanguage'=> $language_switchto));
			}
		}
		$session_lang_swicth = $CI->session->userdata($this->parametersession);
		if (!$session_lang_swicth) {
			$CI->session->set_userdata( array('multilanguage' => $language));
			$language=$this->language_default ;
		}else{
			$language=$session_lang_swicth ;
		}
		$language_file=$this->language_file;
		foreach ($language_file as $key) {
			if ($key!='') {
				$CI->lang->load($key, $language);
			}
		}
		
	}
}
