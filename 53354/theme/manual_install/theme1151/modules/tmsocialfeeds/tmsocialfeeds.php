<?php
if (!defined('_PS_VERSION_'))
	exit;

class TmSocialFeeds extends Module
{

	public function __construct()
	{
		$this->name = 'tmsocialfeeds';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->bootstrap = true;
		$this->author = 'Template Monster (Alexander Grosul)';
		$this->types = array('twitter', 'facebook', 'pinterest', 'instagram');
		$this->default_language = Language::getLanguage(Configuration::get('PS_LANG_DEFAULT'));
		parent::__construct();
		$this->displayName = $this->l('TM Social Feeds');
		$this->description = $this->l('Module for Social Feeds.');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
		
		$this->hooks_js_path = _PS_MODULE_DIR_.$this->name.'/js/';

	}

	public function install()
	{
		if (!parent::install() 
			|| !$this->installDB() || 
			!$this->registerHook('displayHeader') || 
			!$this->registerHook('displayLeftColumn') || 
			!$this->registerHook('displayRightColumn') || 
			!$this->registerHook('displayHome') || 
			!$this->registerHook('displayFooter') || 
			!$this->registerHook('displayBackOfficeHeader') || 
			!Configuration::updateValue('TMTWITTERFEED_DISPLAY', false) || 
			!Configuration::updateValue('TMTWITTERFEED_ID', '') || 
			!Configuration::updateValue('TMFACEBOOK_DISPLAY', false) || 
			!Configuration::updateValue('TMFACEBOOK_ID', '') || 
			!Configuration::updateValue('TMPINTEREST_DISPLAY', false) || 
			!Configuration::updateValue('TMPINTEREST_ID', '') ||
			!Configuration::updateValue('TMINSTAGRAM_DISPLAY', false) || 
			!Configuration::updateValue('TMINSTAGRAM_ID', '') || 
			!Configuration::updateValue('TMINSTAGRAM_USERNAME', '') || 
			!Configuration::updateValue('TMINSTAGRAM_ACCESSTOKEN', '')||
			!Configuration::updateValue('TMINSTAGRAM_USERID', '') || 
			!Configuration::updateValue('TMINSTAGRAM_TYPE', '') || 
			!Configuration::updateValue('TMINSTAGRAM_TAG', ''))
			return false;

		return true;
	}

	private function installDB()
	{
		return (
			Db::getInstance()->Execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'tmsocialfeed`') && 
			Db::getInstance()->Execute('
			CREATE TABLE `'._DB_PREFIX_.'tmsocialfeed` (
					`id_item` int(10) unsigned NOT NULL AUTO_INCREMENT,
					`id_shop` int(10) unsigned NOT NULL,
					`item_order` int(10) unsigned NOT NULL,
					`item_type` VARCHAR(100),
					`hook` VARCHAR(100),
					`item_theme` VARCHAR(100),
					`item_width` int(10) unsigned NOT NULL,
					`item_height` int(10) unsigned NOT NULL,
					`item_limit` int(10) unsigned NOT NULL,
					`item_header` tinyint(1) unsigned NOT NULL DEFAULT \'1\',
					`item_footer` tinyint(1) unsigned NOT NULL DEFAULT \'1\',
					`item_border` tinyint(1) unsigned NOT NULL DEFAULT \'1\',
					`item_replies` tinyint(1) unsigned NOT NULL DEFAULT \'1\',
					`item_scroll` tinyint(1) unsigned NOT NULL DEFAULT \'1\',
					`item_background` tinyint(1) unsigned NOT NULL DEFAULT \'1\',
					`item_col_width` int(10) unsigned NOT NULL,
					`active` tinyint(1) unsigned NOT NULL DEFAULT \'0\',
					PRIMARY KEY (`id_item`)
			) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=UTF8;')
		);

	}
	
	
	public function uninstall()
	{
		if (!Db::getInstance()->Execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'tmsocialfeeds`') ||
			!Configuration::deleteByName('TMTWITTERFEED_DISPLAY') ||
			!Configuration::deleteByName('TMTWITTERFEED_ID') ||
			!Configuration::deleteByName('TMFACEBOOK_DISPLAY') ||
			!Configuration::deleteByName('TMFACEBOOK_ID') ||
			!Configuration::deleteByName('TMPINTEREST_DISPLAY') ||
			!Configuration::deleteByName('TMPINTEREST_ID') ||
			!Configuration::deleteByName('TMINSTAGRAM_DISPLAY') ||
			!Configuration::deleteByName('TMINSTAGRAM_ID') ||
			!Configuration::deleteByName('TMINSTAGRAM_USERNAME') ||
			!Configuration::deleteByName('TMINSTAGRAM_ACCESSTOKEN') ||
			!Configuration::deleteByName('TMINSTAGRAM_USERID') ||
			!Configuration::deleteByName('TMINSTAGRAM_TYPE') ||
			!Configuration::deleteByName('TMINSTAGRAM_TAG') ||
			!parent::uninstall())
			return false;

