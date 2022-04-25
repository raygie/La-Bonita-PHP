{capture name=path}
	<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='My account'}">{l s='My account'}</a>
    <span class="navigation-pipe">{$navigationPipe}</span>
    <span class="navigation_page">{l s='My addresses'}</span>
{/capture}

<h1 class="page-heading">{l s='My addresses'}</h1>

<p>{l s='Please configure your default billing and delivery addresses when placing an order. You may also add additional addresses, which can be useful for sending gifts or receiving an order at your office.'}</p>

{if isset($multipleAddresses) && $multipleAddresses}
    <div class="addresses">
        <p><strong class="dark">{l s='Your addresses are listed below.'}</strong></p>
        <p class="p-indent">{l s='Be sure to update your personal information if it has changed.'}</p>
        {assign var="adrs_style" value=$addresses_style}
        <div class="bloc_adresses row">
            {foreach from=$multipleAddresses item=address name=myLoop}
                <div class="col-xs-12 col-sm-6 address">
                    <ul class="{if $smarty.foreach.myLoop.last}last_item{elseif $smarty.foreach.myLoop.first}first_item{/if}{if $smarty.foreach.myLoop.index % 2} alternate_item{else} item{/if} box">
                        <li>
                            <h3 class="page-subheading">{$address.object.alias}</h3>
                        </li>
                        {foreach from=$address.ordered name=adr_loop item=pattern}
                            {assign var=addressKey value=" "|explode:$pattern}
                            <li>
                                {foreach from=$addressKey item=key name="word_loop"}
                                    <span {if isset($addresses_style[$key])} class="{$addresses_style[$key]}"{/if}>
                                        {$address.formated[$key|replace:',':'']|escape:'html':'UTF-8'}
                                    </span>
                                {/foreach}
                            </li>
                        {/foreach}
                        <li class="address_update">
                            <a class="btn btn-success btn-sm" href="{$link->getPageLink('address', true, null, "id_address={$address.object.id|intval}")|escape:'html':'UTF-8'}" title="{l s='Update'}">
                                <span>
                                    {l s='Update'}
                                    <i class="fa fa-refresh right"></i>
                                </span>
                            </a>
                            <a class="btn btn-danger btn-sm" href="{$link->getPageLink('address', true, null, "id_address={$address.object.id|intval}&delete")|escape:'html':'UTF-8'}" onclick="return confirm('{l s='Are you sure?' js=1}');" title="{l s='Delete'}">
                                <span>
                                    {l s='Delete'}
                                    <i class="fa fa-times right"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                {if $smarty.foreach.myLoop.index % 2 && !$smarty.foreach.myLoop.last} 
                </div>
                <div class="bloc_adresses row">
                {/if}
            {/foreach}
        </div>
    </div>
{else}
	<p class="alert alert-warning">{l s='No addresses are available.'}&nbsp;
    	<a href="{$link->getPageLink('address', true)|escape:'html':'UTF-8'}" title="{l s='Add a new address'}">{l s='Add a new address'}</a>
    </p>
{/if}

<div class="clearfix main-page-indent">
	<a href="{$link->getPageLink('address', true)|escape:'html':'UTF-8'}" title="{l s='Add an address'}" class="btn btn-default btn-md icon-right">
    	<span>
        	{l s='Add a new address'}
        </span>
    </a>
</div>

<ul class="footer_links clearfix">
	<li>
    	<a class="btn btn-default btn-sm icon-left" href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='Back to your account'}">
        	<span>
                 {l s='Back to your account'}
            </span>
        </a>
    </li>
	<li>
    	<a class="btn btn-default btn-sm icon-left" href="{$base_dir}" title="{l s='Home'}">
        	<span>
                {l s='Home'}
            </span>
        </a>
    </li>
</ul>