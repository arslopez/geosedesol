<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/leaflet.css" />
		<link rel="stylesheet" href="css/Control.OSMGeocoder.css" />
		<link rel="stylesheet" href="css/L.Control.ZoomBar.css" type="text/css" />
		<link rel="stylesheet" href="css/leaflet-search.css" />

        <title>GEOPORTAL DE SEDESOL</title>
		<script src="js/leaflet.js"></script>
		<script src="js/Control.OSMGeocoder.js"></script>
		<script src="js/L.Control.ZoomBar.js" type="text/javascript" ></script>
		<script src="js/leaflet-search.js"></script>

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap-table.min.css">
		<style>
			 body {
				padding: 0;
				margin: 0;
			}
			html, body, #mapa {
				height: 100%;
				width: 100%;
			}
		</style>
	</head>
<body>
	<div class="row" style="border: 1px solid rgba(86,61,124,.2); height: 350px;">
            <div id="mapa" ></div>
    </div>
  	<script>
		
		var puntocentral=[14.060305,-87.26011];//y,x
		
		var map = L.map('mapa', {zoomControl: false}).setView(puntocentral, 13);
		
		var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
		
		/*var grupoMarcadores = new L.FeatureGroup;
		var personasPHP=JSON.parse('<?php echo $jsonpersonas;?>');
		//console.log(personasPHP);
		for(i=0;i<personasPHP.length;i++){
			var marcadorPHP = L.marker([personasPHP[i]['latitud'],personasPHP[i]['longitud']],{title: personasPHP[i]['nombre']});
			marcadorPHP.bindPopup(personasPHP[i]['nombre']);
			grupoMarcadores.addLayer(marcadorPHP);
			grupoMarcadores.addTo(map);
			}
		map.fitBounds(grupoMarcadores.getBounds());*/
			
		var buscarPersona = new L.Control.Search({
			url: 'buscar.php?q={s}',
			textPlaceholder: 'Persona...',
			position: 'topleft',
			hideMarkerOnCollapse: true,
			initial: true,
			marker: {
				icon: new L.Icon({iconUrl:'images/custom-icon.png', iconSize: [20,20]}),
				circle: {
					radius: 20,
					color: '#0a0',
					opacity: 1
					}
					},
			moveToLocation: function(latlng, title, map) {
				map.setView(latlng, 18);
				}
				});
				
		map.addControl(buscarPersona);
		
		var osmGeocoder = new L.Control.OSMGeocoder({
            collapsed: false,
			placeholder: 'Buscar direccion...',
            //position: 'bottomright',
            text: 'Buscar'
        });
		
		map.addControl(osmGeocoder);
		
		var barraZoom = new L.Control.ZoomBar({position: 'topleft'}).addTo(map);
		
		</script>
 </body>