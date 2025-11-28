@extends('layouts.layout_public')


    @section('title')

        Zahtev

    @endsection


    @section('contents')

        <form class="max-w-sm mx-auto bg-white rounded-lg p-[20px] mt-10" method="POST" action="{{route('service-request.store')}}">
            {{ csrf_field() }}
            <h1 class="text-xl text-center mb-[10px]">Formular za podnosenje zahteva za otvaranje servisa</h1>
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <p class="text-green-900 text-center mb-[10px]">{{ \Illuminate\Support\Facades\Session::get('success')}}</p>
            @endif
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Naziv servisa</label>
                <input  id="name" name="name" value="{{old('name')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite naziv" />
                @error('name')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="town" class="block mb-2 text-sm font-medium text-gray-900">Grad</label>
                <select id="town" name="location[towns_id]" class="block w-full py-3 px-4 pe-9 border border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Izaberi grad</option>

                    @foreach($towns as $town)
                        <option value="{{ $town->id }}" {{ old('location.towns_id') == $town->id ? 'selected' : '' }}>
                            {{ $town->name }}
                        </option>
                    @endforeach
                </select>

                @error('location.towns_id')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{ $message }}</p>
                @enderror
            </div>
           
            <div class="mb-5">
                <label for="street" class="block mb-2 text-sm font-medium text-gray-900">Ulica</label>
                <input  id="street" name="location[street]" value="{{old('location.street')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite ulicu" />
                @error('location.street')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="house_number" class="block mb-2 text-sm font-medium text-gray-900">Ulicni broj</label>
                <input  id="house_number" name="location[house_number]" value="{{old('location.house_number')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite ulicni broj" />
                @error('location.house_number')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            
            <div class="flex flex-col mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Opis servisa</label>
                <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Unesite opis servisa">{{old('description')}}</textarea>
                @error('description')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Podnesi zahtev</button>        
        </form>

    @endsection