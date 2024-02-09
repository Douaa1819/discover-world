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
                <div style="display: flex; justify-content: center; align-items: center; gap: 220px; flex-wrap: wrap; padding: 20px;">
                    <!--Filter by Time -->
                    <form action="{{ route('filterPosts') }}" method="get" style="display: flex; align-items: center; gap: 10px;">
                        <label for="sort" style="font-weight: bold;">Filter by Time:</label>
                        <select id="sort" name="sort" class="block p-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                            <option disabled selected>Select</option>
                            <option value="oldest">Oldest</option>
                            <option value="newest">Newest</option>
                        </select>
                        <button type="submit" class="p-2 border border-indigo-500 text-indigo-500 rounded-md shadow-sm hover:text-white hover:bg-indigo-500">GO!</button>
                    </form>
                
                    <!--Filter by Destination -->
                    <form action="{{ route('filterPosts') }}" method="GET" style="display: flex; align-items: center; gap: 10px;">
                        <label for="destination" style="font-weight: bold;">Filter by Destination:</label>
                        <select id="destination" name="destination" class="block p-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                            <option disabled selected>Select</option>
                            <option value="">All</option>
                            @foreach ($destinations as $destination)
                                <option value="{{ $destination->id }}">{{ $destination->nomDestination }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="p-2 border border-indigo-500 text-indigo-500 rounded-md shadow-sm hover:text-white hover:bg-indigo-500">GO!</button>
                    </form>
                </div>
                
                <div class="grid max-w-7xl grid-cols-1 mx-auto mt-8 text-center sm:mt-16 sm:text-left sm:grid-cols-2 gap-y-8 gap-x-8 lg:grid-cols-3">
                    @foreach ($recits as $recit)
                    @yield('content')
                        <div class="relative group shadow-lg flex flex-col">
                            <div class="overflow-hidden rounded-lg aspect-w-16 aspect-h-9">
                                @if($recit->images->isNotEmpty())
                                <img class="object-cover w-full h-full transition-all duration-300 transform group-hover:scale-125" src="{{ Storage::url($recit->images->first()->path) }}" alt="Image principale du récit" />
                                @else
                                <img class="object-cover w-full h-full transition-all duration-300 transform group-hover:scale-125" src="{{asset('img/two.jpg')}}" alt="Image placeholder" />
                                 @endif
                            </div>
                            <div class="flex flex-col flex-grow p-4">
                                <p class="text-xl font-bold text-gray-900 font-pj">{{ $recit->name }}</p>
                                <p class="text-sm font-normal text-gray-600 font-pj">{{ $recit->created_at->format('F d, Y') }}</p>
                
                                {{--  description --}}
                                <div class="mt-4 flex-grow">
                                    <p class="font-semibold text-gray-900">Description:</p>
                                    <p class="text-gray-900">{{ \Illuminate\Support\Str::limit($recit->description, 100, $end='...') }}</p>
                                </div>
                
                                {{--  advice --}}
                                <div class="mt-4 mb-4">
                                    <p class="font-semibold text-gray-900">Conseil:</p>
                                    <p class="text-gray-900">{{ \Illuminate\Support\Str::limit($recit->conseil, 70, $end='...') }}</p>
                                </div>
                               
                                <a href="{{ route('recits.show', $recit->id) }}" title="Read More" class="text-blue-500 hover:underline mt-auto">
                                    Read More
                                </a>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
                
                
                
        
        </section>
        <section class="py-12 bg-blue-500 sm:py-16">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="text-center mb-6">
                    <h2 class="text-xl font-bold underline">Statistiques</h2>
                    <p>Nombre total de récits : {{ $totalRecits }}</p>
                </div>
                
                <div class="text-center">
                    <h3 class="text-lg font-semibold underline">Destinations les plus populaires</h3>
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
