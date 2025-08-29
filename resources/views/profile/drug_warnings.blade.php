@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Drug Warnings</h2>

    @if($error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endif

    @if(!empty($warnings))
        <ul>
            @foreach($warnings as $warning)
                <li>
                    {{ $warning['drugs'] }}: {{ $warning['risk_description'] }} (Severity: {{ $warning['severity'] }})
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('home') }}" class="btn btn-primary">Return to Home</a>
</div>
@endsection
