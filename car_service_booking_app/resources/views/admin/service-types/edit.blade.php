
@extends('layouts.layout_admin')


    @section('title')

        Gradovi

    @endsection


    @section('contents')

        <form class="max-w-sm mx-auto bg-white rounded-lg p-[20px] mt-10" method="POST" >
            {{ csrf_field() }}
             @method('PUT')
            <h1 class="text-xl text-center mb-[10px]">Forma za izmenu</h1>
            
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Unesi tip servisa</label>
                <input  id="name" name="name" value="{{$serviceType->name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite naziv" />
                @error('name')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
           

            <button type="submit" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Izmeni tip</button>        
        </form>
    @endsection