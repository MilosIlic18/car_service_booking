@extends('layouts.layout_admin')


    @section('title')

        Home

    @endsection


    @section('contents')
        @foreach($services as $service)
            @if($service->verified===1)
             <a class="p-[10px] bg-green-400">{{$service->name}}</a>
            @endif
        @endforeach


    @endsection