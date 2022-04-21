{capture name=path}
	<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='My account'}">{l s='My account'}</a>
    <span class="navigation-pipe">{$navigationPipe}</span>
    <span class="navigation_page">{l s='Credit slips'}</span>
{/capture}

<h1 class="page-heading bottom-indent">
	{l s='Credit slips'}
</h1>

<p class="info-title">
	{l s='Credit slips you have received after canceled orders'}.
</p>

<div class="block-center" id="block-history">
	{if $ordersSlip && count($ordersSlip)}
		<table id="order-list" class="table table-bordered footab">
			<thead>
				<tr>
					<th data-sort-ignore="true" class="first_item">{l s='Credit slip'}</th>
					<th data-sort-ignore="true" class="item">{l s='Order'}</th>
					<th class="item">{l s='Date issued'}</th>
					<th data-sort-ignore="true" data-hide="phone" class="last_item">{l s='View credit slip'}</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$ordersSlip item=slip name=myLoop}
					<tr class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if} {if $smarty.foreach.myLoop.index % 2}alternate_item{/if}">
						<td class="bold">
							<span class="color-myaccount">
								{l s='#%s' sprintf=$slip.id_order_slip|string_format:"%06d"}
							</span>
						</td>
						<td class="history_method">
							<a class="color-myaccount" href="javascript:showOrder(1, {$slip.id_order|intval}, '{$link->getPageLink('order-detail')|escape:'html':'UTF-8'}');">
								{l s='#%s' sprintf=$slip.id_order|string_format:"%06d"}
							</a>
						</td>
						<td class="bold"  data-value="{$slip.date_add|regex_replace:"/[\-\:\ ]/":""}">
							{dateFormat date=$slip.date_add full=0}
						</td>
						<td class="history_invoice">
							<a class="link-button" href="{$link->getPageLink('pdf-order-slip', true, NULL, "id_order_slip={$slip.id_order_slip|intval}")|escape:'html':'UTF-8'}" title="{l s='Credit slip'} {l s='#%s' sprintf=$slip.id_order_slip|string_format:"%06d"}">
								<i class="fa fa-file-text large"></i>
                                {l s='PDF'}
							</a>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
		<div id="block-order-detail" class="unvisible">&nbsp;</div>
	{else}
		<p class="alert alert-warning">{l s='You have not received any credit slips.'}</p>
	{/if}
</div><!-- #block-history -->

<ul class="footer_links clearfix">
	<li>
		<a class="btn btn-default btn-sm" href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='Back to your account'}">
			<span>
				<i class="fa fa-chevron-left"></i> 
                {l s='Back to your account'}
			</span>
		</a>
	</li>
	<li>
		<a class="btn btn-default btn-sm" href="{$base_dir}" title="{l s='Home'}">
			<span>
				<i class="fa fa-chevron-left"></i> 
                {l s='Home'}
			</span>
		</a>
	</li>
</ul>
