{*define numbers of product per line in other page for desktop*}
{if ($hide_left_column || $hide_right_column) && ($hide_left_column !='true' || $hide_right_column !='true')}     {* left or right column *}
	{assign var='nbItemsPerLine' value=3}
    {assign var='nbItemsPerLineTablet' value=2}
    {assign var='nbItemsPerLineMobile' value=2}
{elseif ($hide_left_column && $hide_right_column) && ($hide_left_column =='true' && $hide_right_column =='true')} {* no columns *}
	{assign var='nbItemsPerLine' value=4}
    {assign var='nbItemsPerLineTablet' value=3}
    {assign var='nbItemsPerLineMobile' value=2}
{else}																											  {* left and right column *}
	{assign var='nbItemsPerLine' value=2}
    {assign var='nbItemsPerLineTablet' value=1}
    {assign var='nbItemsPerLineMobile' value=2}
{/if}

{*define numbers of product per line in other page for tablet*}

{assign var='nbLi' value=$view_data|@count}
{math equation="nbLi/nbItemsPerLine" nbLi=$nbLi nbItemsPerLine=$nbItemsPerLine assign=nbLines}
{math equation="nbLi/nbItemsPerLineTablet" nbLi=$nbLi nbItemsPerLineTablet=$nbItemsPerLineTablet assign=nbLinesTablet}

<section id="homepage-blog" class="block">
    <h4 class='title_block'><a href="{smartblog::GetSmartBlogLink('smartblog')}">{l s='Latest News' mod='smartbloghomelatestnews'}</a></h4>
    <div class="block_content">
        <ul class="row">
          {if isset($view_data) AND !empty($view_data)}
              {foreach from=$view_data item=post name=post}
                  {math equation="(total%perLine)" total=$smarty.foreach.post.total perLine=$nbItemsPerLine assign=totModulo}
                  {math equation="(total%perLineT)" total=$smarty.foreach.post.total perLineT=$nbItemsPerLineTablet assign=totModuloTablet}
                  {math equation="(total%perLineT)" total=$smarty.foreach.post.total perLineT=$nbItemsPerLineMobile assign=totModuloMobile}
                  {if $totModulo == 0}{assign var='totModulo' value=$nbItemsPerLine}{/if}
                  {if $totModuloTablet == 0}{assign var='totModuloTablet' value=$nbItemsPerLineTablet}{/if}
                  {if $totModuloMobile == 0}{assign var='totModuloMobile' value=$nbItemsPerLineMobile}{/if}
                  {$options.id_post = $post.id}
                  {$options.slug = $post.link_rewrite}
                  <li class="col-xs-12 col-sm-{12/$nbItemsPerLineTablet} col-md-{12/$nbItemsPerLine}{if $smarty.foreach.post.iteration%$nbItemsPerLine == 0} last-in-line{elseif $smarty.foreach.post.iteration%$nbItemsPerLine == 1} first-in-line{/if}{if $smarty.foreach.post.iteration > ($smarty.foreach.post.total - $totModulo)} last-line{/if}{if $smarty.foreach.post.iteration%$nbItemsPerLineTablet == 0} last-item-of-tablet-line{elseif $smarty.foreach.post.iteration%$nbItemsPerLineTablet == 1} first-item-of-tablet-line{/if}{if $smarty.foreach.post.iteration%$nbItemsPerLineMobile == 0} last-item-of-mobile-line{elseif $smarty.foreach.post.iteration%$nbItemsPerLineMobile == 1} first-item-of-mobile-line{/if}{if $smarty.foreach.post.iteration > ($smarty.foreach.post.total - $totModuloMobile)} last-mobile-line{/if}">
                      <div class="blog-image">
                          <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}"><img alt="{$post.title}" class="img-responsive" src="{$modules_dir}smartblog/images/{$post.post_img}-home-default.jpg"></a>
                      </div>
                      <p class="date-added">{$post.date_added}</p>
                      <h5><a class="product-name" href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}">{$post.title}</a></h5>
                      <p class="post-descr">
                          {$post.short_description|escape:'htmlall':'UTF-8'}
                      </p>
                      <a href="{smartblog::GetSmartBlogLink('smartblog_post',$options)}"  class="btn btn-default btn-sm icon-right"><span>{l s='Read More' mod='smartbloghomelatestnews'}</span></a>
                  </li>
              {/foreach}
          {/if}
        </ul>
    </div>
</section>