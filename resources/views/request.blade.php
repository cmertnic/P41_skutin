@extends('layouts.main')

@section('content')
    <x-guest-layout>
        <form method="POST" action="{{ route('request.store') }}">
            @csrf
            <h1 class="text-center mb-20 text-5xl"></h1>
            <h1 class="text-center text-blue-500/100 mb-10 text-4xl">Создание заявки</h1>
            <div class="mt-4">
                <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required
                    autocomplete="date" />
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-text-input id="time" class="block mt-1 w-full" type="time" name="time" :value="old('time')" required
                    autocomplete="time" />
                <x-input-error :messages="$errors->get('time')" class="mt-2" />
            </div>
            <select id="type" name="type" class="block mt-4 w-full" required>
                <option value="косметический ремонт">косметический ремонт</option>
                <option value="капитальный ремонт">капитальный ремонт</option>
                <option value="электромантаж">электромантаж</option>
            </select>
            <select id="payment" name="payment" class="block mt-4 w-full" required>
                <option value="наличными">наличными</option>
                <option value="банковская карта">банковская карта</option>
                <option value="безналичный расчет">безналичный расчет</option>
            </select>
            <div class="mt-4">
                <x-text-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')"
                    required autocomplete="adress" placeholder="Адрес" />
                <x-input-error :messages="$errors->get('adress')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Создать заявку') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
@endsection