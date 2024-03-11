<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ventas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg p-3">
                <div class="flex items-center justify-center">
                    <h2 class="text-3xl font-semibold">Crear un nueva Venta</h2>
                </div>
                <div class="my-5">
                    <div class="relative overflow-x-auto ">
                        <form action="{{ route('sales.update', $sale) }}" method="POST">
                            @method('PUT')
                            @csrf
                              <div class="grid grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label for="brand" class="block text-gray-700 text-sm font-bold mb-2">Marca:</label>
                                    {{-- apply input type select with option, the variable say $brands --}}
                                    <select name="brand_id" id="brand" class="form-input rounded-md shadow-sm mt-1 block w-full"  >
                                        <option value="">Seleccione una marca</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" @selected($sale->brand->name === $brand->name)  >{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- show error --}}
                                    @error('brand_id')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="model" class="block text-gray-700 text-sm font-bold mb-2">Modelo:</label>
                                    <input type="text" name="model" id="model" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('model', $sale->model) }}" />
                                    {{-- show error --}}
                                    @error('model')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="model_year" class="block text-gray-700 text-sm font-bold mb-2">Año:</label>
                                    <input type="text" name="model_year" id="model_year" value="{{ old('model_year', $sale->model_year) }}" class="form-input rounded-lg" />
                                    {{-- show error --}}
                                    @error('model_year')
                                        <span class="text-red-500 block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="version" class="block text-gray-700 text-sm font-bold mb-2">Version:</label>
                                    <input type="text" name="version" id="version" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('version', $sale->version) }}" />
                                    {{-- show error --}}
                                    @error('version')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio(*Campo Opcional):</label>
                                    <input type="text" name="price" id="price" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('price', $sale->price) }}" />
                                </div>
                                <div class="mb-4">
                                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagen: </label>
                                    <img src="{{ asset('storage/'.$sale->image) }}" alt="{{ $sale->name }}" class="w-20 h-20 object-contain">
                                    <input type="file"  name="image" id="image" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('image') }}" />
                                    {{-- show error --}}
                                    @error('image')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4 col-span-2">
                                    <label for="" class="block text-gray-700 text-sm font-bold mb-2">Descripción(*Campo Opcional):</label>
                                    <textarea name="description"  id="editor" cols="30" rows="10" class="p-4">{{ old("description", $sale->description) }}</textarea>
                                </div>
                                <div class="">
                                    <button type="submit" class="px-3 py-2 rounded-lg bg-yellow-500 font-semibold text-white hover:bg-yellow-700 transition ease">Editar</button>
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
