<?php

namespace App\Http\Controllers;

use App\Models\Fighter;
use App\Models\WeightClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FighterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fighters = Fighter::all();
        return view('fighters.index', compact('fighters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weightClasses = WeightClass::whereIn('type', ['RIZIN(MMA)', 'UFC'])->get();
        return view('fighters.create', compact('weightClasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'weight_class_id' => 'required|exists:weight_classes,id',
            'notes' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // 画像ファイルは2MBまで
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('fighters', 'public');
        }

        Fighter::create(array_merge($validatedData, ['image_path' => $imagePath]));

        return redirect()->route('fighters.index')->with('success', 'Fighter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fighter $fighter)
    {
        return view('fighters.show', compact('fighter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fighter $fighter)
    {
        $fighter->load('weightClass'); // weightClassをロード
        $allowedWeightClassTypes = [];
        if ($fighter->weightClass) {
            $allowedWeightClassTypes = [$fighter->weightClass->type];
        }

        $weightClasses = WeightClass::whereIn('type', $allowedWeightClassTypes)->get();
        
        return view('fighters.edit', compact('fighter', 'weightClasses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fighter $fighter)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'weight_class_id' => 'required|exists:weight_classes,id',
            'notes' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // 画像ファイルは2MBまで
        ]);

        if ($request->hasFile('image')) {
            // 古い画像があれば削除
            if ($fighter->image_path) {
                Storage::disk('public')->delete($fighter->image_path);
            }
            $imagePath = $request->file('image')->store('fighters', 'public');
            $fighter->image_path = $imagePath;
        }

        $fighter->update($validatedData);

        return redirect()->route('fighters.index')->with('success', 'Fighter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fighter $fighter)
    {
        if ($fighter->image_path) {
            Storage::disk('public')->delete($fighter->image_path);
        }
        $fighter->delete();
        return redirect()->route('fighters.index')->with('success', 'Fighter deleted successfully.');
    }
}
