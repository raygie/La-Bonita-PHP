<?php
include(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
include(dirname(__FILE__).'/smartblogfeed.php');

$id_category = ((int)(Tools::getValue('id_category')) ? (int)(Tools::getValue('id_category')) : (int)(Tools::getValue('id_category')));
$allNews = smartblogfeed::getToltalByCategory((int)Context::getContext()->language->id,$id_category);
header("Content-Type:text/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";

?>
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	>
	<channel>
		<title><![CDATA[<?php echo Configuration::get('smartblogmetatitle') ?>]]></title>
		<description><![CDATA[<?php echo Configuration::get('smartblogmetadescrip') ?>]]></description>
		<link><?php echo _PS_BASE_URL_.__PS_BASE_URI__; ?></link>
		<webMaster><?php echo Configuration::get('PS_SHOP_EMAIL') ?></webMaster>
		<generator>SmartDataSoft</generator>
		<language><?php echo Context::getContext()->language->iso_code; ?></language>
		<sy:updatePeriod><?php echo Configuration::get('smart_update_period') ?></sy:updatePeriod>
		<sy:updateFrequency><?php echo Configuration::get('smart_update_frequency') ?></sy:updateFrequency>
<?php
	foreach($allNews AS $post)
	{
	$options =array();
		echo "\t\t<item>\n";
		echo "\t\t\t<title><![CDATA[".$post['meta_title']."]]></title>\n";
		echo "\t\t\t<description><![CDATA[";
		echo $post['short_description']."]]></description>\n";
		$options['id_post'] = $post['id_post'];
        $options['slug'] = $post['link_rewrite'];
		echo "\t\t\t<link><![CDATA[".$post['blink']."]]></link>\n";
		echo "\t\t</item>\n";
	}
?>
	</channel>
</rss>