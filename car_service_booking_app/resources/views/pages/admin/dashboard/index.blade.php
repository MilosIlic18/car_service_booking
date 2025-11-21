@extends('layouts.layout_admin')


    @section('title')

        Home

    @endsection


    @section('contents')
        <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Vlasnik
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Naziv
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lokacija
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Grad
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Akcija
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr class="bg-white border-b border-gray-200">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$service->user->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$service->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$service->location->street}}, {{$service->location->house_number}}
                    </td>
                    <td class="px-6 py-4">
                        {{$service->location->town->name}}
                    </td>
                    <td class="px-6 py-4 flex gap-[5px] justify-center">
                        @if($service->verified===0)
                            <a href="{{route('admin.services.verified',$service)}}" class="mb-[5px] text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">Verifikuj</a>
                        @else
                            <b class="text-green">Verifikovano</b>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    @endsection