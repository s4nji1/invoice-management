<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function show($filename){

        $filePath = 'invoices/' . $filename;

        if (Storage::disk('local')->exists($filePath)) {
            return response()->file(storage_path('app/' . $filePath));
        }
        
        return response()->json(['error' => 'File not found'], 404);

    }   
}
