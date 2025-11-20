<nav class="bg-blue-300 p-[10px] flex justify-center">
    <ul class="flex flex-col gap-[10px] p-[10px] cursor-pointer md:flex-row">
        <li class="hover:text-white">
            <a href="/">Pocetna</a>
        </li>
        <li class="hover:text-white">
            <a href="{{route('services.add')}}">Zahteva za otvaranje servisa</a>
        </li>
        <li class="hover:text-white">
            @if(Illuminate\Support\Facades\Auth::check())
            <a href="{{route('logout')}}">Odjava</a>
        
            @else
                <a href="{{route('register')}}">Prijava</a>
            @endif
        </li>
    </ul>
</nav>