<?php
if (!defined('_PS_VERSION_'))
    exit;
 
require_once (_PS_MODULE_DIR_.'smartblog/smartblog.php');
class SmartBlogRelatedPosts extends Module {

        public function __construct() {
        $this->name = 'smartblogrelatedposts';
        $this->tab = 'front_office_features';
        $this->version = '2.0.1';
        $this->bootstrap = true;
        $this->author = 'SmartDataSoft';
        $this->secure_key = Tools::encrypt($this->name);
        
        parent::__construct();
        
        $this->displayName = $this->l('Smart Blog Related Post');
        $this->description = $this->l('The Most Powerfull Presta shop Blog  Module\'s Related Posts - by smartdatasoft');
        $this->confirmUninstall = $this->l('Are you sure you want to delete your details ?');
    }
        public function install(){
        $langs = Language::getLanguages();
        $id_lang = (int) Configuration::get('PS_LANG_DEFAULT');
         if (!parent::install()
	     || !$this->registerHook('displaySmartAfterPost') 
		 || !$this->registerHook('displaySmartBlogLeft')
		 || !$this->registerHook('actionsbtogglepost')
		 || !$this->registerHook('actionsbupdatepost')
		 || !$this->registerHook('actionsbnewpost')
		 || !$this->registerHook('actionsbdeletepost')
         )
    return false;
         Configuration::updateGlobalValue('smartshowrelatedpost',5);
         return true;
    }
               
    public function uninstall() {
	 $this->DeleteCache();
            if (!parent::uninstall())
                 return false;
            Configuration::deleteByName('smartshowrelatedpost');
            return true;
                }
		public function DeleteCache()
            {
				return $this->_clearCache('smartblogrelatedposts.tpl', $this->getCacheId());
			}
    public function hookdisplaySmartAfterPost($params)
       {
        if(Module::isInstalled('smartblog') != 1){
                 $this->smarty->assign( array(
                              'smartmodname' => $this->name
                     ));
                        return $this->display(__FILE__, 'views/templates/front/install_required.tpl');
                }
                else
                {
	     if (!$this->isCached('smartblogrelatedposts.tpl', $this->getCacheId()))
                        {
                        $id_cat  = BlogCategory::getCategoryNameByPost(Tools::getvalue('id_post'));
                             $id_lang = $this->context->language->id;
                             $posts =  SmartBlogPost::getRelatedPosts($id_lang,$id_cat,Tools::getvalue('id_post'));
							 $i = 0;
							   foreach($posts as $post) {
								   if (file_exists(_PS_MODULE_DIR_.'smartblog/images/' . $post['id_smart_blog_post'] . '.jpg') )
								   {
									  $image =   $post['id_smart_blog_post'];
									  $posts[$i]['post_img'] = $image;
								   }
								   else
								   {
									  $posts[$i]['post_img'] ='no';
								   }
								   $i++;
							   }
                             $this->smarty->assign( array(
                                           'posts' => $posts
                                 ));
                        }
                    return $this->display(__FILE__, 'views/templates/front/smartblogrelatedposts.tpl', $this->getCacheId());
                }
       }
       
                public function getContent(){
         
                $html = '';
                if(Tools::isSubmit('save'.$this->name))
                {
                    Configuration::updateValue('smartshowrelatedpost', Tools::getvalue('smartshowrelatedpost'));
                    $html = $this->displayConfirmation($this->l('The settings have been updated successfully.'));
                    $helper = $this->SettingForm();
                    $html .= $helper->generateForm($this->fields_form); 
                    return $html;
                }
                else
                {
                   $helper = $this->SettingForm();
                   $html .= $helper->generateForm($this->fields_form);
                   return $html;
                }
            }
            
     public function SettingForm() {
        $default_lang = (int) Configuration::get('PS_LANG_DEFAULT');
        $this->fields_form[0]['form'] = array(
          'legend' => array(
          'title' => $this->l('General Setting'),
            ),
            'input' => array(
                
                array(
                    'type' => 'text',
                    'label' => $this->l('Show Number Of Related Posts'),
                    'name' => 'smartshowrelatedpost',
                    'size' => 15,
                    'required' => true
                )                
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'button btn btn-default'
            )
        );

        $helper = new HelperForm();
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;
        foreach (Language::getLanguages(false) as $lang)
                            $helper->languages[] = array(
                                    'id_lang' => $lang['id_lang'],
                                    'iso_code' => $lang['iso_code'],
                                    'name' => $lang['name'],
                                    'is_default' => ($default_lang == $lang['id_lang'] ? 1 : 0)
                            );
        $helper->toolbar_btn = array(
            'save' =>
            array(
                'desc' => $this->l('Save'),
                'href' => AdminController::$currentIndex . '&configure=' . $this->name . '&save'.$this->name.'token=' . Tools::getAdminTokenLite('AdminModules'),
            )
        );
        $helper->default_form_language = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;
        $helper->title = $this->displayName;
        $helper->show_toolbar = true;       
        $helper->toolbar_scroll = true;    
        $helper->submit_action = 'save'.$this->name;
        
        $helper->fields_value['smartshowrelatedpost'] = Configuration::get('smartshowrelatedpost');
        return $helper;
      }
		public function hookactionsbdeletepost($params)
            {
                 return $this->DeleteCache();
            }
		public function hookactionsbnewpost($params)
            {
                 return $this->DeleteCache();
            }
		public function hookactionsbupdatepost($params)
            {
                 return $this->DeleteCache();
            }
		public function hookactionsbtogglepost($params)
            {
                 return $this->DeleteCache();
            }
}