{{-- welcome.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="../public/image/licon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="../public/css/style.css">
        <title>Travel</title>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <header>
    <x-navbar></x-navbar>
    <x-add-recit></x-add-recit>
    </header>
    <body class="bg-no-repeat bg-right bg-fixed" style="background-image:  background-size: contain;">

        <section class="py-12 bg-white sm:py-16 ">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="max-w-md mx-auto text-center">
                    <p class="text-blue-700 font-lato text-6xl font-bold leading-normal">Where do you</p>
                    <div class="text-black font-lato text-6xl font-bold leading-normal mb-4">want to go?</div>
                </div>
                <form action="{{ route('filterPosts') }}" method="get">
                   <div class="flex flex-wrap justify-evenly rounded-lg">
                    
                    <label for="sort" class=" p-2 text-lg font-semibold text-gray-700">Sort By:</label>
                    <button type="submit" class="block ml-3 mt-1 p-1 border ">Done</button>
                    <select id="sort" name="sort" class="block ml-3 mt-1 p-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                        <option disabled selected>Filter by Time</option>
                        <option value="oldest">Oldest</option>
                        <option value="newest">Newest</option>
                    </select>
                   
        </form>
            <button class="px-4 py-3 bg-blue-500 text-white  unde hover:bg-blue-600 rounded-lg">All</button>
            @foreach ($destinations as $destination)
            <button class="px-4 py-3 bg-blue-500 text-white hover:bg-blue-600 rounded-lg">{{$destination->nomDestination}}</button>                               
            @endforeach 
             </div>
             
                </div>
        
                <div class="grid max-w-3xl grid-cols-1 mx-auto mt-8 text-center sm:mt-16 sm:text-left sm:grid-cols-2 gap-y-8 gap-x-8 lg:grid-cols-3">
                    @foreach ($recits as $recit)
                        <div class="relative group shadow-lg">
                            <div class="overflow-hidden rounded-lg aspect-w-16 aspect-h-9">
                                <img class="object-cover w-full h-full transition-all duration-300 transform group-hover:scale-125"  src="{{asset('img/two.jpg')}}" alt="" />
                                {{-- <img class="object-cover w-full h-full transition-all duration-300 transform group-hover:scale-125" src="{{ asset('storage/' . $recit->images->first()->path) }}" alt="Image"> --}}
                            </div>
                            <p class="mt-4 text-xl font-bold text-gray-900 font-pj">{{ $recit->name}}</p>
                            <p class="mt-6 text-sm font-normal text-gray-600 font-pj">{{ $recit->created_at->format('F d, Y') }}</p>
                            <p class="mt-4  text-gray-900">{{ $recit->description }}</p>
                            <p class="mt-4  text-gray-900">{{ $recit->conseil }}</p>
                            <a href="#" title="">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                            </a>
                        </div>
                    @endforeach
                </div>
                
        
        </section>
        <section class="py-12 bg-blue-500 sm:py-16">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="text-center mb-6">
                    <h2 class="text-xl font-bold underline">Statistiques</h2>
                    <p class="">Nombre total de récits : {{ $totalRecits }}</p>
                </div>
                
                <div class="text-center">
                    <h3 class="text-lg font-bold underline">Destinations les plus populaires</h3>
                    <ul>
                        @foreach ($destinationsPopulaires as $destination)
                            <li>{{ $destination->nomDestination }} : {{ $destination->recits_count }} récits</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        
        
        
    </body>
</html>
