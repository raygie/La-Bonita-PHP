<section id="wishlist_block" class="block account">
	<h4 class="title_block">
		<a href="{$link->getModuleLink('blockwishlist', 'mywishlist', array(), true)|escape:'html':'UTF-8'}" title="{l s='My wishlists' mod='blockwishlist'}" rel="nofollow">
			{l s='Wishlist' mod='blockwishlist'}
		</a>
	</h4>
	<div class="block_content">
		<div id="wishlist_block_list" class="expanded">
			{if $wishlist_products}
				<dl class="products">
					{foreach from=$wishlist_products item=product name=i}
						<dt class="{if $smarty.foreach.i.first}first_item{elseif $smarty.foreach.i.last}last_item{else}item{/if}">
							<span class="quantity-formated">
								<span class="quantity">{$product.quantity|intval}</span>x
							</span>
							<a class="cart_block_product_name" href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}">
								{$product.name|truncate:30:'...'|escape:'html':'UTF-8'}
							</a>
							<a class="ajax_cart_block_remove_link" href="javascript:;" rel="nofollow" title="{l s='remove this product from my wishlist' mod='blockwishlist'}" onclick="javascript:WishlistCart('wishlist_block_list', 'delete', '{$product.id_product}', {$product.id_product_attribute}, '0', '{if isset($token)}{$token}{/if}');">
								<i class="fa fa-times"></i>
							</a>
						</dt>
						{if isset($product.attributes_small)}
							<dd class="{if $smarty.foreach.i.first}first_item{elseif $smarty.foreach.i.last}last_item{else}item{/if}">
								<a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category_rewrite)|escape:'html':'UTF-8'}" title="{l s='Product detail'}">
									{$product.attributes_small|escape:'html':'UTF-8'}
								</a>
							</dd>
						{/if}
					{/foreach}
				</dl>
			{else}
				<dl class="products no-products">
					<dt>{l s='No products' mod='blockwishlist'}</dt>
					<dd></dd>
				</dl>
			{/if}
		</div> <!-- #wishlist_block_list -->

		<div class="lnk">
			{if $wishlists}
				<div class="form-group selector1">
					<select name="wishlists" id="wishlists" class="form-control">
						{foreach from=$wishlists item=wishlist name=i}
								<option value="{$wishlist.id_wishlist}"{if $id_wishlist eq $wishlist.id_wishlist or ($id_wishlist == false and $smarty.foreach.i.first)} selected="selected"{/if}>
									{$wishlist.name|truncate:22:'...'|escape:'html':'UTF-8'}
								</option>
						{/foreach}
					</select>
				</div>
			{/if}
			<a class="btn btn-default btn-sm icon-right" href="{$link->getModuleLink('blockwishlist', 'mywishlist', array(), true)|escape:'html':'UTF-8'}" title="{l s='My wishlists' mod='blockwishlist'}">
				<span>
					{l s='My wishlists' mod='blockwishlist'}
				</span>
			</a>
		</div> <!-- .lnk -->
	</div> <!-- .block_content -->
</section> <!-- #wishlist_block -->