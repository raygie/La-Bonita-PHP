{if $wishlists|count == 1}
    <p class="buttons_bottom_block no-print">
        <a id="wishlist_button" href="#" onclick="WishlistCart('wishlist_block_list', 'add', '{$id_product|intval}', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;" rel="nofollow"  title="{l s='Add to my wishlist' mod='blockwishlist'}">
            {l s='Add to wishlist' mod='blockwishlist'}
        </a>
    </p>
{else}
	<div class="buttons_bottom_block no-print">
        {foreach name=wl from=$wishlists item=wishlist}
            {if $smarty.foreach.wl.first}
                <a tabindex="0" data-toggle="popover" data-trigger="focus" title="Wishlist" data-placement="bottom" id="wishlist_button" class="with_wishlist">{l s='Add to wishlist' mod='blockwishlist'}</a>
                    <div hidden id="popover-content">
                        <table class="table" border="1">
                            <tbody>
            {/if}
                                <tr title="{$wishlist.name}" value="{$wishlist.id_wishlist}" onclick="WishlistCart('wishlist_block_list', 'add', '{$id_product|intval}', $('idCombination').val(), document.getElementById('quantity_wanted').value, '{$wishlist.id_wishlist}');">
                                    <td>
                                        {l s='Add to %s'|sprintf:$wishlist.name mod='blockwishlist'}
                                    </td>
                                </tr>
            {if $smarty.foreach.wl.last}
                        </tbody>
                    </table>
                </div>
            {/if}
        {foreachelse}
            <a href="#" id="wishlist_button" onclick="WishlistCart('wishlist_block_list', 'add', '{$id_product|intval}', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;" rel="nofollow"  title="{l s='Add to my wishlist' mod='blockwishlist'}">
                {l s='Add to wishlist' mod='blockwishlist'}
            </a>
        {/foreach}
    </div>
{/if}
