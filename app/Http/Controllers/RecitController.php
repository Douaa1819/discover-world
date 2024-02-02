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
            $sortOption = $request->input('sort');
        
            $adventuresQuery = Recit::query();
        
            if ($sortOption === 'oldest') {
                $adventuresQuery->orderBy('created_at');
            } elseif ($sortOption === 'newest') {
                $adventuresQuery->orderByDesc('created_at');
            }
        
            $recits = $adventuresQuery->get();
            $totalRecits = Recit::count();
            $destinations = Destination::all();
        
            // Ajouter les destinations populaires
            $destinationsPopulaires = Destination::withCount('recits')
                ->orderBy('recits_count', 'desc')
                ->take(3) 
                ->get();
        
            return view('welcome', compact('recits', 'destinations', 'totalRecits', 'destinationsPopulaires'));
        }
        
    }
