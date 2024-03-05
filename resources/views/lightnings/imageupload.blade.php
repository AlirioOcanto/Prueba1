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
                <div class="flex items-center justify-between">

                    <h2 class="text-3xl">Agregar image a {{ $light->name }} - {{ $light->model }}</h2>
                    {{-- <div class="">
                        <a href="{{ route('sales.list') }}" class="px-3 py-2 rounded-lg bg-blue-500 font-semibold text-white hover:bg-blue-700 transition ease">Regresar</a>
                    </div> --}}
                </div>
                <form class="my-5" action="{{ route('lightning.images.upload', $light) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload file</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="image">
                    {{-- show error message --}}
                    @error('image')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="px-4 py-2 mt-3 rounded-lg bg-blue-500 text-white font-semibold hover:bg-blue-700 transition ease">Crear</button>
                </form>
                <div class="my-5">
                    @if ($light->photos->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($light->photos as $image)
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $image->path) }}"  class="w-full h-40 object-cover rounded-lg">
                                    <div class="flex justify-center">
                                        <form action="{{ route('lightning.images.destroy', ['light' => $light, 'photo' => $image ]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 py-2 text-sm mt-3 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-700 transition ease">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-500 dark:text-gray-400">No hay imagenes para mostrar</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
