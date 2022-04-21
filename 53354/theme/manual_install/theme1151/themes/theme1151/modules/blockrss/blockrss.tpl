<!-- Block RSS module-->
<section id="rss_block_left" class="block">
	<h4 class="title_block">{$title}</h4>
	<div class="block_content">
		{if $rss_links}
			<ul>
				{foreach from=$rss_links item='rss_link'}
					<li>
                    	<a href="{$rss_link.url}" title="{$rss_link.title}">{$rss_link.title}</a>
                    </li>
				{/foreach}
			</ul>
		{else}
			<p>{l s='No RSS feed added' mod='blockrss'}</p>
		{/if}
	</div>
</section>
<!-- /Block RSS module-->
