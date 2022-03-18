@extends('layout')

@section('content')
	<div class="container px-4 mx-auto mt-10">
		<div class="flex -mx-4 flex-wrap justify-between">
			<div class="w-1/3 px-4">
				<form
					action="{{ URL::to('micrositios/search') }}"
					method="post"
					class="rounded p-9 bg-white-smoke shadow-sm ">
					@csrf
					<h4 class="text-primary text-center mb-3 font-bold">Ubica tu oficina</h4>


					<div class="relative bg-white mb-4 text-black border border-grey-200 rounded">
						<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
						<select name="state" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-2 pr-8 text-gray-400 text-sm focus:outline-none">
							<option class="bg-white text-black" selected hidden disabled>Estado</option>
							<option class="bg-white text-black" value="Aguascalientes">Aguascalientes</option>
							<option class="bg-white text-black" value="Baja California">Baja California</option>
							<option class="bg-white text-black" value="Baja California Sur">Baja California Sur</option>
							<option class="bg-white text-black" value="Campeche">Campeche</option>
							<option class="bg-white text-black" value="Chiapas">Chiapas</option>
							<option class="bg-white text-black" value="Chihuahua">Chihuahua</option>
							<option class="bg-white text-black" value="Ciudad de Mexico">Ciudad de México</option>
							<option class="bg-white text-black" value="Coahuila">Coahuila</option>
							<option class="bg-white text-black" value="Colima">Colima</option>
							<option class="bg-white text-black" value="Durango">Durango </option>
							<option class="bg-white text-black" value="Estado de Mexico">Estado de México</option>
							<option class="bg-white text-black" value="Guanajuato">Guanajuato</option>
							<option class="bg-white text-black" value="Guerrero">Guerrero</option>
							<option class="bg-white text-black" value="Hidalgo">Hidalgo</option>
							<option class="bg-white text-black" value="Jalisco">Jalisco</option>
							<option class="bg-white text-black" value="Michoacan">Michoacán</option>
							<option class="bg-white text-black" value="Morelos">Morelos</option>
							<option class="bg-white text-black" value="Nayarit">Nayarit</option>
							<option class="bg-white text-black" value="Nuevo Leon">Nuevo León</option>
							<option class="bg-white text-black" value="Oaxaca">Oaxaca</option>
							<option class="bg-white text-black" value="Puebla">Puebla</option>
							<option class="bg-white text-black" value="Queretaro">Querétaro</option>
							<option class="bg-white text-black" value="Quintana Roo">Quintana Roo</option>
							<option class="bg-white text-black" value="San Luis Potosi">San Luis Potosí</option>
							<option class="bg-white text-black" value="Sinaloa">Sinaloa</option>
							<option class="bg-white text-black" value="Sonora">Sonora</option>
							<option class="bg-white text-black" value="Tabasco">Tabasco</option>
							<option class="bg-white text-black" value="Tamaulipas">Tamaulipas</option>
							<option class="bg-white text-black" value="Tlaxcala">Tlaxcala</option>
							<option class="bg-white text-black" value="Veracruz">Veracruz</option>
							<option class="bg-white text-black" value="Yucatan">Yucatán</option>
							<option class="bg-white text-black" value="Zacatecas">Zacatecas</option>

						</select>
					</div>

					<div class="relative bg-white mb-4 text-black border border-grey-200 rounded">
						<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
						<select name="city" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-2 pr-8 text-gray-400 text-sm focus:outline-none">
							<option class="bg-white text-black" selected hidden disabled>Municipio</option>
						</select>
					</div>

					<div class="relative bg-white mb-4 text-black border border-grey-200 rounded">
						<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
						<select name="products" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-2 pr-8 text-gray-400 text-sm focus:outline-none">
							<option class="bg-white text-black" selected hidden disabled>Asesor&iacute;a</option>
							<optgroup label="Hipotecario">
								<option class="bg-white text-black" value="Asesoría Hipotecaria">Asesoría Hipotecaria</option>
								<option class="bg-white text-black" value="Adquisición de vivienda">Adquisición de vivienda</option>
								<option class="bg-white text-black" value="Construcción">Construcción</option>
								<option class="bg-white text-black" value="Cambio de hipoteca">Cambio de hipoteca</option>
								<option class="bg-white text-black" value="Adquisición de terreno">Adquisición de terreno</option>
								<option class="bg-white text-black" value="Terreno + Construcción">Terreno + Construcción</option>
								<option class="bg-white text-black" value="Preventa">Preventa</option>
								<option class="bg-white text-black" value="Liquidez">Liquidez</option>
								<option class="bg-white text-black" value="Liquidez + sustitución">Liquidez + sustitución</option>
							</optgroup>
							<optgroup label="Empresarial">
								<option class="bg-white text-black" value="Renovación / Remodelación">Renovación / Remodelación</option>
								<option class="bg-white text-black" value="Crédito Empresarial">Crédito Empresarial</option>
								<option class="bg-white text-black" value="Crédito como Anticipo">Crédito como Anticipo</option>
								<option class="bg-white text-black" value="Crédito Simple">Crédito Simple</option>
								<option class="bg-white text-black" value="Crédito Revolvente">Crédito Revolvente</option>
								<option class="bg-white text-black" value="Crédito Arrendamiento">Crédito Arrendamiento</option>
							</optgroup>
						</select>
					</div>

					<button type="submit" class="text-white bg-tertiary px-10 py-2 w-full rounded-md" >Buscar</button>
				</form>
			</div>
			<div class="w-7/12 px-4">
				<div id="map" class="block w-full h-96 shadow-md"></div>
			</div>
		</div>
	</div>
	@endsection

	@section('scripts')
	<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvMdD7Vk-i7OAI_ydRomgKQl5FplkhFY4&callback=initMap&v=weekly"
      async
    ></script>
	<script type="text/javascript" src="{{ URL::asset('js/states.js') }}"></script>
	<script type="text/javascript">
		let map;

        function initMap() {
	    	var locations = {!! $locations !!};
		  map = new google.maps.Map(document.getElementById("map"), {
		    zoom: 5,
		    center: new google.maps.LatLng(23.6260, -99.12766),
		  });
		  var infowindow = new google.maps.InfoWindow();

		    var marker, i;
		    
		    for (i = 0; i < locations.length; i++) {  
		      marker = new google.maps.Marker({
		        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
		        icon: "{{ URL::asset('img/favicon.png') }}",
		        map: map
		      });
		      
		      google.maps.event.addListener(marker, 'click', (function(marker, i) {
		        return function() {
		          infowindow.setContent(locations[i][0]);
		          infowindow.open(map, marker);
		        }
		      })(marker, i));
		    }
        }
        {{--
		$('form').submit(function(e) {
			e.preventDefault();
			$.ajax({
	            url: "{{ URL::to('micrositios/search') }}",
	            type: 'post',
	            data: $('form').serialize(),
			    beforeSend: function() {
			    	$('.loader').addClass('loading');
			    },
	            success: function (res) {
	            	if(res.length){
		            	var locations = [];
		            	for (a = 0; a < res.length; a++) {
		            		if(
		            			res[a]['lat'] !== '' && res[a]['lng'] !== '' &&
		            			res[a]['lat'] !== null && res[a]['lng'] !== null &&
		            			res[a]['lat'] !== '0' && res[a]['lng'] !== '0'
		            		){
			            		locations.push([
			            			res[a]['name'],
			            			res[a]['lat'],
			            			res[a]['lng'],
			            		]);
			            	}
		            	}

		            	console.log(locations);

		            	if(locations.length > 1){
						    x1 = '';
						    x2 = '';
						    y1 = '';
						    y2 = '';

						    for (i = 0; i < locations.length; i++) {
						    	if(x1 == '' || x1 > locations[i][1]){ x1 = locations[i][1]; }
						    	if(x2 == '' || x2 < locations[i][1]){ x2 = locations[i][1]; }
						    	if(y1 == '' || y1 > locations[i][2]){ y1 = locations[i][2]; }
						    	if(y2 == '' || y2 < locations[i][2]){ y2 = locations[i][2]; }
						    }
						    var lat = x1 + (x2-x1)/2;
						    var lng = y1 + (y2-y1)/2;
		            	} else{
		            		var lat = locations[0][1];
		            		var lng = locations[0][2];
		            	}


					  map = new google.maps.Map(document.getElementById("map"), {
					    //center: { lat: 19.716, lng: -99.147 },
					    zoom: 10,
					    center: new google.maps.LatLng(lat, lng),
					    // center: new google.maps.LatLng(-33.92, 151.25),
					    // mapTypeId: google.maps.MapTypeId.ROADMAP
					  });
	            	} else{
	            		alert('No hay resultados disponibles');
	            	}
	            },
			    error: function (x) {
			    	console.log(x);
			    }
			});
		});
		--}}
	</script>
	@endsection