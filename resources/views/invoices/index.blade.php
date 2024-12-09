@extends('layouts.layout')
@section('content')
    <br>
    <h1>Liste des Factures</h1>
    <br>
    <a href="{{ route('invoices.create') }}" class="btn btn-primary">Create Invoice</a>
    <br><br><br>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Client</th>
                <th>Montant</th>
                <th>Statut</th>
                <th>Actions</th>
                <th>file</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->client_name }}</td>
                    <td>{{ $invoice->amount }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>
                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                    <td><a href="{{ $invoice->file_path }}" target="_blank">PDF</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <br>
    {{ $invoices->links() }}
@endsection
