<div id="homegooglemap" class="clearfix">    
	<div id="map"></div>
</div>

{strip}
    {addJsDef map=''}
    {addJsDef markers=array()}
    {addJsDef infoWindow=''}
    {addJsDef defaultLat=$defaultLat}
    {addJsDef defaultLong=$defaultLong}
    {addJsDef hasStoreIcon=$hasStoreIcon}
    {addJsDef img_store_dir=$img_store_dir}
    {addJsDef img_ps_dir=$img_ps_dir}
    {addJsDef searchUrl=$searchUrl}
    {addJsDef logo_store=$logo_store}
    {addJsDef map_type=$map_type}
    {addJsDef map_zoom=$map_zoom}
    {addJsDef map_scroll_zoom=$map_scroll_zoom}
    {addJsDef map_type_control=$map_type_control}
    {addJsDef map_street_view=$map_street_view}
    {addJsDefL name=translation_1}{l s='Phone:' mod='tmgooglemap'}{/addJsDefL}
    {addJsDefL name=translation_2}{l s='Get directions' mod='tmgooglemap'}{/addJsDefL}
{/strip}