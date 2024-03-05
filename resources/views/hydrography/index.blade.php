<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hydrografía') }}
        </h2>
    </x-slot>
    {{-- show flash message success --}}
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5 flex items-center justify-between">
        <a href="{{ route('sales.index') }}" class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            Regresar
        </a>
        <a href="{{ route('hydrography.public') }}" target="_blank">Ir a la página pública</a>
    </div>

    <div class="py-12 mx-24">
        <div class="grid grid-cols-12 gap-3">
            @foreach ($hidrographies as $hidrography)
                <div class="col-span-4">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-56 object-cover object-center" src="{{ asset('storage/' . $hidrography->image) }}" alt="avatar">
                        <div class="p-4">
                            <h3 class="font-semibold text-lg">{{ $hidrography->type }}</h3>
                            <p class="text-gray-500">{{ $hidrography->created_at->diffForHumans() }}</p>
                            <a href="{{ route('hydrography.edit', $hidrography) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                            <form action="{{ route('hydrography.destroy', $hidrography) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
