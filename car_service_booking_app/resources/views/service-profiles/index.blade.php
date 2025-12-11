@extends('layouts.layout_service_profiles')


    @section('title')

        Profili Servisa

    @endsection


    @section('contents')
    
        <h1 class="mb-[15px] mx-[5px] text-xl text-bold">Profili</h1>
        <div class="flex gap-4 flex-wrap">
            @foreach($services as $service)

                @if($service->verified===0)
                    <div class="w-[300px] bg-gray-300 p-[10px] flex flex-col gap-5">
                        <div class="flex gap-4 items-center">
                            <i class="fa-solid fa-user"></i> <b>{{$service->name}}</b>
                        </div>
                        <div class="flex gap-4 items-center">
                            {{$service->location->town->name}}, {{$service->location->street}} {{$service->location->house_number}}
                        </div>
                    </div>
                @else
                    <a href="#" class="w-[300px] bg-gray-300 p-[10px] block flex flex-col gap-5">
                        <div class="flex gap-4 items-center">
                            <i class="fa-solid fa-user"></i> <b>{{$service->name}}</b>
                        </div>
                        <div class="flex gap-4 items-center">
                            {{$service->location->town->name}}, {{$service->location->street}} {{$service->location->house_number}}
                        </div>
                    </a>
                @endif

            @endforeach
        </div>

    @endsection