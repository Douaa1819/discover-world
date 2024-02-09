
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/public/image/licon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>travel</title>
</head>
<body>
    {{-- add -recit --}}
    <form method="POST" action="{{route('recit.store')}}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('post')

        <div class="grid gap-4 mb-4 grid-cols-1 md:grid-cols-2 mx-4">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Type récit name" required>
            </div>
            <div>
                <label for="Distination" class="block mb-2 text-sm font-medium text-gray-900">Destination</label>
                <select id="destination" required name="id_destination" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected>Choose the destination</option>
                    @foreach ($destinations as $destination)
                    <option value="{{$destination->id}}">{{$destination->nomDestination}}</option>
                    @endforeach
                </select>
            </div>
            <div class="md:col-span-2">
                <input type="file" id="uploadImages" class="block w-full text-sm text-gray-900 mb-2" name="images[]" multiple>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Adventure Description</label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write adventure description here" required></textarea>
            </div>
            <div class="md:col-span-2">
                <label for="Advice" class="block mb-2 text-sm font-medium text-gray-900">Advice</label>
                <textarea id="advice" name="conseil" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write advice here" required></textarea>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                Add New Adventure
            </button>
        </div>
    </form>
</body>
</html>