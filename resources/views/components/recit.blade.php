
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../public/image/licon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Travel</title>
</head>

<body class="bg-no-repeat bg-right bg-fixed" style="background-image:  background-size: contain;">

<section class="py-12 bg-white sm:py-16 ">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto text-center">
            <p class="text-blue-700 font-lato text-6xl font-bold leading-normal">Where do you</p>
            <div class="text-black font-lato text-6xl font-bold leading-normal mb-4">want to go?</div>
        </div>
           <div class="flex flex-wrap justify-evenly rounded-lg">
    <button class="px-4 py-3 bg-blue-500 text-white hover:bg-blue-600 rounded-lg">All</button>
    @foreach ($destinations as $destination)
    <button class="px-4 py-3 bg-blue-500 text-white hover:bg-blue-600 rounded-lg">{{$destination->nomDestination}}</button>                               
    @endforeach 
</div>

        </div>

        <div class="grid max-w-3xl grid-cols-1 mx-auto mt-8  text-center sm:mt-16 sm:text-left sm:grid-cols-2 gap-y-8 gap-x-8 lg:grid-cols-3">
            <div class="relative group shadow-lg">
                <div class="overflow-hidden rounded-lg aspect-w-16 aspect-h-9 ">
                    <img class="object-cover w-full h-full transition-all duration-300 transform group-hover:scale-125"  src="{{asset('img/one.jpg')}}" alt="" />
                </div>
                <p class="mt-6 text-sm font-normal text-gray-600 font-pj">November 22, 2021</p>
                <p class="mt-4 text-xl font-bold text-gray-900 font-pj">How To Optimize Progressive Web Apps: Going Beyond The Basics</p>
                <a href="#" title="">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                </a>
            </div>

            <div class="relative group shadow-lg">
                <div class="overflow-hidden rounded-lg aspect-w-16 aspect-h-9">
                    <img class="object-cover w-full h-full transition-all duration-300 transform group-hover:scale-125"  src="{{asset('img/two.jpg')}}" alt="" />
                </div>
                <p class="mt-6 text-sm font-normal text-gray-600 font-pj">November 16, 2021</p>
                <p class="mt-4 text-xl font-bold text-gray-900 font-pj">How To Optimize Progressive Web Apps: Going Beyond The Basics</p>
                <a href="#" title="">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                </a>
            </div>
            <div class="relative group shadow-lg">
                <div class="overflow-hidden rounded-lg aspect-w-16 aspect-h-9">
                    <img class="object-cover w-full h-full"  src="{{asset('img/four.jpg')}}" alt="" />
                </div>
                <p class="mt-6 text-sm font-normal text-gray-600 font-pj">November 16, 2021</p>
                <p class="mt-4 text-xl font-bold text-gray-900 font-pj">How To Optimize Progressive Web Apps: Going Beyond The Basics</p>
                <a href="#" title="">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        </div>
        
    </div>
</section>
</body>
</html>