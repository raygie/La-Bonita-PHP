{if isset($categories) AND !empty($categories)}
    <section id="category_blog_block_left"  class="block">
        <h4 class='title_block'><a href="{smartblog::GetSmartBlogLink('smartblog_list')}">{l s='Blog Categories' mod='smartblogcategories'}</a></h4>
        <div class="block_content list-block">
            <ul>
                {foreach from=$categories item="category"}
                {assign var="options" value=null}
                {$options.id_category = $category.id_smart_blog_category}
                {$options.slug = $category.link_rewrite}
                    <li>
                    	<a href="{smartblog::GetSmartBlogLink('smartblog_category',$options)}">[{$category.count}] {$category.meta_title}</a>
                    </li>
                {/foreach}
            </ul>
        </div>
    </section>
{/if}