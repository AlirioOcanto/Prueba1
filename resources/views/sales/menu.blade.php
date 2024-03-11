<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ventas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-2">
            <div class="flex justify-between items-center">
                  <h1 class="text-2xl font-semibold">Agregar un producto a: </h1>
                 {{-- <a href="{{ route('sales.list') }}">Ver todas las ventas</a> --}}
            </div>
                <div class="grid md:grid-cols-6 md:gap-3 gap-5 my-3">
                    <div class="col-span-2 w-full flex flex-col gap-3">
                        <a href="{{ route('sales.create') }}" class="bg-green-500 w-full block hover:bg-green-700 text-white font-bold py-2 px-4 rounded col-span-2">Pantallas</a>
                        <a href="{{ route('sales.list') }}" class="text-sm block text-blue-500 font-semibold  transition ease">Ver todos los productos</a>
                    </div>
                    <div class="col-span-2 w-full flex flex-col gap-3">
                        <a href="{{ route('lightning.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded col-span-2">Iluminación</a>
                        <a href="{{ route('lightning.list') }}" class="text-sm block text-blue-500 font-semibold  transition ease">Ver todos las iluminaciones</a>

                    </div>
                    <div class="col-span-2 w-full flex flex-col gap-3">
                        <a href="{{ route('hydrography.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded col-span-2">Hidrografía</a>
                        <a href="{{ route('hydrography.list') }}" class="text-sm block text-blue-500 font-semibold  transition ease">Ver todos las imágenes</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
