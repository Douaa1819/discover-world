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

    public function index()
    {
        $recits = Recit::all();
        $destinations = Destination::all();
        $totalRecits = Recit::count();
        $destinationsPopulaires = Destination::withCount('recits')
            ->orderBy('recits_count', 'desc')
            ->take(3)
            ->get();
    
        return view('welcome', compact('recits', 'destinations', 'totalRecits', 'destinationsPopulaires'));
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
            $destinationFilter = $request->input('destination');
        
            $adventuresQuery = Recit::query();
        
            if ($destinationFilter) {
                $adventuresQuery->where('id_destination', $destinationFilter);
            }
        
            $recits = $adventuresQuery->get();
            $totalRecits = Recit::count();
            $destinations = Destination::all();
            $destinationsPopulaires = Destination::withCount('recits')->orderBy('recits_count', 'desc')->take(3)->get();
        
            return view('welcome', compact('recits', 'destinations', 'totalRecits', 'destinationsPopulaires'));
        }   
    }
