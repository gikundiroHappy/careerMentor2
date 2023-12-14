<?php

namespace App\Http\Controllers;
use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{

    function addmentor(){
        return view('addmentor');
    }


    public function store(Request $request)
    {
        $request->validate([
            'mentor_name' => 'required|string',
            'email' => 'required|email',
            'field' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
        ]);

        $user_id = auth()->id();

        $existingMentor = Mentor::where('email', $request->email)->first();

        if ($existingMentor) {
            return redirect()->back()->with('error', 'A mentor with this email already exists.');
        }
    
        Mentor::create(array_merge($request->all(), ['user_id' => $user_id]));

        return redirect()->intended(('listofmentors'))->with('success', 'Mentor added successfully');
    }

    public function listOfMentors()
    {
        $mentors = Mentor::all();

        return view('list_of_mentors', compact('mentors'));
    }

    public function meteeDashboard()
    {
        $mentors = Mentor::all();

        return view('mentee_mentor_dash', compact('mentors'));
    }
}
