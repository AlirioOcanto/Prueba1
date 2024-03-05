<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ventas') }}
        </h2>
    </x-slot>
    {{-- show message flash success --}}
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="mx-auto container max-w-7xl my-5 sm:px-6 lg:px-8 ">
        <a href="{{ route('lightBrand.list') }}" class="text-blue-500 font-semibold">Ver todas las marcas de iluminación</a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg p-3">
                <div class="flex items-center justify-center">
                    <h2 class="text-3xl font-semibold">Crear un nueva Marca de Iluminación</h2>
                </div>
                <div class="my-5">
                    <div class="relative overflow-x-auto ">
                        <form action="{{ route('lightBrand.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-col items-center gap-4">
                                <div class="mb-4 w-1/2">
                                    <label for="brand" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la Marca:</label>
                                    <input type="text" name="name" id="brand" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name') }}" />
                                    {{-- show error --}}
                                    @error('name')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="">
                                    <button type="submit" class="px-3 py-2 rounded-lg bg-blue-500 font-semibold text-white hover:bg-blue-700 transition ease">Crear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
