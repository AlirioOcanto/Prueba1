<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agenda - Lista de Clientes - Instalación de Pantallas') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
        <a href="{{ route('calendar.index') }}" class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            Regresar al menú principal
        </a>
    </div>

    {{-- show flash success message --}}
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif



    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center gap-3">
            <div class="flex flex-col gap-3 bg-white p-3 rounded-lg">
            <h2 class="text-2xl text-blue-700">Aplicar Filtros</h2>


            <a href="{{ route('calendar.screens.search', ["title" => "Todas las Citas", "type" => "all"]) }}" class="hover:text-blue-500 transition ease" >Todas las citas</a>
            <a href="{{ route('calendar.screens.search', ["title" => "Todas las Citas", "type" => "pending"]) }}" class="hover:text-blue-500 transition ease">Pendientes</a>
            <a href="{{ route('calendar.screens.search', ["title" => "Todas las Citas", "type" => "completed"]) }}" class="hover:text-blue-500 transition ease">Completadas</a>
            <a href="{{ route('calendar.screens.search', ["title" => "Todas las Citas", "type" => "refused"]) }}" class="hover:text-blue-500 transition ease">Canceladas</a>
        </div>
            <div class=" overflow-hidden shadow-xl sm:rounded-lg p-3">
               <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Título
                </th>
                <th scope="col" class="px-6 py-3">
                    Día ('YYY-m-d')
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                 <th scope="col" class="px-6 py-3">
                    Estado
                </th>

                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $screen)
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-4">
                        {{ $screen->title }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $screen->day }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $screen->user_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $screen->user_email }}
                    </td>
                    <td class="px-6 py-4">
                        @if ($screen->status == 'pending')
                            <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">Pendiente</span>
                        @elseif($screen->status == 'completed')
                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Completado</span>
                        @else
                            <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Cancelado</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('calendar.hidrografia.edit', $screen) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('calendar.hidrografia.destroy', $screen) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
