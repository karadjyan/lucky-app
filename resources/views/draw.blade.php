@extends('layout')

@section('content')
    <h2 class="text-xl font-bold mb-4">Lucky Result</h2>

    <p><b>Random number:</b> {{ $result->number }}</p>
    <p><b>Status:</b> {{ $result->isWin ? 'WIN' : 'LOSE' }}</p>
    <p><b>Win Amount:</b> {{ $result->bonus }}</p>

    <a href="{{ route('link', request()->route('token')) }}" class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Back
    </a>
@endsection
