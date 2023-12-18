<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\PendingAnimal;
use App\Models\User;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::all();
    
        return view('list', ['animals' => $animals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'animal-name' => 'required|max:255',
            'animal-type' => 'required|max:255',
            'animal-habitat' => 'required|max:255',
            'animal-description' => 'required',
            'animal-image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasFile('animal_image')) {
            $imageName = time().'.'.$request->animal_image->extension();  
            $request->animal_image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }
    
        PendingAnimal::create([
            'name' => $validatedData['animal-name'],
            'type' => $validatedData['animal-type'],
            'habitat' => $validatedData['animal-habitat'],
            'description' => $validatedData['animal-description'],
            'image' => $imageName,
        ]);
    
        return redirect()->route('list')->with('success', 'Animal successfully inserted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view('edit', ['animal' => $animal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'habitat' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Add this line
        ]);
    
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }
    
        $animal->update($validatedData);
    
        return redirect()->route('list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
    
        return redirect()->route('list');
    }

    /**
     * Display the admin dashboard with pending animals.
     */
/**
 * Display the admin dashboard with pending animals.
 */
public function adminDashboard()
{
    $animals = Animal::all();
    $pendingAnimals = PendingAnimal::all();
    $users = User::with('animals')->get();  // Add this line

    return view('admin', ['animals' => $animals, 'pendingAnimals' => $pendingAnimals, 'users' => $users]);
}
    /**
     * Accept a pending animal.
     */
/**
 * Accept a pending animal.
 */
public function acceptAnimal($id)
{
    $pendingAnimal = PendingAnimal::find($id);

    $animal = new Animal;
    $animal->name = $pendingAnimal->name;
    $animal->type = $pendingAnimal->type;
    $animal->habitat = $pendingAnimal->habitat;
    $animal->description = $pendingAnimal->description;
    $animal->image = $pendingAnimal->image;
    $animal->user_id = auth()->id();  // Add this line

    $animal->save();
    $pendingAnimal->delete();

    return redirect()->route('admin');
}

    /**
     * Decline a pending animal.
     */
    public function declineAnimal($id)
    {
        $pendingAnimal = PendingAnimal::find($id);
        $pendingAnimal->delete();

        return redirect()->route('admin');
    }
}