@extends('layout')

@section('content')
	<div class="container px-4 mx-auto mt-10">
			<h4 class="text-primary mb-3 font-bold">Ubica tu oficina</h4>
			<form
				action="{{ URL::to('micrositios/search') }}"
				method="post"
				class="md:flex items-center">
				@csrf

				<div class="relative px-2 md:w-1/4">
					<div class="relative bg-white md:mb-0 mb-4 text-black border border-grey-200 rounded">
						<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
						<select name="state" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-2 pr-8 text-gray-400 text-sm focus:outline-none">
							<option class="bg-white text-black" {{ empty($state) ? 'selected' : ''}} hidden disabled>Estado</option>
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
				</div>

				<div class="relative px-2 md:w-1/4">
					<div class="relative bg-white md:mb-0 mb-4 text-black border border-grey-200 rounded">
						<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
						<select name="city" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-2 pr-8 text-gray-400 text-sm focus:outline-none">
							<option class="bg-white text-black" {{ empty($municipio) ? 'selected' : ''}} hidden disabled>Municipio</option>
						</select>
					</div>
				</div>
				<div class="relative px-2 md:w-1/4">
					<div class="relative bg-white md:mb-0 mb-4 text-black border border-grey-200 rounded">
						<span class="absolute z-0 w-8 inset-y-0 flex items-center justify-center right-0 text-gray-400"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
						<select name="products" class="relative z-10 bg-transparent appearance-none w-full h-10 pl-2 pr-8 text-gray-400 text-sm focus:outline-none">
							<option class="bg-white text-black" {{ empty($products) ? 'selected' : ''}} hidden disabled>Asesor&iacute;a</option>
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
				</div>
				<div class="relative px-2 md:w-1/4">
					<button type="submit" class="text-white bg-tertiary px-10 py-2 w-full rounded-md" >Buscar</button>
				</div>
			</form>
		
	</div>
	<section class="bg-white-smoke">
		<div class="container py-6 grid grid-cols-3 gap-8 mx-auto mt-10 mb-6 max-w-4xl">
			@foreach($micrositios as $m => $micrositio)

			<div class="border-2 rounded-md border-tertiary p-6 bg-white">
				<h4 class="text-xl text-primary font-bold">{{ $micrositio['name'] }}</h4>
				<span class="block">Asesor Hipotecario</span>

				<span>
					<i class="fa fa-map-marker-alt"></i> <span>{{ $micrositio['direccion'] }}</span>
				</span>

				<div class="text-center">
					<a href="{{ $micrositio['url'] }}" class="font-bold underline text-tertiary">Ver m&aacute;s</a>
				</div>
			</div>
			@endforeach

		</div>
	</section>
	@endsection