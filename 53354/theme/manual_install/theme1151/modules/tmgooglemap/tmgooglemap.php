<?php
if (!defined('_PS_VERSION_'))
	exit;

class TmGoogleMap extends Module
{

	public function __construct()
	{
		$this->name = 'tmgooglemap';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->bootstrap = true;
		$this->author = 'Template Monster (Alexander Grosul)';
		$this->default_language = Language::getLanguage(Configuration::get('PS_LANG_DEFAULT'));
		parent::__construct();
		$this->displayName = $this->l('TM Google Map');
		$this->description = $this->l('Module for displaying your stores on Google map.');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
		$this->style_path = _PS_MODULE_DIR_.$this->name.'/js/styles';
	}

	public function install()
	{
		if (!parent::install() || 
			!$this->registerHook('displayHeader') || 
			!$this->registerHook('displayHome') || 
			!$this->registerHook('displayBackOfficeHeader') ||
			!Configuration::updateValue('TMGOOGLE_STYLE', 'subtle_grayscale') ||
			!Configuration::updateValue('TMGOOGLE_TYPE', 'roadmap') ||
			!Configuration::updateValue('TMGOOGLE_ZOOM', 8) ||
			!Configuration::updateValue('TMGOOGLE_SCROLL', 0) ||
			!Configuration::updateValue('TMGOOGLE_TYPE_CONTROL', 0) ||
			!Configuration::updateValue('TMGOOGLE_STREET_VIEW', 1))
			return false;

		return true;
	}

	public function uninstall()
	{
		if (!Configuration::deleteByName('TMGOOGLE_STYLE') ||
			!Configuration::deleteByName('TMGOOGLE_TYPE') ||
			!Configuration::deleteByName('TMGOOGLE_ZOOM') ||
			!Configuration::deleteByName('TMGOOGLE_SCROLL') ||
			!Configuration::deleteByName('TMGOOGLE_TYPE_CONTROL') ||
			!Configuration::deleteByName('TMGOOGLE_STREET_VIEW') ||
			!parent::uninstall())
			return false;

		return true;
	}

	public function getContent()
	{
		if (Tools::isSubmit('submit'.$this->name))
		{
			$new_style			= Tools::getValue('tmgooglestyle');
			$new_type			= Tools::getValue('tmgoogletype');
			$new_zoom			= Tools::getValue('tmgooglezoom');
			$new_scroll			= Tools::getValue('tmgooglescroll');
			$new_type_control	= Tools::getValue('tmgoogletypecontrol');
			$new_street_view	= Tools::getValue('tmgooglestreetview');
			
			Configuration::updateValue('TMGOOGLE_STYLE', $new_style);
			Configuration::updateValue('TMGOOGLE_TYPE', $new_type);
			Configuration::updateValue('TMGOOGLE_ZOOM', $new_zoom);
			Configuration::updateValue('TMGOOGLE_SCROLL', $new_scroll);
			Configuration::updateValue('TMGOOGLE_TYPE_CONTROL', $new_type_control);
			Configuration::updateValue('TMGOOGLE_STREET_VIEW', $new_street_view);
		}
		
		return $this->displayForm();
	}
	
	protected function _renderFileNames($path, $extensions = null)
	{
			if (!is_dir($path))
				return false;

			if ($extensions)
			{
				$extensions = (array)$extensions;
				$_extensions = implode( '|', $extensions);
			}

			$results = scandir($path);
			$files = array();

			foreach ($results as $result) 
			{
				if ('.' == $result[0])
				continue;
				
				if (!$extensions || preg_match('~\.('.$_extensions.')$~', $result))
					$files[] = $result;
			}

			return $files;
	}

