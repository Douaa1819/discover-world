<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel - {{ $recit->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../public/image/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 px-4">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold">{{ $recit->name }}</h1>
            <p class="text-gray-600">{{ $recit->created_at->format('F d, Y') }}</p>
        </div>

        <div class="flex flex-wrap md:flex-nowrap">
            <!-- Text container -->
            <div class="w-full md:w-1/2 lg:w-2/3 px-4">
                <div class="mb-4">
                    <h2 class="text-xl font-semibold mb-2 underline">Description</h2>
                    <p>{{ $recit->description }}</p>
                </div>

                <div>
                    <h2 class="text-xl font-semibold mb-2 underline">Conseils</h2>
                    <ul class="list-disc pl-5">
                        @foreach(explode("\n", $recit->conseil) as $conseil)
                            <li>{{ $conseil }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Images-->
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4 md:mb-0">
                @foreach($recit->images as $image)
                    <img src="{{ Storage::url($image->path) }}" alt="Image" class="rounded shadow mb-4 max-w-full h-auto">
                @endforeach
            </div>
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('home') }}" class="inline-block bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 transition-colors">Retour</a>
        </div>
    </div>
</body>
</html>