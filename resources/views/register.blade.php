@extends('layout')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Registration</h2>

    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Username</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block mb-1">Phone number</label>
            <input type="text" name="phone" class="w-full border p-2 rounded" required>
            @error('phone')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Register
        </button>
    </form>
@endsection
