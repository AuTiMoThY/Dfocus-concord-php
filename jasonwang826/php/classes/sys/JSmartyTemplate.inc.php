<?
	class JSmartyTemplate extends Smarty	{
		static public $plugins_dirs = array( './plugins/' );
		public $template='default';
		public function __construct($template=null)	{
			global $SMARTY_JASONWANG826_PLUGINS_DIR;
			parent::__construct();
			$SMARTY_WDIR=$_SERVER['JASONWANG826_CONFIG']['SMARTY_WDIR'];
			$SMARTY_TEMPLATE_DIR=$_SERVER['JASONWANG826_CONFIG']['SMARTY_TEMPLATE_DIR'];
			$this->template_dir =
				array(
					'.' ,
					"{$SMARTY_TEMPLATE_DIR}" ,
					"{$SMARTY_WDIR}templates"
				);
			$this->compile_dir = $SMARTY_WDIR.'templates_c';
			$this->cache_dir = $SMARTY_WDIR.'cache';
			$this->config_dir = $SMARTY_WDIR.'configs';
			$this->plugins_dir = array_merge(self::$plugins_dirs,$this->plugins_dir);
			$this->left_delimiter = '<{';
			$this->right_delimiter = '}>';
		//	$this->setCaching(Smarty::CACHING_LIFETIME_SAVED);
			if($template!=null)	$this->setTemplate($template);
		}
		public function setTemplate($template)	{
			$this->template = $template;
		}
		public function getTemplate($template)	{
			return $this->template;
		}
		public function fetch(
				$tplFname = null,
				$cache_id = null,
				$compile_id = null,
				$parent = null,
				$display = false,
				$merge_tpl_vars = true,
				$no_output_filter = false )	{
			//	if tplFname exist in current template then use it.
			//	if not, get tplFname from default template
			//	if not exists at all, throw exception
			$_SERVER['JASONWANG826_CONFIG']['TEMPLATE_URL'] = "{$_SERVER['JASONWANG826_CONFIG']['TEMPLATE_URL_BASE']}/{$this->template}";
			$_SERVER['JASONWANG826_CONFIG']['TEMPLATE_NAME'] = $this->template;
			$real_template = $this->template;
			if( !file_exists("{$_SERVER['JASONWANG826_CONFIG']['SMARTY_TEMPLATE_DIR']}/{$this->template}/layout.tpl.htm") )
				$real_template = 'default';
			if( !file_exists("{$_SERVER['JASONWANG826_CONFIG']['SMARTY_TEMPLATE_DIR']}/{$real_template}/layout.tpl.htm") )
				throw new Exception("Template '{$tplFname}' layout.tpl.htm does not exists!");
			$_SERVER['JASONWANG826_CONFIG']['TEMPLATE_NAME_REAL'] = $real_template;
			$_SERVER['JASONWANG826_CONFIG']['TEMPLATE_URL_REAL'] = "{$_SERVER['JASONWANG826_CONFIG']['TEMPLATE_URL_BASE']}/{$real_template}";
			$_SERVER['JASONWANG826_CONFIG']['TEMPLATE_FNAME_REAL'] = "{$_SERVER['JASONWANG826_CONFIG']['SMARTY_TEMPLATE_DIR']}/{$real_template}/layout.tpl.htm";
			return parent::fetch($tplFname, $cache_id, $compile_id, $parent, $display, $merge_tpl_vars, $no_output_filter );
		}
	}
	JSmartyTemplate::$plugins_dirs[]=$_SERVER['JASONWANG826_CONFIG']['SMARTY_WEB_PLUGINS_DIR'];
	JSmartyTemplate::$plugins_dirs[]=$_SERVER['JASONWANG826_CONFIG']['SMARTY_JASONWANG826_PLUGINS_DIR'];
?>