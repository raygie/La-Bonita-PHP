<!-- MODULE Block contact infos -->
<section id="block_contact_infos" class="footer-block col-xs-12 col-sm-3">
	<div>
        <h4>{l s='Store Information' mod='blockcontactinfos'}</h4>
        <ul class="toggle-footer">
            {if $blockcontactinfos_company != ''}
            	<li>
            		<i class="fa fa-map-marker"></i>
                    {$blockcontactinfos_company|escape:'html':'UTF-8'}
                    	{if $blockcontactinfos_address != ''}
                        	, {$blockcontactinfos_address|escape:'html':'UTF-8'}
                        {/if}
            	</li>
            {/if}
            {if $blockcontactinfos_phone != ''}
            	<li>
            		<i class="fa fa-phone"></i>
                    {l s='Call us now:' mod='blockcontactinfos'} 
            		<span class="phone">{$blockcontactinfos_phone|escape:'html':'UTF-8'}</span>
            	</li>
            {/if}
            {if $blockcontactinfos_email != ''}
            	<li>
            		<i class="fa fa-envelope-o"></i>
                    {l s='Email:' mod='blockcontactinfos'} 
            		<span>{mailto address=$blockcontactinfos_email|escape:'html':'UTF-8' encode="hex"}</span>
            	</li>
            {/if}
        </ul>
    </div>
</section>
<!-- /MODULE Block contact infos -->
