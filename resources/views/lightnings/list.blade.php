<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ventas') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
        <a href="{{ route('sales.index') }}" class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            Regresar
        </a>
    </div>

    <div class="py-12 flex mx-24">
        <div class="p-3 rounded-lg shadow-lg bg-white h-auto">
            <form method="POST" action="{{route('lightning.search')}}" class="">
                @csrf
                <div class="">
                    <h2 class="text-2xl font-semibold text-indigo-600">Filtrar por:</h2>
                    <a href="{{ route('lightning.list') }}" class="mt-3 px-2 rounded-full bg-gray-950 text-white text-sm py-1 hover:bg-slate-800 transition ease">Ver todos los datos</a>
                    <h3 class="text-1xl mt-3 text-red-500">Marcas:</h3>
                    <select name="brand" id="" class="rounded-lg">
                        <option value="">Selecciona una marca</option>
                        @foreach ($light_brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-5">
                    <h3 class="text-1xl mt-3 text-red-500">Escribe el modelo:</h3>
                    <input type="text" name="model" class="px-4 py-2 rounded-lg w-full">
                </div>
                <button type="submit" class="px-3 py-2 rounded-lg w-full mt-3 text-center bg-blue-500 text-white font-semibold hover:bg-blue-800 transition ease">Buscar</button>
            </form>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg p-3">
                <div class="flex items-center justify-between">
                    <h2 class="text-3xl">Lista de Productos de iluminación</h2>
                    <div class="">
                        <a href="{{ route('lightning.create') }}" class="px-3 py-2 rounded-lg bg-blue-500 font-semibold text-white hover:bg-blue-700 transition ease">Crear una nueva iluminación</a>
                    </div>
                </div>
                <div class="my-5">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    {{-- th to image --}}
                                    <th scope="col" class="px-6 py-3">
                                        Imagen
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Marca
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Modelo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Año
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Version
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Precio
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Instalación
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Ver</span>
                                        <span class="sr-only">Editar</span>
                                        <span class="sr-only">Eliminar</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lights as $sale)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                             @if ($sale->image)
                                            <img src="{{ asset('storage/' . $sale->image) }}" alt="{{ $sale->name }}" class="w-20 h-20 object-contain ">
                                            @else
                                                <img src="{{ asset('images/noimage.jpg') }}"  class="h-20 w-32 object-cover ">
                                            @endif
                                        </td>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$sale->light->name}}
                                        </th>
                                        <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                            {{$sale->model}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                            {{$sale->model_year}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                            {{$sale->version}}
                                        </td>
                                        {{-- <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                           {{ $sale->type}}
                                        </td> --}}
                                        <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                           {{ $sale->price}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap dark:text-white flex flex-col gap-2">
                                           <a href="{{ route('lightning.images', $sale)}}" class="px-4 py-2 rounded-full bg-green-500 text-white font-semibold hover:bg-green-700 transition ease">Agregar imagenes</a>
                                           <a href="{{ route('lightning.instalation', $sale) }}" class="px-2 py-2 rounded-full bg-slate-900 text-white font-semibold hover:bg-blue-500 transition ease">Agregar instalación</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('lightning.show', $sale) }}">Ver</a>
                                            <a href="{{ route('lightning.edit', $sale) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                            <a href="{{ route('lightning.destroy', $sale)}}" class="text-red-600 hover:text-red-900" onclick="confirm('¿Estás seguro de eliminar esta venta?')">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">
                        {{ $lights->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
