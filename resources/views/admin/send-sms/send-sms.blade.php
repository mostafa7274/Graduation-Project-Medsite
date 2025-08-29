@extends('admin.layouts.app')

@section('content')
    <br>
    <br>
    <br>
    <div class="container mt-5">
        <h2>Send SMS</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('send-sms.send') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="number" class="form-label">Phone Number</label>
                <input type="text" name="number" id="number" class="form-control" placeholder="e.g., 201150909200" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send SMS</button>
        </form>
    </div>
@endsection