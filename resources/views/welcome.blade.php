@extends('layouts.main')

@section('content')
<form method="GET" class="flex " action="{{ route('request.create') }}">
                @csrf
                <button type="submit" class="bg-blue-500 mt-4 text-white font-bold py-2 px-4 ml-auto mr-auto rounded mb-5">
                    подать заявку
                </button>
            </form>
    @foreach ($orders as $order)
        <x-order-card :order="$order" />
    @endforeach
@endsection
