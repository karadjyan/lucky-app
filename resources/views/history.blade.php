@extends('layout')

@section('content')
    <h2 class="text-xl font-bold mb-4">Last 3 Lucky Results</h2>

    @if(empty($draws))
        <p>No history yet.</p>
    @else
        <table class="w-full border text-left">
            <thead>
            <tr class="border-b">
                <th class="p-2">Number</th>
                <th class="p-2">Status</th>
                <th class="p-2">Amount</th>
                <th class="p-2">Date</th>
            </tr>
            </thead>

            <tbody>
            @foreach($draws as $draw)
                <tr class="border-b">
                    <td class="p-2">{{ $draw['number'] }}</td>
                    <td class="p-2">{{ $draw['is_win'] ? 'WIN' : 'LOSE' }}</td>
                    <td class="p-2">{{ $draw['win_amount'] }}</td>
                    <td class="p-2">{{ $draw['created_at'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('link', request()->route('token')) }}" class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Back
    </a>
@endsection
