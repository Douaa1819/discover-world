
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
<form method="POST" action="{{route('recit.store')}}" enctype="multipart/form-data">
    @csrf
    @method('post')
<div class="flex justify-end">
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="  flex justify-end overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full  max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
             
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Create New adventure
                    </h3>
                    
                </div>
               
                <div class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type récit name" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                          <label for="Distination" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Distination</label>
                          <select id="destination" required name="destination_id" class="bg-gray-50 mt-8 border outline-none h-[40px] border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                              <option selected>Chose the destination</option>
                                 @foreach ($destinations as $destination)
                                <option value="{{$destination->id}}">{{$destination->nomDestination}}</option>                                
                                @endforeach  
                          </select>                
                        </div>
                        <div class="col-span-2">
                          <input type="file" id="uploadImages" class="block mb-2 text-sm font-medium text-gray-900" name="images[]" multiple>
                            <label for="description"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Advanture Description</label>
                            <textarea id="description"  name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write adventore description here" required></textarea>                    
                        </div>
  
                        <div class="col-span-2">
                          <label for="Advice"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Advice</label>
                          <textarea id="description" name="conseil" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write Advice here" required></textarea>                    
                      </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add new adventure
                    </button>
                </div>
            </div>
        </div>
    </div> 
    
  </div>
  </form>
</body>
</html>