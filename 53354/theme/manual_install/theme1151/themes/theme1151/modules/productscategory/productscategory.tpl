{if count($categoryProducts) > 0 && $categoryProducts !== false}
    <section class="page-product-box blockproductscategory">
        <h3 class="productscategory_h3 page-product-heading">{$categoryProducts|@count} {l s='other products in the same category:' mod='productscategory'}</h3>
        <div id="productscategory_list" class="clearfix">
            <ul id="bxslider1" class="bxslider clearfix">
                 {foreach from=$categoryProducts item='categoryProduct' name=categoryProduct}
                    <li class="product-box item">
                        <a href="{$link->getProductLink($categoryProduct.id_product, $categoryProduct.link_rewrite, $categoryProduct.category, $categoryProduct.ean13)}" class="lnk_img product-image" title="{$categoryProduct.name|htmlspecialchars}"><img src="{$link->getImageLink($categoryProduct.link_rewrite, $categoryProduct.id_image, 'tm_home_default')|escape:'html':'UTF-8'}" alt="{$categoryProduct.name|htmlspecialchars}" /></a>
                        
                        <h5 class="product-name">
                            <a href="{$link->getProductLink($categoryProduct.id_product, $categoryProduct.link_rewrite, $categoryProduct.category, $categoryProduct.ean13)|escape:'html':'UTF-8'}" title="{$categoryProduct.name|htmlspecialchars}">{$categoryProduct.name|truncate:14:'...'|escape:'html':'UTF-8'}</a>
                        </h5>
                        {if $ProdDisplayPrice && $categoryProduct.show_price == 1 && !isset($restricted_country_mode) && !$PS_CATALOG_MODE}
                        	<p class="price_display">
                                {if isset($categoryProduct.specific_prices) && $categoryProduct.specific_prices
                                && ($categoryProduct.displayed_price|number_format:2 !== $categoryProduct.price_without_reduction|number_format:2)}
            
                                    <span class="price special-price">{convertPrice price=$categoryProduct.displayed_price}</span>
                                    {if $categoryProduct.specific_prices.reduction && $categoryProduct.specific_prices.reduction_type == 'percentage'}
                                        <span class="price-percent-reduction small">-{$categoryProduct.specific_prices.reduction * 100}%</span>
                                    {/if}
                                    <span class="old-price">{displayWtPrice p=$categoryProduct.price_without_reduction}</span>
            
                                {else}
            
                                    <span class="price">{convertPrice price=$categoryProduct.displayed_price}</span>
            
                                {/if}
                            </p>
                        {/if}
                    </li>
                {/foreach}
            </ul>
        </div>
    </section>
{/if}