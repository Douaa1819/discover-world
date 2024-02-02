<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
class DestinationController extends Controller
{
    public function index()
    {
        {//->pluck('nomDestination', 'id')
            $destinations = Destination::all();
                // `pluck` pour obtenir un tableau associatif [id => nomDestination]
        $hhh = 'hani wahhaaaaaaaaaaaani';
                return view('ajoutRecit', ['destinations' => $destinations,'hhh'=> $hhh]);

    
    
        }
    }
}
