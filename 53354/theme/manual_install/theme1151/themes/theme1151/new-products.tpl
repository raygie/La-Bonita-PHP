{capture name=path}{l s='New products'}{/capture}

<h1 class="page-heading product-listing">{l s='New products'}</h1>

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
	<p class="alert alert-warning">{l s='No new products.'}</p>
{/if}
