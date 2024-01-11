<?php

namespace App\Http\Controllers;
use App\Models\Mentee;
use Illuminate\Http\Request;

class MenteeController extends Controller
{
    function addmentee(){
        return view('menteedashboard');
    }
     
    function meteeDashboard(){
        return view('mentors');
    }

    public function menteePost(Request $request)
    {
        $request->validate([
            'mentee_name' => 'required|string',
            'description' => 'required|string',
           
        ]);

        Mentee::create([
            'mentee_name' => $request->input('mentee_name'),
            'description' => $request->input('description'),
          
        ]);

        return redirect('/menteedashboard')->with('success', 'Data has been successfully stored.');
    }
}
