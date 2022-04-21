{if isset($tags) AND !empty($tags)}
    <section id="tags_blog_block_left" class="block">
        <h4 class='title_block'><a href="{smartblog::GetSmartBlogLink('smartblog')}">{l s='Tags Post' mod='smartblogtag'}</a></h4>
        <div class="block_content clearfix">
            {foreach from=$tags item="tag"}
                {assign var="options" value=null}
                {$options.tag = $tag.name}
                {if $tag!=""}
                	<a href="{smartblog::GetSmartBlogLink('smartblog_tag',$options)}">{$tag.name}</a>
                {/if}
            {/foreach}
        </div>
    </section>
{/if}