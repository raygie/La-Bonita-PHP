{if isset($latesComments) AND !empty($latesComments)}
    <section id="latestComments" class="block">
        <h4 class='title_block'>{l s='Latest Comments' mod='smartbloglatestcomments'}</h4>
        <div class="block_content products-block">
            <ul>
                {foreach from=$latesComments item="comment" name=comments}
                    {assign var="options" value=null}
                    {$options.id_post= $comment.id_post}
                    {$options.slug= $comment.slug}
                    <li class="clearfix{if $smarty.foreach.comments.last} last_item{elseif $smarty.foreach.comments.first} first_item{else}{/if}">
                    	<a class="products-block-image" title="" href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">
                    		<img alt="Avatar" src="{$modules_dir}/smartblog/images/avatar/avatar-author-default.jpg">
                        </a>
                        <div class="product-content">
                            {$comment.name} <strong>{l s='on' mod='smartbloglatestcomments'}</strong>
                            <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">{$comment.content}</a>
                        </div>
                    </li>
                {/foreach}
            </ul>
        </div>
    </section>
{/if}