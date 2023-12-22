<?php

namespace App\Http\Controllers;
use App\Models\Mentees; 
// use App\Http\Controllers\Mentees;
use App\Models\Mentor;
use Illuminate\Http\Request;

class MenteeController extends Controller
{
    function addMentee(){
        return view('menteedashboard');
    }
    
    function menteePost(Request $request){
     
        $request->validate([
            'mentee_name' => 'required',
            'description' => 'required|string',
        ]);

        $data['name'] = $request->mentee_name;
        $data['description'] = $request->description;
     
        $mentees = Mentees::create($data);

        if (!$mentees) {
                     }
}
}