<?php
if (!defined('_PS_VERSION_'))
    exit;
require_once (_PS_MODULE_DIR_.'smartblog/smartblog.php');
class SmartBlogAddThisButton extends Module {
    
        public function __construct() {
        $this->name = 'smartblogaddthisbutton';
        $this->tab = 'front_office_features';
        $this->version = '2.0.1';
        $this->bootstrap = true;
        $this->author = 'SmartDataSoft';
        $this->secure_key = Tools::encrypt($this->name);
        
        parent::__construct();
        
        $this->displayName = $this->l('Smart Blog Moduel Add This Button');
        $this->description = $this->l('The Most Powerfull Presta shop Blog  Module\'s Add This Button - by smartdatasoft');
        $this->confirmUninstall = $this->l('Are you sure you want to delete your details ?');
    }
    
        public function install(){
        $langs = Language::getLanguages();
        $id_lang = (int) Configuration::get('PS_LANG_DEFAULT');
         if (!parent::install()  
	     || !$this->registerHook('displaySmartAfterPost')
	 
         )
    return false;
         return true;
    }
    
        public function uninstall() {
            if (!parent::uninstall())
                 return false;
            return true;
                }
    
        public function hookdisplaySmartAfterPost($params){
            return $this->display(__FILE__, 'views/templates/front/smartblogaddthisbutton.tpl');
            } 
}