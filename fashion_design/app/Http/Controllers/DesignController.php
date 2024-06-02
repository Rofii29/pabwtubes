<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesignController extends Controller
{
    private $jsonFile = 'public/fashion.json';

    public function index()
    {
        $designs = Design::all();
        return view('designs.index', compact('designs'));
    }

    public function create()
    {
        return view('designs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'ukuran' => 'required|string|in:S,M,L,XL,XXL',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:255', // 255 KB
            'text' => 'required|string',
        ]);

        // Handle file upload
        $fileName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('images'), $fileName);

        // Save data to the database
        $design = new Design();
        $design->nama = $request->nama;
        $design->tanggal = $request->tanggal;
        $design->ukuran = $request->ukuran;
        $design->gambar = 'images/' . $fileName; // Save the relative path
        $design->text = $request->text;
        $design->save();

        // Update the JSON file
        $this->updateJsonFile();

        return redirect()->route('designs.index')->with('success', 'Design created successfully.');
    }

    public function destroy($id)
    {
        $design = Design::find($id);
        if ($design) {
            $design->delete();
            $this->updateJsonFile();
        }
        return redirect()->route('designs.index')->with('success', 'Design deleted successfully.');
    }

    public function show($id)
    {
        $design = Design::find($id);
        if (!$design) {
            return redirect()->route('designs.index')->with('error', 'Design not found.');
        }
        return view('designs.show', compact('design'));
    }

    public function edit($id)
    {
        $design = Design::findOrFail($id);
        return view('designs.edit', compact('design'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required|date',
            'ukuran' => 'required|string|in:S,M,L,XL,XXL',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:255', // 255 KB
            'text' => 'required|string',
        ]);

        // Find the design
        $design = Design::findOrFail($id);
        
        // Handle file upload if a new file is provided
        if ($request->hasFile('gambar')) {
            $fileName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images'), $fileName);
            $design->gambar = 'images/' . $fileName; // Save the relative path
        }

        // Update the design
        $design->nama = $request->nama;
        $design->tanggal = $request->tanggal;
        $design->ukuran = $request->ukuran;
        $design->text = $request->text;
        $design->save();

        // Update the JSON file
        $this->updateJsonFile();

        return redirect()->route('designs.index')->with('success', 'Design updated successfully');
    }

    private function updateJsonFile()
    {
        $designs = Design::all()->toArray();
        Storage::put($this->jsonFile, json_encode($designs, JSON_PRETTY_PRINT));
    }
}
