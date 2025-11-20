@extends('layouts.layout')

@section('title')
    Zahtev
@endsection

@section('contents')




 <form class="max-w-sm mx-auto bg-white rounded-lg p-[20px] mt-10" method="POST" action="{{route('services.store')}}">
            {{ csrf_field() }}
            <h1 class="text-xl text-center">Podnosenje zahteva</h1>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Naziv servisa</label>
                <input  id="name" name="name" value="{{old('name')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite naziv" />
                @error('name')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="towns" class="block mb-2 text-sm font-medium text-gray-900">Grad</label>
                <select id="towns" name="location[towns_id]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lgfocus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Odaberi grad</option>
                    @foreach(App\Models\Town::all() as $town)
                        <option value="{{ $town->id }}"
                            {{ old('location.towns_id') == $town->id ? 'selected' : '' }}>
                            {{ $town->name }}
                        </option>
                    @endforeach
                </select>
                @error('location.towns_id')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="street" class="block mb-2 text-sm font-medium text-gray-900">Ulica</label>
                <input  id="street" name="location[street]" value="{{old('location.street')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite naziv ulice" />
                @error('location.street')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="house_number" class="block mb-2 text-sm font-medium text-gray-900">Broj</label>
                <input  id="house_number" name="location[house_number]" value="{{old('location.house_number')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite kucni broj" />
                @error('location.house_number')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                
                <label for="description" class="block mb-2.5 text-sm font-medium text-heading">Opis</label>
                <textarea id="description" name="description" rows="4" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body" placeholder="Unesite opis...">{{old('description')}}</textarea>
                @error('description')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Podnesi zahtev</button>
        </form>

@endsection