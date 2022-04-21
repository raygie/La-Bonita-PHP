{strip}
	{addJsDef favorite_products_url_add=$link->getModuleLink('favoriteproducts', 'actions', ['process' => 'add'])|escape:'quotes':'UTF-8'}
	{addJsDef favorite_products_url_remove=$link->getModuleLink('favoriteproducts', 'actions', ['process' => 'remove'], true)|escape:'quotes':'UTF-8'}
	{if isset($smarty.get.id_product)}
		{addJsDef favorite_products_id_product=$smarty.get.id_product|intval}
	{/if} 
{/strip}