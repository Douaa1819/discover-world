<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
class DestinationController extends Controller
{
    public function index()
    {
        //->pluck('nomDestination', 'id')
            $destinations = Destination::all();
                // `pluck` pour obtenir un tableau associatif [id => nomDestination]
                return view('ajoutRecit', ['destinations' => $destinations]);

    
    
        
    }

    public function Showdestination()
    {
      
            $destinations = Destination::all();
                return view('welcome', ['destinations' => $destinations]);

    
     
        
    }
}

