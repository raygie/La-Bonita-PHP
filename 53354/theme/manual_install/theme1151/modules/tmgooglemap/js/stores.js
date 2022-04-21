$(document).ready(function(){
    var isDraggable = $(window).width() > 1023 ? true : false;
    var isPan = $(window).width() < 1024 ? true : false;
	map = new google.maps.Map(document.getElementById('map'), {
		center: new google.maps.LatLng(defaultLat, defaultLong),
		zoom: map_zoom,
		mapTypeId: map_type,
		scrollwheel: map_scroll_zoom,
		mapTypeControl: map_type_control,
		streetViewControl: map_street_view,
        draggable:isDraggable,
        panControl: isPan,
		mapTypeControlOptions: {
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
		},
		styles: google_map_style
	});
	
		infoWindow = new google.maps.InfoWindow();
	
		initMarkers();
});

function initMarkers()
{
	searchUrl += '?ajax=1&all=1';
	downloadUrl(searchUrl, function(data) {
		var xml = parseXml(data);
		var markerNodes = xml.documentElement.getElementsByTagName('marker');
		for (var i = 0; i < markerNodes.length; i++)
		{
			var name = markerNodes[i].getAttribute('name');
			var address = markerNodes[i].getAttribute('address');
			var addressNoHtml = markerNodes[i].getAttribute('addressNoHtml');
			var other = markerNodes[i].getAttribute('other');
			var id_store = markerNodes[i].getAttribute('id_store');
			var has_store_picture = markerNodes[i].getAttribute('has_store_picture');
			var latlng = new google.maps.LatLng(
			parseFloat(markerNodes[i].getAttribute('lat')),
			parseFloat(markerNodes[i].getAttribute('lng')));
		
			createMarker(latlng, name, address, other, id_store, has_store_picture);
		}

		var zoomOverride = map.getZoom();
		if(zoomOverride > map_zoom)
			zoomOverride = map_zoom;
		map.setZoom(zoomOverride);
	});
}

function createMarker(latlng, name, address, other, id_store, has_store_picture)
{
	var html = '<div class="marker_content"><div class="clearfix">'+(has_store_picture == 1 ? '<img class="marker_logo" src="'+img_store_dir+parseInt(id_store)+'.jpg" alt="" />' : '')+'<div class="description"><b>'+name+'</b>'+address+'</div></div>'+other+'<a href="//maps.google.com/maps?saddr=&daddr='+latlng+'" target="_blank">'+translation_2+'<\/a></div>';

	var image = new google.maps.MarkerImage(img_ps_dir+logo_store);
	var marker = '';

	marker = new google.maps.Marker({ map: map, position: latlng, icon: image, title: name });
	google.maps.event.addListener(marker, 'click', function() {
		infoWindow.setContent(html);
		infoWindow.open(map, marker);
	});
	markers.push(marker);
}

function downloadUrl(url, callback)
{
	var request = window.ActiveXObject ?
	new ActiveXObject('Microsoft.XMLHTTP') :
	new XMLHttpRequest();

	request.onreadystatechange = function() {
		if (request.readyState === 4) {
			request.onreadystatechange = doNothing;
			callback(request.responseText, request.status);
		}
	};

	request.open('GET', url, true);
	request.send(null);
}

function parseXml(str)
{
	if (window.ActiveXObject)
	{
		var doc = new ActiveXObject('Microsoft.XMLDOM');
		doc.loadXML(str);
		return doc;
	}
	else if (window.DOMParser)
		return (new DOMParser()).parseFromString(str, 'text/xml');
}

function doNothing(){}