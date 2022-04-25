<?php
if (!defined('_PS_VERSION_'))
    exit;
 
require_once (_PS_MODULE_DIR_.'smartblog/classes/BlogCategory.php');
require_once (_PS_MODULE_DIR_.'smartblog/smartblog.php');
class SmartBlogCategories extends Module {
    
        public function __construct() {
        $this->name = 'smartblogcategories';
        $this->tab = 'front_office_features';
        $this->version = '2.0.1';
        $this->bootstrap = true;
        $this->author = 'SmartDataSoft';
        $this->secure_key = Tools::encrypt($this->name);
        
        parent::__construct();
        
        $this->displayName = $this->l('Smart Blog Categories');
        $this->description = $this->l('The Most Powerfull Presta shop Blog  Module\'s tag - by smartdatasoft');
        $this->confirmUninstall = $this->l('Are you sure you want to delete your details ?');
        }
        public function install(){
                $langs = Language::getLanguages();
                $id_lang = (int) Configuration::get('PS_LANG_DEFAULT');
                 if (!parent::install() || !$this->registerHook('actionsbdeletecat') 
				 || !$this->registerHook('actionsbnewcat') 
				 || !$this->registerHook('actionsbupdatecat') 
				 || !$this->registerHook('actionsbtogglecat') 
				 || !$this->registerHook('displaySmartBlogLeft') 
                 )
            return false;
                 return true;
            }
            
        public function uninstall() {
		$this->DeleteCache();
            if (!parent::uninstall())
                 return false;
            return true;
                }
         public function hookLeftColumn($params)
            {
             if(Module::isInstalled('smartblog') != 1){
                 $this->smarty->assign( array(
                              'smartmodname' => $this->name
                     ));
                        return $this->display(__FILE__, 'views/templates/front/install_required.tpl');
                }
                else
                {
                  if (!$this->isCached('smartblogcategories.tpl', $this->getCacheId()))
                       {
                           $view_data = array();
                           $id_lang = $this->context->language->id;
                           $BlogCategory = new BlogCategory();
                           $categories = $BlogCategory->getCategory(1,$id_lang);
                           $i = 0;
                           foreach ($categories as $category){
                             $categories[$i]['count'] = $BlogCategory->getPostByCategory($category['id_smart_blog_category']);
                             $i++;
                           }
                           $this->smarty->assign( array(
                                         'categories' => $categories
                               ));
                        }
                       return $this->display(__FILE__, 'views/templates/front/smartblogcategories.tpl',$this->getCacheId());
                }
            }
            
         public function hookRightColumn($params)
            {
                 return $this->hookLeftColumn($params);
            }
         public function hookdisplaySmartBlogLeft($params)
            {
                 return $this->hookLeftColumn($params);
            }
         public function hookdisplaySmartBlogRight($params)
            {
                 return $this->hookLeftColumn($params);
            } 
		public function DeleteCache()
            {
				return $this->_clearCache('smartblogcategories.tpl', $this->getCacheId());
			}
		public function hookactionsbdeletecat($params)
            {
                 return $this->DeleteCache();
            }
		public function hookactionsbnewcat($params)
            {
                 return $this->DeleteCache();
            }
		public function hookactionsbupdatecat($params)
            {
                return $this->DeleteCache();
            }
		public function hookactionsbtogglecat($params)
            {
                return $this->DeleteCache();
            }
	
}