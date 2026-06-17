<?php

namespace App\Http\Controllers;

use App\Models\DocumentationFile;
use Illuminate\Http\Request;

class DocumentationFileController extends Controller
{
    public function index()
    {
        // Mengambil data terbaru agar muncul paling atas
        $files = DocumentationFile::latest()->get();
        return view('documentation_files', compact('files'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'attachment' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:5120',
        ]);

        $file = $request->file('attachment');
        // Simpan ke folder public/documentation_files
        $path = $file->store('documentation_files', 'public');
        $extension = strtolower($file->getClientOriginalExtension());

        DocumentationFile::create([
            'title' => $validated['title'],
            'file_path' => $path,
            'file_type' => $extension,
        ]);

        return redirect()->back()->with('success', 'File berhasil diunggah.');
    }
}