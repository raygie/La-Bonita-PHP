<div itemtype="#" itemscope="" class="sdsarticleCat clearfix">
    
    <div id="smartblogpost-{$post.id_post}">
    
        {assign var="options" value=null}
        {$options.id_post = $post.id_post} 
        {$options.slug = $post.link_rewrite}
        
        <h2 class='title_block_exclusive'><a title="{$post.meta_title}" href='{smartblog::GetSmartBlogLink('smartblog_post',$options)}'>{$post.meta_title}</a></h2>
        
        {assign var="options" value=null}
        {$options.id_post = $post.id_post}
        {$options.slug = $post.link_rewrite}
        {assign var="catlink" value=null}
        {$catlink.id_category = $post.id_category}
        {$catlink.slug = $post.cat_link_rewrite}
        
        
        <div class="articleContent">
            <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}" itemprop="url" title="{$post.meta_title}" class="imageFeaturedLink post-image">
                {assign var="activeimgincat" value='0'}
                {$activeimgincat = $smartshownoimg} 
                {if ($post.post_img != "no" && $activeimgincat == 0) || $activeimgincat == 1}
                    <img itemprop="image" alt="{$post.meta_title}" src="{$modules_dir}/smartblog/images/{$post.post_img}-single-default.jpg" class="imageFeatured img-responsive">
                {/if}
            </a>
            
            <div class="sdsarticle-des" itemprop="description">
                {assign var="options" value=null}
                {$options.id_post = $post.id_post}  
                {$options.slug = $post.link_rewrite}  
                {$post.short_description} <a class="read-more" title="{$post.meta_title}" href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}"><strong>{l s='Read more...' mod='smartblog'}</strong></a>
            </div>
            
            <div class="articleHeader">
                <div class="postInfo">
                    
                    {if $smartshowauthor ==1}
                        {l s='Posted by' mod='smartblog'} 
                        <span itemprop="author">
                            <i class="fa fa-user"></i> 
                            {if $smartshowauthorstyle != 0}
                                {$post.firstname} {$post.lastname}
                            {else}
                                {$post.lastname} {$post.firstname}
                            {/if}
                        </span>
                    {/if}
                    
                    <span itemprop="articleSection">
                    	<i class="fa fa-tags"></i>
                        <a href="{smartblog::GetSmartBlogLink('smartblog_category',$catlink)}">{if $title_category != ''}{$title_category}{else}{$post.cat_name}{/if}</a>
                    </span> 
                    
                    <span class="comment">
                        <i class="fa fa-comments"></i>
                        <a title="{$post.totalcomment} Comments" href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}#articleComments">{$post.totalcomment} {l s=' Comments' mod='smartblog'}</a>
                    </span>
                    
                    {if $smartshowviewed ==1}
                        <span class="views">
                            <i class="fa fa-eye"></i> {l s=' views' mod='smartblog'} ({$post.viewed})
                        </span>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>