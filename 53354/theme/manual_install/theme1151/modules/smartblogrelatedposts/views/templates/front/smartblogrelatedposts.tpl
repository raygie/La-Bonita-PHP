{if isset($posts) AND !empty($posts)}
    <div id="articleRelated" class="block">
    	<h4 class="title_block">{l s='Related Posts: ' mod='smartblogrelatedposts'}</h4>
        <div class="block_content"> 
            <ul class="row">
                {foreach from=$posts item="post"}
                	{assign var="options" value=null}
                	{$options.id_post= $post.id_smart_blog_post}
                	{$options.slug= $post.link_rewrite}
                	<li class="col-xs-6 col-sm-4">
                    	<a class="products-block-image" title="{$post.meta_title}" href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">
                     		<img class="img-responsive" alt="{$post.meta_title}" src="{$modules_dir}/smartblog/images/{$post.post_img}-home-default.jpg">
                        </a>
                    	<p><a class="post-name" title="{$post.meta_title}" href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">{$post.meta_title}</a></p>
                		<span class="info">{$post.created|date_format:"%b %d, %Y"}</span>
                	</li> 
                {/foreach}
            </ul>
        </div>
    </div>
{/if}