<!-- MODULE Block best sellers -->
<section id="best-sellers_block_right" class="block products_block">
	<h4 class="title_block">
    	<a href="{$link->getPageLink('best-sales')|escape:'html'}" title="{l s='View a top sellers products' mod='blockbestsellers'}">{l s='Top sellers' mod='blockbestsellers'}</a>
    </h4>
	<div class="block_content">
	{if $best_sellers && $best_sellers|@count > 0}
		<ul class="block_content products-block">
			{foreach from=$best_sellers item=product name=myLoop}
			<li class="clearfix">
				<a href="{$product.link|escape:'html'}" title="{$product.legend|escape:'html':'UTF-8'}" class="products-block-image content_img clearfix">
					<img class="replace-2x img-responsive" src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'tm_small_default')|escape:'html'}" alt="{$product.legend|escape:'html':'UTF-8'}" />
				</a>
				<div class="product-content">
                	<h5>
                    	<a class="product-name" href="{$product.link|escape:'html'}" title="{$product.legend|escape:'html':'UTF-8'}">
                            {$product.name|strip_tags:'UTF-8'|escape:'html':'UTF-8'}
                        </a>
                    </h5>
                    <p class="product-description">{$product.description_short|strip_tags:'UTF-8'|truncate:75:'...'}</p>
                    {if !$PS_CATALOG_MODE}
                        <div class="price-box">
                            <span class="price">{$product.price}</span>
                        </div>
                    {/if}
                </div>
			</li>
		{/foreach}
		</ul>
		<div class="lnk">
        	<a href="{$link->getPageLink('best-sales')|escape:'html'}" title="{l s='All best sellers' mod='blockbestsellers'}"  class="btn btn-default btn-sm icon-right">
            	<span>
                	{l s='All best sellers' mod='blockbestsellers'}
               	</span>
            </a>
        </div>
	{else}
		<p>{l s='No best sellers at this time' mod='blockbestsellers'}</p>
	{/if}
	</div>
</section>
<!-- /MODULE Block best sellers -->