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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg p-3">
                <div class="flex items-center justify-center">
                    <h2 class="text-3xl font-semibold">Editar una Agenda de Pantalla a un Usuario</h2>
                </div>
                <div class="my-5">
                    <div class="relative overflow-x-auto ">
                        <form action="{{ route('calendar.screens.store') }}" method="POST" >
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div class="mb-4">
                                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Título Breve:</label>
                                    <input type="text" name="title" id="title" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('title') }}" placeholder="Instalación de xxx en Maryland" />
                                    {{-- show error --}}
                                    @error('title')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="day" class="block text-gray-700 text-sm font-bold mb-2">Fecha:</label>
                                    <input type="date" name="day" id="day" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('day') }}" />
                                    {{-- show error --}}
                                    @error('day')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="user_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Cliente:</label>
                                    <input type="text" name="user_name" id="user_name" class="form-input rounded-lg" />
                                    {{-- show error --}}
                                    @error('user_name')
                                        <span class="text-red-500 block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="user_email" class="block text-gray-700 text-sm font-bold mb-2">Email del cliente:</label>
                                    <input type="text" name="user_email" id="user_email" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('user_email') }}" />
                                    {{-- show error --}}
                                    @error('user_email')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="mb-4 col-span-2">
                                    <label for="user_phone" class="block text-gray-700 text-sm font-bold mb-2">Número del Ciente:</label>
                                    <input type="text" name="user_phone"  id="user_phone" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('user_phone') }}" />
                                    {{-- show error --}}
                                    @error('user_phone')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4 col-span-2">
                                    <label for="user_address" class="block text-gray-700 text-sm font-bold mb-2">Dirección del Ciente:</label>
                                    <input type="text" name="user_address"  id="user_address" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('user_address') }}" />
                                    {{-- show error --}}
                                    @error('user_address')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- illuminations_id --}}
                                 <div class="mb-4">
                                    <label for="brand" class="block text-gray-700 text-sm font-bold mb-2">Seleccionar el producto:</label>
                                    {{-- apply input type select with option, the variable say $brands --}}
                                    <select name="sales_id" id="brand" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                        <option value="">Seleccione una marca</option>
                                        @foreach ($products as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand->name }} - {{ $brand->model }}</option>
                                        @endforeach
                                    </select>
                                    {{-- show error --}}
                                    @error('sales_id')
                                        <span class="text-red-500">{{ $message  }}</span>
                                    @enderror
                                </div>

                                {{-- create select to status with select-option --}}
                                <div class="mb-4">
                                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                                    <select name="status" id="status" class="form-input rounded-md shadow-sm mt-1 block w-full">
                                        <option value="" disabled>Seleccione un estado</option>
                                        <option value="pending">Pendiente</option>
                                        <option value="completed">Completado</option>
                                    </select>
                                    {{-- show error --}}
                                    @error('status')
                                        <span class="text-red-500">{{ $message  }}</span>
                                    @enderror
                                </div>

                                {{-- create input type text to billing --}}
                                <div class="mb-4">
                                    <label for="billing" class="block text-gray-700 text-sm font-bold mb-2">Facturación($):</label>
                                    <input type="text" placeholder="$100.00" name="billing" id="billing" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('billing') }}" />
                                    {{-- show error --}}
                                    @error('billing')
                                        <span class="text-red-500">{{ $message  }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4 col-span-2">
                                    <label for="" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                                    <textarea name="description"  id="editor" cols="30" rows="10" class="p-4">{{ old("description") }}</textarea>
                                </div>
                                <div class="">
                                    <button type="submit" class="px-3 py-2 rounded-lg bg-blue-500 font-semibold text-white hover:bg-blue-700 transition ease">Agendar</button>
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
