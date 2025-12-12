<nav class="bg-blue-950 p-[10px] flex justify-between items-center text-white/50">
    <h1 class="font-bold text-[30px]">{{request()->route("service")->name}}<h1>
    <ul class="flex flex-col gap-[10px] p-[10px] cursor-pointer md:flex-row">
        
        <li class="hover:text-white"><a href="#">Radno vreme</a></li>
        <li class="hover:text-white"><a href="#">Usluge</a></li>
        <li class="hover:text-white"><a href="#">Rezervacije</a></li>
        <li class="hover:text-white"><a href="#">Klijenti</a></li>
        <li class="hover:text-white"><a href="{{route('service-profiles.index')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Nazad</a></li>
    </ul>
</nav>