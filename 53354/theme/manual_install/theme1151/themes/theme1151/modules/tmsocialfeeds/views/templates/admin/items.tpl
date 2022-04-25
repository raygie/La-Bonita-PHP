<script type="text/javascript">
	var closeText = "{l s='Close' mod='themeconfigurator'}";
</script>
<ul class="nav nav-tabs">
	{foreach from=$htmlitems.type.all item=type}
		<li id="soc-{$type|escape:'htmlall':'UTF-8'}" class="{if $type == $htmlitems.type.default} active{/if}">
			<a href="#items-{$type|escape:'htmlall':'UTF-8'}" data-toggle="tab">{$type|escape:'htmlall':'UTF-8'}</a>
		</li>
	{/foreach}
</ul>
<div class="socials-items tab-content">
{foreach name=langs from=$htmlitems.items key=type item=langItems}
	<div id="items-{$type|escape:'htmlall':'UTF-8'}" class="lang-content tab-pane  {if $type == $htmlitems.type.default} active{/if}" >
	{foreach name=hooks from=$langItems key=hook item=hookItems}
		<h4 class="hook-title clearfix">{l s='Hook' mod='themeconfigurator'} "{$hook|escape:'htmlall':'UTF-8'}" {if $hookItems}<button class="editItem btn btn-default pull-right">{l s='Edit item' mod='themeconfigurator'}</button>{else}<button class="addItem btn btn-success pull-right">{l s='Add item' mod='themeconfigurator'}</button>{/if}</h4>
        {if $hookItems}
            {foreach name=items from=$hookItems item=hItem}
                {include file="{$admin_path|escape:'htmlall':'UTF-8'}items_{$hItem.item_type}.tpl"}
            {/foreach}
        {else}
        	{include file="{$admin_path|escape:'htmlall':'UTF-8'}new_{$type}.tpl"}
        {/if}
	{/foreach}
	</div>
{/foreach}
</div>
