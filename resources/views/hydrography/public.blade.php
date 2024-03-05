<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body>

    <div class="mt-10">
        {{-- logo --}}
        <div class="flex justify-center items-center">
            <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-36 h-24 object-contain">
        </div>
    </div>

    <div class="px-24 mt-10">
        <h2 class="font-semibold text-center lg:text-left text-xl text-gray-800 leading-tight">
            Hydrografías
        </h2>
    </div>

    <div class="py-12 lg:mx-24 mx-3">
        <div class="grid grid-cols-12 gap-3">
            @foreach ($hidrographies as $hidrography)
                <a href="{{ asset('storage/' . $hidrography->image) }}" target="_blank" class="md:col-span-6 col-span-full lg:col-span-4">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-56 object-cover object-center" src="{{ asset('storage/' . $hidrography->image) }}" alt="avatar">
                        <div class="p-4">
                            <h3 class="font-semibold text-lg text-center">{{ $hidrography->type }}</h3>
                            {{-- <p class="text-gray-500">{{ $hidrography->created_at->diffForHumans() }}</p> --}}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</body>
</html>



