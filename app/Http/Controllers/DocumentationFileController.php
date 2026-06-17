<?php

namespace App\Http\Controllers;

use App\Models\DocumentationFile;
use Illuminate\Http\Request;

class DocumentationFileController extends Controller
{
    public function index()
    {
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
        $extension = strtolower($file->getClientOriginalExtension());
        $folder = in_array($extension, ['png', 'jpg', 'jpeg']) ? 'images' : 'documents';
        $path = $file->store($folder, 'public');

        DocumentationFile::create([
            'title' => $validated['title'],
            'file_path' => $path,
            'file_type' => $extension,
        ]);

        return redirect()->back()->with('success', 'File berhasil diunggah.');
    }
}
