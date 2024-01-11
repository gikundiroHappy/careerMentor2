<?php

namespace App\Http\Controllers;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'image' => 'max:2048', // Adjust validation rules as needed
        ]);

        $user_id = auth()->id();

        $existingMentor = Mentor::where('email', $request->email)->first();

        if ($existingMentor) {
            return redirect()->back()->with('error', 'A mentor with this email already exists.');
        }

        $imagePath = null;

if ($request->hasFile('image')) {
    $imagePath = $request->file('image')->store('mentor_images', 'public');
}
    
        Mentor::create(array_merge($request->all(), ['user_id' => $user_id, 'image_path' => $imagePath]));

        return redirect()->intended(('listofmentors'))->with('success', 'Mentor added successfully');
    }

    // public function listOfMentors()
    // {
    //     $mentors = Mentor::all();

    //     return view('list_of_mentors', compact('mentors'));
    // }
    public function listOfMentors(Request $request)
    {
        $query = Mentor::query();

        if ($request->has('sort')) {
            $sortField = $request->get('sort');
            $sortDirection = $request->get('direction', 'asc');

            $query->orderBy($sortField, $sortDirection);
        }

        if ($request->has('search')) {
            $searchTerm = $request->get('search');
            $query->where('mentor_name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('field', 'like', '%' . $searchTerm . '%')
                  ->orWhere('location', 'like', '%' . $searchTerm . '%');
        }

        $mentors = $query->get();

        $role = Auth::user()->role; // Assuming you have a 'role' column in your users table

        if ($role === 'admin') {
            return view('mentor.list', compact('mentors'));
        } elseif ($role === 'mentee') {
            return view('mentors', compact('mentors'));
        }

        return view('list_of_mentors', compact('mentors'));
    }

    public function meteeDashboard()
    {
        $mentors = Mentor::all();

        return view('mentee_mentor_dash', compact('mentors'));
    }
}
