<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\User;
use App\Models\Recit;
use Illuminate\Support\Facades\DB;


use function Laravel\Prompts\alert;

use Illuminate\Support\Facades\Validator;

class RecitController extends Controller
{


    // public function getUserRecits()
    // {
    //     $user = auth()->user();
    //     $userRecits = $user->userRecits;

    //     return view('profile', ['UserRecits' => $userRecits]);
    // }

    public function index(){
        $adventures = Recit::with('destination','photo')->get();
        $destinations = Destination::with('photo')->get();
        return view('welcome', compact('adventures', 'destinations'));
    }

    public function store_recit(Request $request)
    {
        
 $destinations = Destination::all();

     
            $recit = Recit::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'conseil' => $request->input('conseil'),
                'id_destination' => $request->input('destination_id'),

            ]);
           
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $path = $image->store('images', 'public');

                    $recit->images()->create([
                        'path' => $path,
                    ]);
                }
            }

       
        }



        public function filterPosts(Request $request)
        {
            $sortOption = $request->input('sort');
        
            $adventuresQuery = Recit::query();
        
            // Filter by time
            if ($sortOption === 'oldest') {
                $adventuresQuery->orderBy('created_at');
            } elseif ($sortOption === 'newest') {
                $adventuresQuery->orderByDesc('created_at');
            }
        
            // Get the filtered 
            $recits = $adventuresQuery->get();
        
            // Assuming you also want to pass destinations to the view for the dropdown
            $destinations = Destination::all();
        
            return view('welcome', compact('recits', 'destinations'));
        }
        

    }
   
    
