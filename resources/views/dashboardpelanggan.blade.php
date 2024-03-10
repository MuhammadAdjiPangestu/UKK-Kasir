<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minuman Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100">

    <div class="bg-blue-400 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-semibold">
                <a href="{{ url('/') }}" class="hover:text-blue-300">MapAir Drink's</a>
            </div>
            <div class="space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-lg font-semibold hover:text-blue-300">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-lg font-semibold hover:text-blue-300 cursor-pointer">Logout</button>
                    </form>
                @else
                <div class="auth-links">
                    <a href="{{ route('login') }}" class="text-lg font-semibold hover:text-blue-300">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-lg font-semibold hover:text-blue-300 ml-4">Register</a>
                    @endif
                </div>
                @endauth
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($minuman as $item)
            <div class="max-w-sm rounded overflow-hidden shadow-lg transition-transform duration-300 transform hover:scale-105">
                <div class="w-full">
                    @if($item->foto)
                        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $item->foto) }}" alt="Foto">
                    @else
                        <img class="w-full h-48 object-cover" src="https://via.placeholder.com/300" alt="Placeholder Image">
                    @endif
                </div>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $item->nama }}</div>
                    <p class="text-gray-700 text-base">{{ $item->keterangan }}</p>
                    <p class="text-gray-800 text-lg font-bold mt-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <footer class="bg-blue-400 text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            <p class="text-sm">&copy; 2024 MapAir Drink's. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
