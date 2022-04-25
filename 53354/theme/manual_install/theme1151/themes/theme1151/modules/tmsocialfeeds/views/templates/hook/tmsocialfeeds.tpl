{if $hook_content}
	
    <div class="socialfeedblock block {$hook_name} col-xs-12 col-sm-3">
    	{if $hook_name == 'home'}
        	<h4 class="title_block"><a href="#" class="tmsocials_button active">{l s='Folow Us' mod='tmsocialfeeds'}</a></h4>
		{elseif $hook_name == 'left_column' || $hook_name == 'right_column'}
        	<h4 class="title_block">{l s='Folow Us' mod='tmsocialfeeds'}</h4>
        {/if}
    	<div class="row hook_{$hook_name}{if $hook_name == 'left_column' || $hook_name == 'right_column'} block_content{/if}">
            {foreach from=$hook_content item=content name=myLoop}
            	<div class="item_{$smarty.foreach.myLoop.iteration}{if $content.hook == 'home'} col-md-6 col-lg-3 col-xs-12{else} col-xs-12{/if}">
                    {if $content.item_type == 'twitter' && $global_twitter}
                        <div class="twitter-socialfeed">
                            <script type="text/javascript" src="{$module_dir}js/widget.js"></script>
                        <a class="twitter-timeline"
                            href="https://twitter.com/twitterapi"
                            data-widget-id="{$global_twitter_id|escape:'html'}"
                              
                            {if isset($content.item_theme) && $content.item_theme}
                                data-theme="{$content.item_theme|escape:'html'}"
                            {/if}
                              
                            {if isset($content.item_width) && $content.item_width}
                                width="{$content.item_width|escape:'intval'}"
                            {/if}
                              
                            {if isset($content.item_height) && $content.item_height}
                                height="{$content.item_height|escape:'intval'}"
                            {/if}
                              
                            data-chrome="{if !$content.item_header}noheader{/if} {if !$content.item_footer}nofooter{/if} {if !$content.item_border}noborder{/if} {if !$content.item_scroll}noscrollbar{/if} {if !$content.item_background}transparent{/if}"
                            
                            
                            data-show-replies="{if $content.item_replies == 1}true{else}false{/if}"
                              
                            {if isset($content.item_limit) && $content.item_limit}
                                data-tweet-limit="{$content.item_limit|escape:'intval'}"
                            {/if}> </a>
                        </div>
                    {elseif $content.item_type == 'facebook' && $global_facebook}
                        <div class="facebook-socialfeed">
                            <script type="text/javascript" src="{$module_dir}js/facebook.js"></script>
                            <div id="fb-root"></div>
                            <div class="fb-like-box"
                                
                                data-href="{$global_facebook_id|escape:'html'}"
                                
                                {if isset($content.item_width) && $content.item_width}
                                    data-width="{$content.item_width|escape:'intval'}"
                                {/if}
                                
                                {if isset($content.item_height) && $content.item_height}
                                    data-height="{$content.item_height|escape:'intval'}"
                                {/if}
                                
                                {if isset($content.item_theme) && $content.item_theme} 
                                    data-colorscheme="{$content.item_theme|escape:'html'}"
                                {/if}
                                
                                data-show-faces="{if $content.item_replies == 1}true{else}false{/if}"
                                
                                data-header="{if $content.item_header}true{else}false{/if}"
                                
                                data-stream="{if $content.item_scroll}true{else}false{/if}"
                                
                                data-show-border="{if $content.item_border}true{else}false{/if}"
                            ></div>
                         </div>
                    {elseif $content.item_type == 'pinterest' && $global_pinterest}
                        <div class="pinterest-socialfeed">
                            <script type="text/javascript" src="{$module_dir}js/pinterest.js"></script>
                            <a 
                                data-pin-do="embedUser"
                               
                                href="{$global_pinterest_id|escape:'html'}"
                               
                                {if isset($content.item_col_width) && $content.item_col_width} 
                                    data-pin-scale-width="{$content.item_col_width|escape:'intval'}"
                                {/if}
                                
                                {if isset($content.item_height) && $content.item_height}
                                    data-pin-scale-height="{$content.item_height|escape:'intval'}"
                                {/if}
                                
                                {if isset($content.item_width) && $content.item_width}
                                    data-pin-board-width ="{$content.item_width|escape:'intval'}"
                                {/if}
                            ></a>
                         </div>
                    {elseif $content.item_type == 'instagram' && $global_instagram}
                        {if $content.item_limit && $content.item_limit !=''}{assign var="limit" value=$content.item_limit}{else}{assign var="limit" value=20}{/if}
                        
                        <script type="text/javascript" src="{$module_dir}js/instafeed.js"></script>
                        {if $global_instagram_type == 'tagged'}
                            <script type="text/javascript">
                                var feed = new Instafeed({
                                    get: 'tagged',
                                    target: 'instafeed_{$content.hook}',
                                    tagName: '{$global_instagram_tag}',
                                    clientId: '{$global_instagram_id}',
                                    limit:{$limit},
                                    sortBy: 'most-recent'
                                });
                                feed.run();
                            </script>
                        {else}
                            <script type="text/javascript">
                                var feed = new Instafeed({
                                    userId:{$global_instagram_userid},
                                    get: 'user',
                                    target: 'instafeed_{$content.hook}',
                                    clientId: '{$global_instagram_id}',
                                    accessToken: '{$global_instagram_token}',
                                    limit:{$limit},
                                    sortBy: 'most-recent'
                                });
                                feed.run();
                            </script>
                       {/if}
                        <div class="instagram-widget">
                            <a href="http://instagram.com/{if isset($global_instagram_username) && $global_instagram_username}{$global_instagram_username}{/if}" target="_blank" class="title">
                                <img 
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA+dpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSIgeG1wOkNyZWF0ZURhdGU9IjIwMTQtMDEtMjhUMjA6MDA6NTcrMDc6MDAiIHhtcDpNb2RpZnlEYXRlPSIyMDE0LTAxLTI4VDIwOjAxOjEyKzA3OjAwIiB4bXA6TWV0YWRhdGFEYXRlPSIyMDE0LTAxLTI4VDIwOjAxOjEyKzA3OjAwIiBkYzpmb3JtYXQ9ImltYWdlL3BuZyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0MzQ2MTUyRDg4MUMxMUUzOTlEODlEQUE1ODlCOUIyRSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo0MzQ2MTUyRTg4MUMxMUUzOTlEODlEQUE1ODlCOUIyRSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjpp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" 
                            class="icon" />
                                    <div class="text">{l s='Instagram' mod='tmsocialfeed'}</div>
                            </a>
                            <div id="instafeed_{$content.hook}" class="data"></div>
                        </div>
                    {/if}
            	</div>
            {/foreach}
        </div>
    </div>
{/if}