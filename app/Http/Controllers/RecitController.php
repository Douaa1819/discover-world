<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Str;

use App\Models\Recit;
use Illuminate\Support\Facades\DB;


use function Laravel\Prompts\alert;

use Illuminate\Support\Facades\Validator;

class RecitController extends Controller
{
//recuperation
    public function index()
    {
        $recits = Recit::all();
        $destinations = Destination::all();
        $totalRecits = Recit::count();
        $destinationsPopulaires = Destination::withCount('recits')
            ->orderBy('recits_count', 'desc')
            ->take(5)
            ->get();
    
        return view('welcome', compact('recits', 'destinations', 'totalRecits', 'destinationsPopulaires'));
    }
    
    

    public function store_recit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'conseil' => 'required',
            'id_destination' => 'required',
            'images.*' => 'image',
        ]);

      
        $recit = Recit::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'conseil' => $request->input('conseil'),
            'id_destination' => $request->input('id_destination'),

        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/img');
                $databasePath = Str::replaceFirst('public/', '', $path);
                $recit->images()->create([
                    'path' => $databasePath,
                ]);
            }
        }

        return redirect()->route('home');
    }



    public function filterPosts(Request $request)
    {
        $destinationFilter = $request->input('destination');
    
        $adventuresQuery = Recit::query();
        $sortOption = $request->input('sort');
        $adventuresQuery = Recit::query();
    
        if ($sortOption === 'oldest') {
            $adventuresQuery->orderBy('created_at');
        } elseif ($sortOption === 'newest') {
            $adventuresQuery->orderByDesc('created_at');
        }
    
        if ($destinationFilter) {
            $adventuresQuery->where('id_destination', $destinationFilter);
        }
    
        $recits = $adventuresQuery->get();
        $totalRecits = Recit::count();
        $destinations = Destination::all();
        $destinationsPopulaires = Destination::withCount('recits')->orderBy('recits_count', 'desc')->take(3)->get();
    
        return view('welcome', compact('recits', 'destinations', 'totalRecits', 'destinationsPopulaires'));
    } 
public function show($id)
{
    $recit = Recit::with('images')->findOrFail($id);
    return view('recit-details', compact('recit'));
}

}
    
