<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ventas') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
        <a href="{{ route('sales.list') }}" class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            Regresar
        </a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg p-3">
                <div class="my-5">
                    <h1 class="text-4xl text-orange-600 font-semibold text-center">{{ $sale->brand->name }}</h1>
                    <div class="flex items-center gap-3 justify-center my-5">
                        <h2 class="px-4 py-2 rounded-full border-2 border-blue-500 w-auto  text-normal font-semibold">Modelo: {{ $sale->model }}</h2>
                        <h3 class="px-4 py-2 rounded-full border-2 border-blue-500 w-auto  text-normal font-semibold">Año: {{ $sale->model_year }}</h3>
                        <h3 class="px-4 py-2 rounded-full border-2 border-blue-500 w-auto  text-normal font-semibold">Versión: {{ $sale->version }}</h3>
                        <h3 class="px-4 py-2 rounded-full border-2 border-blue-500 w-auto  text-normal font-semibold">Precio: ${{ $sale->price }}</h3>
                    </div>
                    <div class="">
                        <h2 class="text-2xl text-blue-500">Descripción:</h2>
                    </div>
                    <p>{!! $sale->description !!}</p>
                </div>

                {{-- show if $sale->instalation->description is not null --}}
                @if ($sale->instalation)
                    <div class="">
                    <div class="flex items-center justify-between pb-3">
                        <h2 class="text-2xl text-blue-500">Instalación</h2>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('sales.instalation.edit', $sale) }}" class="px-2 py-1 rounded-full text-white bg-yellow-500 hover:bg-yellow-700 transition eaflex items-center gap-2se">Editar Instalación</a>

                            <form action="{{ route('sales.instalation.destroy',$sale) }}"  method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar Instalación" class="px-2 cursor-pointer py-1 rounded-full text-white bg-red-500 hover:bg-red-700 transition ease " />
                            </form>

                            {{-- <a href="" class="px-2 py-1 rounded-full text-white bg-red-500 hover:bg-red-700 transition ease">Eliminar Instalación</a> --}}
                        </div>
                    </div>
                    {!! $sale->instalation->description !!}
                </div>
                 <div class="mt-10">
                    <div class="grid grid-cols-6 gap-3">
                        @foreach ($sale->images as $image)
                            <div class="col-span-6 sm:col-span-3 md:col-span-2 lg:col-span-2">
                                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $sale->brand->name }}" class="w-full h-60 object-cover">
                            </div>
                        @endforeach
                    </div>
                </div>
                @else()
                    <div class="mt-10">
                        <h2 class="text-2xl text-blue-500">No hay contenido de instalación</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
