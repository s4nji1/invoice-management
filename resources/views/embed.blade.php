@extends('layouts.layout')
@section('content')

    <div class="container my-5">
        <h1 class="text-center mb-4">File Viewer</h1>
        <div class="card">
            <div class="card-body">
                <iframe src="{{ $fileUrl }}" width="100%" height="600px" class="embed-responsive-item"></iframe>
            </div>
        </div>
    </div>

