@extends('layouts.layout_admin')


    @section('title')

        Korisnici

    @endsection


    @section('contents')
        <h1 class="mb-[15px] mx-[5px] text-xl text-bold">Korisnici</h1>
        <div class="relative overflow-x-auto w-full">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Ime
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Uloga
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="bg-white border-b border-gray-200">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{$user->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$user->email}}
                        </td>
                        <td class="px-6 py-4 flex gap-[5px]">
                            @php
                                $role = App\Http\Helpers\UserHelper::getRole($user->role)
                            @endphp
                            {{$role}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   


    @endsection