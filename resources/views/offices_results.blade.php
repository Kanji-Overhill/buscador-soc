@extends('layout')

@section('content')
	<section class="bg-white-smoke min-h-screen">
		<div class="py-10 bg-white">
			<div class="container px-4 mx-auto">
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
								@foreach ($states as $s => $state_name)

									<option class="bg-white text-black"  {{ !empty($state) && $state == $s ? 'selected' : ''}} value="{{ $s }}">{{ $state_name }}</option>
								@endforeach

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
									<option class="bg-white text-black" value="Hipotecario">Hipotecario</option>
									<option class="bg-white text-black" value="Empresarial">Empresarial</option>
									{{-- 
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
									--}}
								</select>
							</div>
						</div>
						<div class="relative px-2 md:w-1/4">
							<button type="submit" class="text-white bg-tertiary px-10 py-2 w-full rounded-md" >Buscar</button>
						</div>
					</form>
				
			</div>
		</div>
		<div class="container py-6 md:px-8 px-4 grid lg:grid-cols-4 md:grid-cols-2 gap-8 gap-4 mx-auto mb-6">
		@if (!empty($micrositios))
		
			@foreach($micrositios as $m => $micrositio)

			<div class="rounded-md {{ !empty($micrositio['certificacion']) && $micrositio['certificacion'] !== '0' ? 'border-2' : 'border' }} border-tertiary p-6 bg-white relative">
				@if(!empty($micrositio['certificacion']) && $micrositio['certificacion'] !== '0')
				<span class="absolute rounded-md inset-0 z-0 opacity-10 bg-tertiary"></span>
				@endif
				{{-- <h4 class="text-xl text-primary font-bold">{{ $micrositio['name'] }}</h4> --}}
				<div class="relative z-10">
					<figure class="md:w-auto w-4/5 flex">
						<img class="h-11 w-auto max-w-full object-contain mr-1 pl-1 border-l-px border-grey-200" src="{{ URL::asset('img/logo.png') }}" alt="{{ $micrositio['name'] }}" />
						<span class="w-px bg-gray-300 block mx-1 flex-none"></span>
						<span class="@php
							$l = strlen($micrositio['name']);
							if($l < 8){ echo 'text-2xl'; }
							elseif($l < 12){ echo 'text-xl'; }
							elseif($l < 18){ echo 'text-lg'; }
							elseif($l >= 18){ echo 'text-sm'; }
							@endphp
							self-center text-primary font-bold leading-none ml-1">
							{{ $micrositio['name'] }}
						</span>
					</figure>
					<figure class="text-center my-4">
						@if(!empty($micrositio['certificacion']) && $micrositio['certificacion'] != '0')
						<img src="{{ URL::asset('img/'.strtolower($micrositio['certificacion']).'.png') }}" alt="" class="block mx-auto h-3 w-auto max-w-full">
					@else
						<span class="h-3 block"></span>
					@endif	
					</figure>

					<span class="flex items-start mb-4 text-sm">
						<img src="{{ URL::asset('img/location@2x.png') }}" class="w-4 flex-none mr-2"> <span>{{ $micrositio['direccion'] }}</span>
					</span>
					<span class="flex items-start mb-4 text-sm">
						<img src="{{ URL::asset('img/Grupo-25@2x.png') }}" class="w-4 flex-none mr-2"> <span>{{ $micrositio['telefono'] }}</span>
					</span>
					<span class="flex items-start mb-4 text-sm">
						<img src="{{ URL::asset('img/vuesax-twotone-sms@2x.png') }}" class="w-4 flex-none mr-2"> <span>{{ $micrositio['email'] }}</span>
					</span>

					<div class="text-center">
						<a href="{{ config('constants.base_link').$micrositio['url'] }}" class="font-bold underline text-tertiary">Ver m&aacute;s</a>
					</div>
				</div>
			</div>
			@endforeach
			
		@else
			<div class="container mx-auto">
				<h4 class="mb-4">No se encontró ningún resultado</h4>
			</div>
		@endif

		</div>
	</section>
	@endsection

	@section('scripts')
	<script type="text/javascript" src="{{ URL::asset('js/states.js') }}"></script>
	@endsection