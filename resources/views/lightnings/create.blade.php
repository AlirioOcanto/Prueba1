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
                <div class="flex items-center justify-center">
                    <h2 class="text-3xl font-semibold">Crear un nuevo producto de Iluminación</h2>
                </div>
                <div class="">
                    {{-- show all errors message by validate --}}

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Algo salió mal!</strong>
                            <span class="block sm:inline">Revisa los campos del formulario.</span>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-sm">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="my-5">
                    <div class="relative overflow-x-auto ">
                        <form action="{{ route('lightning.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                  <div class="mb-4">
                                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                                    <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name') }}" />
                                    {{-- show error --}}
                                    @error('name')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="brand" class="block text-gray-700 text-sm font-bold mb-2">Marca:</label>
                                    {{-- apply input type select with option, the variable say $brands --}}
                                    <select name="light_id" id="brand" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                        <option value="">Seleccione una marca</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ old("brand_id", $brand->name) }}</option>
                                        @endforeach
                                    </select>
                                    {{-- show error --}}
                                    @error('light_id')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="model" class="block text-gray-700 text-sm font-bold mb-2">Modelo:</label>
                                    <input type="text" name="model" id="model" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('model') }}" />
                                    {{-- show error --}}
                                    @error('model')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="model_year" class="block text-gray-700 text-sm font-bold mb-2">Año:</label>
                                    {{-- create a input type select with years from 1985 to now --}}
                                    <select name="model_year" id="model_year" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                        <option value="" disabled>Seleccione un año</option>
                                        @for ($i = date('Y'); $i >= 1985; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>



                                    {{-- <input type="text" name="model_year" id="model_year" class="form-input rounded-lg" /> --}}
                                    {{-- show error --}}
                                    @error('model_year')
                                        <span class="text-red-500 block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="version" class="block text-gray-700 text-sm font-bold mb-2">Version:</label>
                                    <input type="text" name="version" id="version" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('version') }}" />
                                    {{-- show error --}}
                                    @error('version')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio(*Campo Opcional):</label>
                                    <input type="text" name="price" id="price" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('price') }}" />
                                </div>
                                <div class="mb-4">
                                    <label for="brandsAuto" class="block text-gray-700 text-sm font-bold mb-2">Marca de auto compatible:</label>
                                    {{-- apply input type select with option, the variable say $brands --}}
                                    <select name="brand_id" id="brandsAuto" class="form-input text-gray-800 rounded-md shadow-sm mt-1 block w-full">
                                        <option value="">Seleccione una marca</option>
                                        @foreach ($brandsAuto as $brand)
                                            <option value="{{ $brand->id }}" class="text-gray-800">{{ old("brand_id", $brand->name) }}</option>
                                        @endforeach
                                    </select>
                                    {{-- show error --}}
                                    @error('brand_id')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
                                    <input type="file"  name="image" id="image" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('image') }}" />
                                    {{-- show error --}}
                                    @error('image')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4 col-span-2">
                                    <label for="" class="block text-gray-700 text-sm font-bold mb-2">Descripción(*Campo Opcional):</label>
                                    <textarea name="description"  id="editor" cols="30" rows="10" class="p-4">{{ old("description") }}</textarea>
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
        <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</x-app-layout>
