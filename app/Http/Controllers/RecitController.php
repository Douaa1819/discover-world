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

          //  return redirect('welcome',compact('destinations'));
       
           // return redirect('/login')->with('error', ' error Please Try Again.');
        }
    }
