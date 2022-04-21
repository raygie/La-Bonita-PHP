{capture name=path}
	<a href="{$link->getPageLink('authentication', true)|escape:'html':'UTF-8'}" title="{l s='Authentication'}" rel="nofollow">
    	{l s='Authentication'}
    </a>
    <span class="navigation-pipe">{$navigationPipe}</span>
    {l s='Forgot your password'}
{/capture}

<div class="box">
	<h1 class="page-subheading">{l s='Forgot your password?'}</h1>

	{include file="$tpl_dir./errors.tpl"}

	{if isset($confirmation) && $confirmation == 1}
		<p class="alert alert-success">{l s='Your password has been successfully reset and a confirmation has been sent to your email address:'} {if isset($customer_email)}{$customer_email|escape:'html':'UTF-8'|stripslashes}{/if}	</p>
	{elseif isset($confirmation) && $confirmation == 2}
		<p class="alert alert-success">{l s='A confirmation email has been sent to your address:'} {if isset($customer_email)}{$customer_email|escape:'html':'UTF-8'|stripslashes}{/if}</p>
	{else}
		<p>{l s='Please enter the email address you used to register. We will then send you a new password. '}</p>
        <form action="{$request_uri|escape:'html':'UTF-8'}" method="post" class="std" id="form_forgotpassword">
            <fieldset>
                <div class="form-group">
                    <label for="email">{l s='Email address'}</label>
                    <input class="form-control" type="text" id="email" name="email" value="{if isset($smarty.post.email)}{$smarty.post.email|escape:'html':'UTF-8'|stripslashes}{/if}" />
                </div>
                <p class="submit">
                    <button type="submit" class="btn btn-default btn-md icon-right"><span>{l s='Retrieve Password'}</span></button>
                </p>
            </fieldset>
        </form>
	{/if}
</div>

<ul class="clearfix footer_links">
	<li>
    	<a class="btn btn-default btn-sm icon-left" href="{$link->getPageLink('authentication')|escape:'html':'UTF-8'}" title="{l s='Back to Login'}" rel="nofollow">
        	<span>
                {l s='Back to Login'}
            </span>
        </a>
    </li>
</ul>