	public function displayForm()
	{
		$default_lang = $this->default_language;
		$fields_form = array();
		$options = array();
		$stylesList = $this->_renderFileNames($this->style_path, 'js');
		
		foreach ($stylesList as $styleType)
			$options[] = array('id' => str_replace('.js', '', $styleType), 'name' => str_replace('.js', '', str_replace('_', ' ', $styleType)));
		
		$fields_form[]['form'] = array(
			'legend' 	=> array(
				'title' 	=> $this->l('Google Map Settings'),
			),
			'input' 	=> array(
				array(
					'type' => 'select',
					'label' => $this->l('Map Style'),
					'name' => 'tmgooglestyle',
					'options' => array(
						'query' => $options,
						'id' => 'id',
						'name' => 'name'
					)
				),
				array(
					'type' => 'select',
					'label' => $this->l('Map Type'),
					'name' => 'tmgoogletype',
					'options' => array(
						'query' => array(
							array(
								'id' => 'roadmap',
								'name' => $this->l('Roadmap')),
							array(
								'id' => 'satellite',
								'name' => $this->l('Satellite')),
						),
						'id' => 'id',
						'name' => 'name'
					)
				),
				array(
					'type' 		=> 'text',
					'label' 	=> $this->l('Zoom Level'),
					'name' 		=> 'tmgooglezoom',
					'size' 		=> 10,
					'required' 	=> false,
					'desc'		=> $this->l('Specify initial map zoom level (1 to 17).'),
				),
				array(
					'type' => 'switch',
					'label' => $this->l('Zoom on scroll'),
					'name' => 'tmgooglescroll',
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
					'desc'		=> $this->l('Enable map zoom on mouse wheel scroll.'),
				),
				array(
					'type' => 'switch',
					'label' => $this->l('Map controls'),
					'name' => 'tmgoogletypecontrol',
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
					'desc'		=> $this->l('Enable map interface control elements.'),
				),
				array(
					'type' => 'switch',
					'label' => $this->l('Street view'),
					'name' => 'tmgooglestreetview',
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
					'desc'		=> $this->l('Enable street view option.'),

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
		$helper->fields_value['tmgooglestyle'] 			= Configuration::get('TMGOOGLE_STYLE');
		$helper->fields_value['tmgoogletype'] 			= Configuration::get('TMGOOGLE_TYPE');
		$helper->fields_value['tmgooglezoom'] 			= Configuration::get('TMGOOGLE_ZOOM');
		$helper->fields_value['tmgooglescroll'] 		= Configuration::get('TMGOOGLE_SCROLL');
		$helper->fields_value['tmgoogletypecontrol'] 	= Configuration::get('TMGOOGLE_TYPE_CONTROL');
		$helper->fields_value['tmgooglestreetview'] 	= Configuration::get('TMGOOGLE_STREET_VIEW');

		return $helper->generateForm($fields_form);
	}

	public function hookDisplayHeader()
	{
		if (!isset($this->context->controller->php_self) || $this->context->controller->php_self != 'index')
			return;

		$default_country = new Country((int)Configuration::get('PS_COUNTRY_DEFAULT'));

		$this->context->controller->addCSS($this->_path.'css/hook.css');
		$this->context->controller->addJS('http'.((Configuration::get('PS_SSL_ENABLED') && Configuration::get('PS_SSL_ENABLED_EVERYWHERE')) ? 's' : '').'://maps.google.com/maps/api/js?sensor=true&amp;region='.Tools::substr($default_country->iso_code, 0, 2));
	}

	public function hookDisplayHome()
	{
		$this->context->smarty->assign(array(
			'searchUrl' => $this->context->link->getPageLink('stores'),
			'defaultLat' => (float)Configuration::get('PS_STORES_CENTER_LAT'),
			'defaultLong' => (float)Configuration::get('PS_STORES_CENTER_LONG'),
			'logo_store' => Configuration::get('PS_STORES_ICON')
			)
		);

		$this->context->smarty->assign('hasStoreIcon', file_exists(_PS_IMG_DIR_.Configuration::get('PS_STORES_ICON')));
		$this->context->smarty->assign('map_type', Configuration::get('TMGOOGLE_TYPE'));
		$this->context->smarty->assign('map_zoom', (int)Configuration::get('TMGOOGLE_ZOOM'));
		$this->context->smarty->assign('map_scroll_zoom', (int)Configuration::get('TMGOOGLE_SCROLL'));
		$this->context->smarty->assign('map_type_control', (int)Configuration::get('TMGOOGLE_TYPE_CONTROL'));
		$this->context->smarty->assign('map_street_view', (int)Configuration::get('TMGOOGLE_STREET_VIEW'));

		$map_style = Configuration::get('TMGOOGLE_STYLE');

		$this->context->controller->addJS($this->_path.'js/styles/'.$map_style.'.js');
		$this->context->controller->addJS($this->_path.'js/stores.js');

		return $this->display(__FILE__, 'tmgooglemap.tpl');
	}

	public function hookDisplayFooter()
	{
		return $this->hookDisplayHome();
	}
}