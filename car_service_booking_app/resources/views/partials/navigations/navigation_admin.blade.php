<nav class="bg-blue-950 p-[10px] flex justify-end text-white/50">
    <ul class="flex flex-col gap-[10px] p-[10px] cursor-pointer md:flex-row">
        <li class="hover:text-white"><a href="{{ route('admin.index') }}">Pocetna</a></li>
        
        <li class="hover:text-white"><a href="{{ route('admin.users.index') }}">Korisnici</a></li>
        <li class="hover:text-white"><a href="{{ route('admin.service-types.index') }}">Servisni tipovi</a></li>
        <li class="hover:text-white"><a href="{{ route('admin.service-profiles.index') }}">Pregled servisa</a></li>
        
        <li class="hover:text-white"><a href="{{ route('admin.towns.index') }}">Pregled gradova</a></li>
        <li class="hover:text-white">
            @if(Illuminate\Support\Facades\Auth::check())
            <a href="{{route('logout')}}">Odjava</a>
        
            @else
                <a href="{{route('login')}}">Prijava</a>
            @endif
        </li>
    </ul>
</nav>