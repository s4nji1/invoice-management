<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use App\Models\Invoice;
use App\Mail\InvoiceCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
    
        $invoices = \Cache::remember('invoices', 60, function () {
            return \App\Models\Invoice::all();
        });

        foreach ($invoices as $invoice) {
            $invoice->file_path = route('files.show', ['filename' => basename($invoice->file_path)]);
        }

        return view('invoices.index', compact('invoices'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $validated = $request->validate([
            'client_name' => 'required|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'in:unpaid,paid,canceled',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $validated['file_path'] = $request->file('file')->store('invoices');
        }

        $invoice = Invoice::create($validated);
        
        Mail::to('admin@example.com')->send(new InvoiceCreated($invoice));
        
        return redirect()->route('invoices.index')->with('success', 'Facture créée avec succès.');
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $invoice = \App\Models\Invoice::findOrFail($id);
        return view('invoices.edit', compact('invoice'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $invoice = \App\Models\Invoice::findOrFail($id);
        $validated = $request->validate([
            'client_name' => 'required|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'in:unpaid,paid,canceled',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            \Storage::delete($invoice->file_path);
            $validated['file_path'] = $request->file('file')->store('invoices');
        }

        $invoice->update($validated);

        return redirect()->route('invoices.index')->with('success', 'Facture mise à jour avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        $invoice = \App\Models\Invoice::findOrFail($id);

        if ($invoice->file_path) {
            \Storage::delete($invoice->file_path);
        }

        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'Facture supprimée avec succès.');

    }

    public function search(Request $request)
    {
        $request->validate([
            'client_name' => 'nullable|string', 
            'id' => 'nullable|integer',
        ]);

        $query = Invoice::query();

        if ($request->filled('client_name')) {
            $query->where('client_name', 'like', '%' . $request->client_name . '%');
        }

        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        return response()->json($query->get(), 200);
    }

    public function markAsPaid($id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json(['error' => 'Invoice not found'], 404);
        }

        $invoice->status = "paid";
        $invoice->save();

        return response()->json(['message' => 'Invoice marked as paid', 'invoice' => $invoice], 200);
    }
    
}