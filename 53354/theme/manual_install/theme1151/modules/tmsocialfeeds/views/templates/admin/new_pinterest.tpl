<div class="soc-settings-block {$hook|escape:'html'}">
	<form method="post" action="" enctype="multipart/form-data" class="item-form defaultForm form-horizontal">
        <div class="well">
        	<div class="form-group">
                <label class="col-lg-3 control-label">{l s='Add block to position' mod='tmsocialfeed'}</label>
                <div class="col-lg-9">
                    <span class="switch prestashop-switch fixed-width-lg">
                        <input type="radio" name="{$type|escape:'html'}_{$hook|escape:'html'}" id="{$type|escape:'html'}_{$hook|escape:'html'}_on" value="1">
                        <label for="{$type|escape:'html'}_{$hook|escape:'html'}_on" class="radioCheck">
                            <i class="color_success"></i> {l s='Yes' mod='tmsocialfeed'}
                        </label>
                        <input type="radio" name="{$type|escape:'html'}_{$hook|escape:'html'}" id="{$type|escape:'html'}_{$hook|escape:'html'}_off" value="0" checked="checked">
                        <label for="{$type|escape:'html'}_{$hook|escape:'html'}_off" class="radioCheck">
                            <i class="color_danger"></i> {l s='No' mod='tmsocialfeed'}
                        </label>
                        <a class="slide-button btn"></a>
                    </span>
                </div>
            </div>
           <div class="selector item-field form-group">
                <label class="control-label col-lg-3">{l s='Sort order' mod='tmsocialfeed'}</label>
                <div class="col-lg-3">
                    <input type="text" name="sort_order" value="">
                </div>
            </div>
            <div class="item-field form-group">
                <label class="control-label col-lg-3">{l s='Widget width' mod='tmsocialfeed'}</label>
                <div class="col-lg-3">
                    <input type="text" name="item_width" value="">
                </div>
            </div>
            <div class="item-field form-group">
                <label class="control-label col-lg-3">{l s='Widget height' mod='tmsocialfeed'}</label>
                <div class="col-lg-3">
                    <input type="text" name="item_height" value="">
                </div>
            </div>
            <div class="item-field form-group">
                <label class="control-label col-lg-3">{l s='Widget column width' mod='tmsocialfeed'}</label>
                <div class="col-lg-3">
                    <input type="text" name="item_col_width" value="">
                </div>
            </div>
			<input type="hidden" name="feed_type" value="{$type|escape:'html'}" />
            <input type="hidden" name="id_shop" value="{$id_shop|escape:'intval'}" />
            <input type="hidden" name="hook" value="{$hook|escape:'html'}" />
            <div class="form-group">
                <div class="col-lg-7 col-lg-offset-3">
                    <button type="submit" name="newItem" class="button-new-item-save btn btn-success pull-right" onClick="this.form.submit();"><i class="icon-save"></i> {l s='Save' mod='tmsocialfeed'}</button>
                </div>
            </div>
        </div>
        
    </form>
</div>