		return true;
	}
	public function getContent()
	{
		$output = null;

		if (Tools::isSubmit('submit'.$this->name))
		{
			$tmtf_display	= Tools::getValue('TMTWITTERFEED_DISPLAY');
			$tmtf_id 		= Tools::getValue('TMTWITTERFEED_ID');
			$tmff_display	= Tools::getValue('TMFACEBOOK_DISPLAY');
			$tmff_id 		= Tools::getValue('TMFACEBOOK_ID');
			$tmfp_display	= Tools::getValue('TMPINTEREST_DISPLAY');
			$tmfp_id 		= Tools::getValue('TMPINTEREST_ID');
			$tmfi_display	= Tools::getValue('TMINSTAGRAM_DISPLAY');
			$tmfi_id 		= Tools::getValue('TMINSTAGRAM_ID');
			$tmfi_username	= Tools::getValue('TMINSTAGRAM_USERNAME');
			$tmfi_access	= Tools::getValue('TMINSTAGRAM_ACCESSTOKEN');
			$tmfi_user_id	= Tools::getValue('TMINSTAGRAM_USERID');
			$tmfi_type		= Tools::getValue('TMINSTAGRAM_TYPE');
			$tmfi_tag		= Tools::getValue('TMINSTAGRAM_TAG');

			if ($tmtf_display && (!$tmtf_id || empty($tmtf_id)) || 
				$tmff_display && (!$tmff_id || empty($tmff_id)) || 
				$tmfp_display && (!$tmfp_id || empty($tmfp_id)))
				
				$output .= $this->displayError($this->l('Invalid Id value'));
				
			else if ($tmfi_display && (!$tmfi_id || empty($tmfi_id)))
			{
				$output .= $this->displayError($this->l('Invalid Instagram Client Id value'));
			}
			else if($tmfi_display && ($tmfi_id || empty($tmfi_id)) && $tmfi_type =='tagged' && (!$tmfi_tag || empty($tmfi_tag)))
			{
				$output .= $this->displayError($this->l('"Instagram Tag" is required for "tagged" mode.'));
			}
			else if($tmfi_display && ($tmfi_id || empty($tmfi_id)) && $tmfi_type =='user' && ((!$tmfi_user_id || empty($tmfi_user_id)) || (!$tmfi_access || empty($tmfi_access))))
			{
				$output .= $this->displayError($this->l('"Instagram User ID" and "Instagram Access Token" are required for "user" mode.'));
			}
			else
			{
				Configuration::updateValue('TMTWITTERFEED_DISPLAY', $tmtf_display);
				Configuration::updateValue('TMTWITTERFEED_ID', $tmtf_id);
				Configuration::updateValue('TMFACEBOOK_DISPLAY', $tmff_display);
				Configuration::updateValue('TMFACEBOOK_ID', $tmff_id);
				Configuration::updateValue('TMPINTEREST_DISPLAY', $tmfp_display);
				Configuration::updateValue('TMPINTEREST_ID', $tmfp_id);
				Configuration::updateValue('TMINSTAGRAM_DISPLAY', $tmfi_display);
				Configuration::updateValue('TMINSTAGRAM_ID', $tmfi_id);
				Configuration::updateValue('TMINSTAGRAM_USERNAME', $tmfi_username);
				Configuration::updateValue('TMINSTAGRAM_ACCESSTOKEN', $tmfi_access);
				Configuration::updateValue('TMINSTAGRAM_USERID', $tmfi_user_id);
				Configuration::updateValue('TMINSTAGRAM_TYPE', $tmfi_type);
				Configuration::updateValue('TMINSTAGRAM_TAG', $tmfi_tag);

				$output .= $this->displayConfirmation($this->l('Settings updated.'));
			}
		}
		elseif (Tools::isSubmit('newItem'))
		{
			$item_type = Tools::getValue('feed_type');
			$hook = Tools::getValue('hook');
			$id_shop = Tools::getValue('id_shop');
			$item_order = Tools::getValue('sort_order');
			$item_width = Tools::getValue('item_width');
			$item_height = Tools::getValue('item_height');
			$item_limit = Tools::getValue('item_limit');
			$item_theme = Tools::getValue('item_theme');
			$item_header = Tools::getValue($item_type.'_'.$hook.'_header');
			$item_footer = Tools::getValue($item_type.'_'.$hook.'_footer');
			$item_border = Tools::getValue($item_type.'_'.$hook.'_border');
			$item_replies = Tools::getValue($item_type.'_'.$hook.'_replies');
			$item_scroll = Tools::getValue($item_type.'_'.$hook.'_scroll');
			$item_background = Tools::getValue($item_type.'_'.$hook.'_background');
			$item_col_width = Tools::getValue('item_col_width');
			$active = Tools::getValue($item_type.'_'.$hook);

			if (count($this->checkItem($item_type, $hook, $id_shop)) > 0)
				$this->updateItem(
					$item_type, $hook, $id_shop,
					$item_theme, $item_order, $item_width,
					$item_height, $item_limit, $item_header,
					$item_footer, $item_border,
					$item_replies, $item_scroll,
					$item_background, $item_col_width, $active
				);
			else
				$this->addItem(
					$item_type, $hook, $id_shop,
					$item_theme, $item_order, $item_width,
					$item_height, $item_limit, $item_header,
					$item_footer, $item_border, $item_replies,
					$item_scroll, $item_background, $item_col_width, $active
				);
		}

		$output .= $this->displayForm();
		$output .= $this->displayNewContainerForm();

		return $output;
	}

	protected function checkItem($item_type, $hook, $id_shop)
	{
		return Db::getInstance()->ExecuteS('
		SELECT *
		FROM `'._DB_PREFIX_.'tmsocialfeed`
		WHERE id_shop = '.$id_shop.' AND item_type = "'.$item_type.'" AND hook = "'.$hook.'"');
	}

	protected function addItem($item_type, $hook, $id_shop, $item_theme, $item_order, $item_width, $item_height, $item_limit, $item_header, $item_footer, $item_border, $item_replies, $item_scroll, $item_background, $item_col_width, $active)
	{
		if (!Db::getInstance()->Execute('
			INSERT INTO `'._DB_PREFIX_.'tmsocialfeed` ( 
				`id_shop`,`item_type`, `item_order`, `item_theme`, `hook`, `item_width`, `item_height`, `item_limit`, `item_header`, `item_footer`, `item_border`, `item_replies`, `item_scroll`, `item_background`, `item_col_width`, `active`
			) 
			VALUES
			(
				\''.(int)$id_shop.'\',
				\''.pSQL($item_type).'\',
				\''.(int)$item_order.'\',
				\''.pSQL($item_theme).'\',
				\''.pSQL($hook).'\',
				\''.(int)$item_width.'\',
				\''.(int)$item_height.'\',
				\''.(int)$item_limit.'\',
				\''.(int)$item_header.'\',
				\''.(int)$item_footer.'\',
				\''.(int)$item_border.'\',
				\''.(int)$item_replies.'\',
				\''.(int)$item_scroll.'\',
				\''.(int)$item_background.'\',
				\''.(int)$item_col_width.'\',
				\''.(int)$active.'\'
				)'
			))
		{
			$this->context->smarty->assign('error', $this->l('An error occurred while saving data.'));
			return false;
		}

			$this->context->smarty->assign('confirmation', $this->l('Item successfully added.'));

		return true;
	}

	protected function updateItem($item_type, $hook, $id_shop, $item_theme, $item_order, $item_width, $item_height, $item_limit, $item_header, $item_footer, $item_border, $item_replies, $item_scroll, $item_background, $item_col_width, $active)
	{
		if (!Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'tmsocialfeed` SET 
					item_order = \''.(int)$item_order.'\',
					item_theme = \''.pSQL($item_theme).'\',
					item_width = \''.(int)$item_width.'\',
					item_height = \''.(int)$item_height.'\',
					item_limit = \''.(int)$item_limit.'\',
					item_header = \''.(int)$item_header.'\',
					item_footer = \''.(int)$item_footer.'\',
					item_border = \''.(int)$item_border.'\',
					item_replies = \''.(int)$item_replies.'\',
					item_scroll = \''.(int)$item_scroll.'\',
					item_background = \''.(int)$item_background.'\',
					item_col_width = \''.(int)$item_col_width.'\',
					active = '.(int)$active.'
			WHERE item_type = "'.pSQL($item_type).'" AND id_shop = '.(int)$id_shop.' AND hook = "'.pSQL($hook).'"'
		))
		{
			$this->context->smarty->assign('error', $this->l('An error occurred while updating data.'));

			return false;
		}

		$this->context->smarty->assign('confirmation', $this->l('Item successfully updated.'));

		return true;
	}

	protected function getHookItems($hook)
	{
		return Db::getInstance()->ExecuteS('
		SELECT *
		FROM `'._DB_PREFIX_.'tmsocialfeed`
		WHERE id_shop = '.(int)$this->context->shop->id.' AND hook = "'.$hook.'" AND active = 1 ORDER BY item_order ASC');
	}

	public function displayForm()
	{
		$default_lang = $this->default_language;
		$fields_form = array();

		$fields_form[0]['form'] = array(
			'legend' 	=> array(
				'title' 	=> $this->l('Social Widgets Settings'),
			),
			'input' 	=> array(
				array(
					'type' => 'switch',
					'label' => $this->l('Twitter Feed'),
					'name' => 'TMTWITTERFEED_DISPLAY',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'enable',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'disable',
							'value' => 0,
							'label' => $this->l('No')),
					),
				),
				array(
					'type' 		=> 'text',
					'label' 	=> $this->l('Widget ID'),
					'name' 		=> 'TMTWITTERFEED_ID',
					'size' 		=> 20,
					'required' 	=> true,
					'desc'		=> $this->l('Enter your twitter widget ID here'),
				),
				array(
					'type' => 'switch',
					'label' => $this->l('Facebook Feed'),
					'name' => 'TMFACEBOOK_DISPLAY',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'enable',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'disable',
							'value' => 0,
							'label' => $this->l('No')),
					),
				),
				array(
					'type' 		=> 'text',
					'label' 	=> $this->l('Account URL'),
					'name' 		=> 'TMFACEBOOK_ID',
					'size' 		=> 20,
					'required' 	=> true,
					'desc'		=> $this->l('Full public Facebook account URL.'),
				),
				array(
					'type' => 'switch',
					'label' => $this->l('Enable Pinterest Feed'),
					'name' => 'TMPINTEREST_DISPLAY',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'enable',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'disable',
							'value' => 0,
							'label' => $this->l('No')),
					),
				),
				array(
					'type' 		=> 'text',
					'label' 	=> $this->l('Profile URL'),
					'name' 		=> 'TMPINTEREST_ID',
					'size' 		=> 20,
					'required' 	=> true,
					'desc'		=> $this->l('Full Pinterest profile URL.'),
				),
				array(
					'type' => 'switch',
					'label' => $this->l('Enable Instagram Feed'),
					'name' => 'TMINSTAGRAM_DISPLAY',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'enable',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'disable',
							'value' => 0,
							'label' => $this->l('No')),
					),
				),
				array(
					'type' 		=> 'text',
					'label' 	=> $this->l('Client ID'),
					'name' 		=> 'TMINSTAGRAM_ID',
					'size' 		=> 20,
					'required' 	=> true,
					'desc'		=> $this->l('Instagram Client ID'),
				),
				array(
					'type' 		=> 'text',
					'label' 	=> $this->l('User Name'),
					'name' 		=> 'TMINSTAGRAM_USERNAME',
					'size' 		=> 20,
					'required' 	=> false,
					'desc'		=> $this->l('Instagram User Name.'),
				),
				array(
					'type' => 'select',
					'label' => $this->l('Get Feeds by'),
					'name' => 'TMINSTAGRAM_TYPE',
					'options' => array(
						'query' => array(
							array(
								'id' => 'tagged',
								'name' => $this->l('tagged')),
							array(
								'id' => 'user',
								'name' => $this->l('user')),
						),
						'id' => 'id',
						'name' => 'name'
					)
				),
				array(
					'type' 		=> 'text',
					'label' 	=> $this->l('Instagram Tag'),
					'name' 		=> 'TMINSTAGRAM_TAG',
					'size' 		=> 20,
					'required' 	=> false,
					'desc'		=> $this->l('Name of the tag to get. Use with "tagged" mode.'),
				),
				array(
					'type' 		=> 'text',
					'label' 	=> $this->l('Instagram User ID'),
					'name' 		=> 'TMINSTAGRAM_USERID',
					'size' 		=> 20,
					'required' 	=> false,
					'desc'		=> $this->l('Unique id of a user to get. Use with "user" mode.'),
				),
				array(
					'type' 		=> 'text',
					'label' 	=> $this->l('Instagram Access Token'),
					'name' 		=> 'TMINSTAGRAM_ACCESSTOKEN',
					'size' 		=> 20,
					'required' 	=> false,
					'desc'		=> $this->l('A valid oAuth token. Required to use "user" mode.'),
				),
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
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

		// Language
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;

		// Title and toolbar
		$helper->title = $this->displayName;
		$helper->show_toolbar 		= true;
		$helper->toolbar_scroll 	= true;
		$helper->submit_action 		= 'submit'.$this->name;
		$helper->toolbar_btn 		= array(
			'save' =>
			array(
				'desc' => $this->l('Save'),
				'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.
				'&token='.Tools::getAdminTokenLite('AdminModules'),
			),
			'back' => array(
				'href' => AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
				'desc' => $this->l('Back to list')
			)
		);

		// Load current value
		$helper->fields_value['TMTWITTERFEED_DISPLAY']	 		= Configuration::get('TMTWITTERFEED_DISPLAY');
		$helper->fields_value['TMTWITTERFEED_ID']	 			= Configuration::get('TMTWITTERFEED_ID');
		$helper->fields_value['TMFACEBOOK_DISPLAY']		 		= Configuration::get('TMFACEBOOK_DISPLAY');
		$helper->fields_value['TMFACEBOOK_ID']	 				= Configuration::get('TMFACEBOOK_ID');
		$helper->fields_value['TMPINTEREST_DISPLAY']	 		= Configuration::get('TMPINTEREST_DISPLAY');
		$helper->fields_value['TMPINTEREST_ID']		 			= Configuration::get('TMPINTEREST_ID');
		$helper->fields_value['TMINSTAGRAM_DISPLAY']		 	= Configuration::get('TMINSTAGRAM_DISPLAY');
		$helper->fields_value['TMINSTAGRAM_ID']			 		= Configuration::get('TMINSTAGRAM_ID');
		$helper->fields_value['TMINSTAGRAM_USERNAME']	 		= Configuration::get('TMINSTAGRAM_USERNAME');
		$helper->fields_value['TMINSTAGRAM_TYPE']	 			= Configuration::get('TMINSTAGRAM_TYPE');
		$helper->fields_value['TMINSTAGRAM_ACCESSTOKEN'] 		= Configuration::get('TMINSTAGRAM_ACCESSTOKEN');
		$helper->fields_value['TMINSTAGRAM_USERID'] 			= Configuration::get('TMINSTAGRAM_USERID');
		$helper->fields_value['TMINSTAGRAM_TAG']	 			= Configuration::get('TMINSTAGRAM_TAG');

		return $helper->generateForm($fields_form);
	}

	public function displayNewContainerForm()
	{
		$id_shop = (int)$this->context->shop->id;
		$items = array();
		$hooks = array();

		$this->context->smarty->assign('admin_path', _PS_MODULE_DIR_.$this->name.'/views/templates/admin/');
		$this->context->smarty->assign('id_shop', (int)$this->context->shop->id);

		$this->context->smarty->assign('socstatus',	array(
			'facebook'	=> Configuration::get('TMFACEBOOK_DISPLAY'),
			'twitter'	=> Configuration::get('TMTWITTERFEED_DISPLAY'),
			'pinterest'	=> Configuration::get('TMPINTEREST_DISPLAY'),
			'instagram'	=> Configuration::get('TMINSTAGRAM_DISPLAY'),
			)
		);

		foreach ($this->types as $type)
		{
			$hooks[$type] = array(
				'home',
				'leftColumn',
				'rightColumn',
				'footer'
			);

			foreach ($hooks[$type] as $hook)
				$items[$type][$hook] = Db::getInstance()->ExecuteS('
					SELECT * FROM `'._DB_PREFIX_.'tmsocialfeed` 
					WHERE id_shop = '.(int)$id_shop.' 
					AND item_type = "'.$type.'" 
					AND hook = \''.pSQL($hook).'\' 
					ORDER BY item_order ASC'
				);
		}

		$this->context->smarty->assign('htmlitems', array(
			'items' => $items,
			'theme_url' => $this->context->link->getAdminLink('AdminHtmlContent'),
			'type' => array(
				'default' => 'twitter',
				'all' => $this->types,
			),
			'postAction' => 'index.php?tab=AdminModules&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&tab_module=other&module_name='.$this->name.'',
			'id_shop' => $id_shop
		));

		return $this->display(__FILE__, 'views/templates/admin/admin.tpl');
	}

	public function hookDisplayBackOfficeHeader()
	{
		if (Tools::getValue('configure') != $this->name)
			return;

		$this->context->controller->addCSS($this->_path.'css/admin.css');
		$this->context->controller->addJquery();
		$this->context->controller->addJS($this->_path.'js/admin.js');
	}

	public function hookDisplayHeader()
	{
		$this->context->controller->addJS($this->_path.'js/tmsocialfeeds.js');

		$this->context->smarty->assign('global_twitter', Configuration::get('TMTWITTERFEED_DISPLAY'));
		$this->context->smarty->assign('global_facebook', Configuration::get('TMFACEBOOK_DISPLAY'));
		$this->context->smarty->assign('global_pinterest', Configuration::get('TMPINTEREST_DISPLAY'));
		$this->context->smarty->assign('global_instagram', Configuration::get('TMINSTAGRAM_DISPLAY'));
		$this->context->smarty->assign('global_twitter_id', Configuration::get('TMTWITTERFEED_ID'));
		$this->context->smarty->assign('global_facebook_id', Configuration::get('TMFACEBOOK_ID'));
		$this->context->smarty->assign('global_pinterest_id', Configuration::get('TMPINTEREST_ID'));
		$this->context->smarty->assign('global_instagram_id', Configuration::get('TMINSTAGRAM_ID'));
		$this->context->smarty->assign('global_instagram_type', Configuration::get('TMINSTAGRAM_TYPE'));
		$this->context->smarty->assign('global_instagram_token', Configuration::get('TMINSTAGRAM_ACCESSTOKEN'));
		$this->context->smarty->assign('global_instagram_userid', Configuration::get('TMINSTAGRAM_USERID'));
		$this->context->smarty->assign('global_instagram_tag', Configuration::get('TMINSTAGRAM_TAG'));
		$this->context->smarty->assign('global_instagram_username', Configuration::get('TMINSTAGRAM_USERNAME'));
		

		$this->context->controller->addCSS($this->_path.'css/hook.css');
	}

	public function hookDisplayHome()
	{
		$this->context->smarty->assign('hook_content', $this->getHookItems('home'));
		$this->context->smarty->assign('hook_name', 'home');

		return $this->display(__FILE__, 'tmsocialfeeds.tpl');
	}

	public function hookDisplayFooter()
	{
		$this->context->smarty->assign('hook_content', $this->getHookItems('footer'));
		$this->context->smarty->assign('hook_name', 'footer');

		return $this->display(__FILE__, 'tmsocialfeeds.tpl');
	}

	public function hookDisplayLeftColumn()
	{
		$this->context->smarty->assign('hook_content', $this->getHookItems('leftColumn'));
		$this->context->smarty->assign('hook_name', 'left_column');

		return $this->display(__FILE__, 'tmsocialfeeds.tpl');
	}

	public function hookDisplayRightColumn()
	{
		$this->context->smarty->assign('hook_content', $this->getHookItems('rightColumn'));
		$this->context->smarty->assign('hook_name', 'right_column');

		return $this->display(__FILE__, 'tmsocialfeeds.tpl');
	}
}