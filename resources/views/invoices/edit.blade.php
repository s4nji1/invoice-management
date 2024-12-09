@extends('layouts.layout')
@section('content')
    <br>
    <h1>Modifier une Facture</h1>
    <br>
    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="client_name">Nom du client :</label>
            <input type="text" id="client_name" name="client_name" class="form-control" value="{{ $invoice->client_name }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="amount">Montant :</label>
            <input type="number" id="amount" name="amount" class="form-control" value="{{ $invoice->amount }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="status">Statut :</label>
            <select id="status" name="status" class="form-control">
                <option value="unpaid" {{ $invoice->status == 'unpaid' ? 'selected' : '' }}>Non payé</option>
                <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Payé</option>
                <option value="canceled" {{ $invoice->status == 'canceled' ? 'selected' : '' }}>Annulé</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="file">Justificatif (optionnel) :</label>
            <input type="file" id="file" name="file" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
