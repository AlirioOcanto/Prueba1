<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ventas') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
        <a href="{{ route('lightning.list') }}" class="flex items-center gap-2">
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
                    {{-- show image --}}
                    <div class="">
                        <img src="{{ asset('storage/' . $light->image) }}" class="w-40 h-40 object-contain mx-auto">
                    </div>
                    <h1 class="text-4xl text-orange-600 font-semibold text-center">{{ $light->name }}</h1>
                    <div class="flex items-center gap-3 justify-center my-5">
                        <h2 class="px-4 py-2 rounded-full border-2 border-blue-500 w-auto  text-normal font-semibold">Modelo: {{ $light->model }}</h2>
                        <h3 class="px-4 py-2 rounded-full border-2 border-blue-500 w-auto  text-normal font-semibold">Año: {{ $light->model_year }}</h3>
                        <h3 class="px-4 py-2 rounded-full border-2 border-blue-500 w-auto  text-normal font-semibold">Versión: {{ $light->version }}</h3>
                        <h3 class="px-4 py-2 rounded-full border-2 border-blue-500 w-auto  text-normal font-semibold">Precio: ${{ $light->price }}</h3>
                    </div>
                    <div class="">
                        <h2>Detalles:</h2>
                    </div>
                    <p>{!! $light->description !!}</p>
                </div>


                <div class="p-2 rounded-lg bg-white mt-5">
                    <div class="">
                        <div class="flex flex-col  justify-between">
                            @if ($light->detail)
                                <div class="flex items-center justify-between">
                                    <h2 class="text-3xl font-semibold text-blue-500">Instalación:</h2>
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('lightning.instalation.edit', $light) }}" class="px-2 py-1 rounded-full bg-yellow-500 hover:bg-yellow-950 transition ease text-white">Editar</a>
                                    <form action="{{ route('lightning.instalation.destroy', $light) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="px-2 py-1 rounded-full bg-red-500 hover:bg-red-950 transition ease text-white">Eliminar</button>
                                    </form>

                                    {{-- <a href="" class="px-2 py-1 rounded-full bg-red-500 hover:bg-red-950 transition ease text-white">Eliminar</a> --}}
                                </div>
                                </div>
                                <p>{!! $light->detail->description !!}</p>
                            @else
                                <h2 class="text-3xl font-semibold text-blue-500">No hay información de Instalación</h2>
                                <a href="{{ route('lightning.instalation', $light) }}" class="px-2 py-1 rounded-full bg-blue-500 hover:bg-blue-700 transition ease text-white text-sm">Agregar</a>
                            @endif

                        </div>
                    </div>
                    <div class="">
                        <h3 class="text-3xl font-semibold  mt-3">Imagénes:</h3>
                        <div class="grid grid-cols-6 gap-3 ">
                            @foreach ($light->photos as $image)
                                <div class="col-span-6 sm:col-span-3 md:col-span-2 lg:col-span-2">
                                    <img src="{{ asset('storage/' . $image->path) }}"  class="w-full h-60 object-contain">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
