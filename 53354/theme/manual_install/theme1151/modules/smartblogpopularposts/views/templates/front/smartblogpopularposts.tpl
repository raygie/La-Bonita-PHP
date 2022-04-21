{if isset($posts) AND !empty($posts)}
    <section id="blogPopular" class="block">
        <h4 class='title_block'><a href="{smartblog::GetSmartBlogLink('smartblog')}">{l s='Popular Articles' mod='smartblogpopularposts'}</a></h4>
            <div class="block_content products-block">
                <ul>
                    {foreach from=$posts item="post" name=posts}
                        {assign var="options" value=null}
                        {$options.id_post= $post.id_smart_blog_post}
                        {$options.slug= $post.link_rewrite}
                        <li class="clearfix{if $smarty.foreach.posts.last} last_item{elseif $smarty.foreach.posts.first} first_item{else}{/if}">
                            <a class="products-block-image" title="{$post.meta_title}" href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">
                            	<img alt="{$post.meta_title}" src="{$modules_dir}/smartblog/images/{$post.post_img}-home-small.jpg">
                            </a>
                            <div class="product-content">
                            	<a class="post-name" title="{$post.meta_title}" href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">{$post.meta_title}</a>
                            	<span class="info">{$post.created|date_format:"%b %d, %Y"}</span>
                            </div>
                        </li> 
                    {/foreach}
                </ul>
            </div>
    </section>
{/if}