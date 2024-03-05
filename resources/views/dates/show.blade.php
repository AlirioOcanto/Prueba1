<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Información de la Agenda') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
        <a href="{{ route('calendar.index') }}" class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            Regresar
        </a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden  sm:rounded-lg p-3">
                <div class="my-5">
                    <h1 class="text-4xl text-orange-600 font-semibold text-center">{{ $calendar->title }}</h1>
                    {{-- <div class="flex items-center gap-3 justify-center my-5">
                        <h2 class="px-4 py-2 rounded-full border-2 border-blue-500 w-auto  text-normal font-semibold">Modelo: {{ $sale->model }}</h2>
                        <h3 class="px-4 py-2 rounded-full border-2 border-blue-500 w-auto  text-normal font-semibold">Año: {{ $sale->model_year }}</h3>
                        <h3 class="px-4 py-2 rounded-full border-2 border-blue-500 w-auto  text-normal font-semibold">Versión: {{ $sale->version }}</h3>
                        <h3 class="px-4 py-2 rounded-full border-2 border-blue-500 w-auto  text-normal font-semibold">Precio: ${{ $sale->price }}</h3>
                    </div> --}}
                    <div class="mb-4 flex flex-col justify-center items-center mt-5">
                        <h1 class="text-2xl">Información del Cliente</h1>
                        <h2 class="text-1xl font-semibold">Nombres: {{ $calendar->user_name }}</h2>
                        <h2 class="text-1xl font-semibold">Email: {{ $calendar->user_email }}</h2>
                        <h2 class="text-1xl font-semibold">Fecha: {{  \Carbon\Carbon::parse($calendar->day)->format('d-m-Y') }}</h2>
                        <h2 class="text-1xl font-semibold">Dirección: {{  $calendar->user_address }}</h2>
                        <h2 class="text-1xl font-semibold">Número telefónico: {{ $calendar->user_phone }}</h2>
                        {{-- create h2 tag to status and billing --}}
                        <h2 class="text-1xl font-semibold">Estado: {{ $calendar->status }}</h2>
                        <h2 class="text-1xl font-semibold text-blue-500">Facturación: ${{ $calendar->billing }}</h2>
                    </div>
                    {{-- <div class="">
                        <h2>Detalles:</h2>
                    </div>
                    <p>{!! $calendar->description !!}</p> --}}
                </div>
                <div class="">
                    <div class="">
                        {{-- <h2 class="text-2xl font-semibold text-center">Información del producto requerido</h2> --}}
                        <div class="flex justify-center my-10 mt-5 mb-5">
                            {{-- @if ($calendar->sales->image)
                                <img src="{{ asset('storage/' . $calendar->sales->image) }}" alt="{{ $calendar->sales->model }}" class="block w-64 h-40" />
                            @else
                                <img src="{{ asset('images/noimage.jpg') }}" alt="{{ $calendar->sales->model }}" class="block w-48 h-40" />
                            @endif --}}
                        </div>
                        <div class="flex justify-center gap-4 mt-5">
                            {{-- <h2 class="text-1xl font-semibold text-blue-400">Modelo: {{ $calendar->sales->model }}</h2>
                            <h2 class="text-1xl font-semibold text-blue-400">Año: {{ $calendar->sales->model_year }}</h2>
                            <h2 class="text-1xl font-semibold text-blue-400">Versión: {{ $calendar->sales->version }}</h2>
                            <h2 class="text-1xl font-semibold text-blue-400">Precio: ${{ $calendar->sales->price }}</h2> --}}
                        </div>
                        <div class="">
                            {{-- <p>{!! $calendar->sales->description !!}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
