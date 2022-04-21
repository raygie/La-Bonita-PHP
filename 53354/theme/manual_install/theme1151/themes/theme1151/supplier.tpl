{include file="$tpl_dir./errors.tpl"}

{if !isset($errors) OR !sizeof($errors)}
	<h1 class="page-heading product-listing">
		{l s='List of products by supplier:'}&nbsp;{$supplier->name|escape:'html':'UTF-8'}
	</h1>
	{if !empty($supplier->description)}
		<div class="description_box rte">
			<p>{$supplier->description}</p>
		</div>
	{/if}

	{if $products}
		<div class="content_sortPagiBar">
	    	<div class="sortPagiBar clearfix">
				{include file="./product-sort.tpl"}
				{include file="./nbr-product-page.tpl"}
			</div>
	    	<div class="top-pagination-content clearfix">
	        	{include file="./product-compare.tpl"}
	            {include file="$tpl_dir./pagination.tpl"}
	        </div>
		</div>

		{include file="./product-list.tpl" products=$products}

		<div class="content_sortPagiBar">
	        <div class="bottom-pagination-content clearfix">
	        	{include file="./product-compare.tpl"}
				{include file="./pagination.tpl" paginationId='bottom'}
	        </div>
		</div>
	{else}
		<p class="alert alert-warning">{l s='No products for this supplier.'}</p>
	{/if} 
{/if}
