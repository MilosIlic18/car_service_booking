@extends('layouts.layout_admin')


    @section('title')

        Gradovi

    @endsection


    @section('contents')
    
    <h1 class="mb-[15px] mx-[5px] text-xl text-bold">Gradovi</h1>
    @if(\Illuminate\Support\Facades\Session::has('err'))
        <p class="text-red-900 text-center mb-[10px]">{{ \Illuminate\Support\Facades\Session::get('err')}}</p>
    @endif
    <div class="md:flex gap-5 w-full">
        <div class="mb:mb-[0px] mb-[10px]">
            <form class="max-w-sm mx-auto bg-white rounded-lg p-[20px] mt-10 w-[350px]" method="POST" action="{{route('admin.towns.store')}}">
                {{ csrf_field() }}
                <h1 class="text-xl text-center mb-[10px]">Forma za unos grada</h1>
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Unesi grad</label>
                    <input  id="name" name="name" value="{{old('name')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Unesite naziv" />
                    @error('name')
                        <p class="text-red-800 text-[12px] mt-[4px]">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="mb-[5px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Unesi grad</button>        
            </form>
        </div>
        <div class="relative overflow-x-auto w-full">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Naziv
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Broj servisa
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Akcija
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($towns as $town)
                    <tr class="bg-white border-b border-gray-200">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$town->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{count($town->locations)}}
                        </td>
                        <td class="px-6 py-4 flex gap-[5px]">
                            <a href="{{route('admin.towns.show',$town)}}" class="mb-[5px] text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">Auriraj</a>
                            <form action="{{ route('admin.towns.destroy', $town) }}" method="POST">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button type="submit"
                                    class="mb-[5px] text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                                    Obrisi
                                </button>
                            </form>    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @endsection