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
                    <h2 class="text-3xl font-semibold">Agregar Instalación para: <span class="text-4xl text-blue-500">{{$illumination->name}} - {{ $illumination->model }}</span> </h2>
                </div>
                <div class="my-5">
                    <div class="relative overflow-x-auto ">
                        <form action="{{ route('lightning.instalation.store', $illumination) }}" method="POST" >
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-4 col-span-2">
                                    <label for="" class="block text-gray-700 text-sm font-bold mb-2">Descripción(*Campo Opcional):</label>
                                    <textarea name="description"  id="editor" cols="30" rows="10" class="p-4">{{ old("description") }}</textarea>
                                    @error('description')
                                        <div class="bg-red-100 border-l-4 mt-2 border-red-500 text-red-700 p-4" role="alert">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <div class="">
                                    <button type="submit" class="px-3 py-2 rounded-lg bg-blue-500 font-semibold text-white hover:bg-blue-700 transition ease">Crear una venta</button>
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
