@extends('layout')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Your Unique Link</h2>

    <p class="mb-4">
        <b>Token:</b> {{ request()->route('token') }} <br>
    </p>

    <div class="space-y-3">

        <form action="{{ route('link.regenerate', request()->route('token')) }}" method="POST">
            @csrf
            <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                Regenerate Link
            </button>
        </form>

        <form action="{{ route('link.deactivate', request()->route('token')) }}" method="POST">
            @csrf
            <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Deactivate Link
            </button>
        </form>

        <form action="{{ route('draw', request()->route('token')) }}" method="POST">
            @csrf
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                ImFeelingLucky
            </button>
        </form>

        <a href="{{ route('history', request()->route('token')) }}"
           class="inline-block bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
            History
        </a>
    </div>
@endsection
