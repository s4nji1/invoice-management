@extends('layouts.layout')

@section('title', 'Contact Us')

@section('content')
    <div class="container py-5">
        <h1>Contact Us</h1>
        <p class="mt-3">
            Have any questions or need support? Feel free to reach out to us using the form below or through our contact details.
        </p>
        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
@endsection
