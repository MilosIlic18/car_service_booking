@extends('layouts.layout_admin')

@section('title')
    Zahtev
@endsection

@section('contents')



    <div class="flex gap-[15px]">
        <form class="max-w-sm bg-white rounded-lg p-[20px] w-full h-fit" method="POST" action="{{route('admin.towns.store')}}">
            {{ csrf_field() }}
            <h1 class="text-xl text-center">Forma za unosenje grada</h1>
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Naziv grada</label>
                <input  id="name" name="name" value="{{old('name')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite naziv" />
                @error('name')
                    <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                @enderror
            </div>
            

            <button type="submit" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Unesi grad</button>
        </form>

            
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Naziv grada
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($towns as $town)
                    <tr class="bg-white border-b border-gray-200">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$town->name}}
                        </td>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection