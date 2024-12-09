@extends('layouts.layout')
@section('content')
    <br>
    <h1>Créer une Facture</h1>
    <br>
    <form action="{{ route('invoices.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="client_name">Nom du client : </label>
            <input type="text" id="client_name" name="client_name" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="amount">Montant : </label>
            <input type="number" id="amount" name="amount" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="status">Statut : </label>
            <select id="status" name="status" class="form-control">
                <option value="unpaid">Non payé</option>
                <option value="paid">Payé</option>
                <option value="canceled">Annulé</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="file">Justificatif : </label>
            <input type="file" id="file" name="file" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
