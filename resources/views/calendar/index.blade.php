<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agenda') }}
        </h2>
    </x-slot>

    {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
        <a href="{{ route('calendar.index') }}" class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            Regresar al menú principal
        </a>
    </div> --}}

    {{-- show flash success message --}}
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class=" overflow-hidden shadow-xl sm:rounded-lg p-3">
                <div class="flex items-center justify-between">
                    <h2 class="text-3xl">Elige que tipo de producto deseas agendar</h2>
                </div>
                <div class="my-5 flex justify-center gap-2 items-center">
                    <div class="flex flex-col gap-2">
                        <a href="{{ route('calendar.screens.create') }}" class="px-4 py-2 bg-blue-500 text-white font-semibold hover:bg-blue-700 transition ease rounded-lg">Agendar una pantalla</a>
                        <a href="{{ route('calendar.screens.list') }}" class="text-center">Ver todos</a>
                    </div>
                    <div class="flex flex-col gap-2">
                        <a href="{{ route('calendar.illuminations.create') }}" class="px-4 py-2 bg-blue-500 text-white font-semibold hover:bg-blue-700 transition ease rounded-lg">Agendar una iluminación</a>
                        <a href="{{ route('date.illumination.list') }}" class="text-center">Ver todos</a>
                    </div>
                    <div class="flex flex-col gap-2">
                        <a href="{{ route('calendar.hidrografia.create') }}" class="px-4 py-2 bg-blue-500 text-white font-semibold hover:bg-blue-700 transition ease rounded-lg">Agendar una Hidrografía</a>
                        <a href="{{ route('calendar.hidrografia.list') }}" class="text-center">Ver todos</a>
                    </div>
                </div>
            </div>



            <div class="flex justify-center items-center gap-3 mt-10">
                <div class="border-2 flex-grow flex justify-center items-center p-5 rounded-lg border-blue-500">
                    <h1 class="text-2xl font-semibold">Pendientes: {{  $total_pending }}</h1>
                </div>
                <div class="border-2 flex-grow flex justify-center items-center p-5 rounded-lg border-blue-500">
                    <h1 class="text-2xl font-semibold">Completados: {{ $total_completed }}</h1>
                </div>
                <div class="border-2 flex-grow flex justify-center items-center p-5 rounded-lg border-blue-500">
                    <h1 class="text-2xl font-semibold">Cancelados: {{  $total_rehused }}</h1>
                </div>
                <div class="border-2 flex-grow flex justify-center items-center p-5 rounded-lg border-blue-500">
                    <h1 class="text-2xl font-semibold">Total: ${{ $total_billing }}</h1>
                </div>
            </div>
             <div class="mt-5">
                <h1>Datos Recopilados de {{ $firstDayOfMonth->format('d:m:Y') }} al {{ $lastDayOfMonth->format('d:m:Y') }} (día-mes-año)</h1>
            </div>
        </div>

    </div>
</x-app-layout>
