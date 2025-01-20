<a {{ $attributes }}
    class="
        bg-shadow-gray-400 group
        hover:bg-[linear-gradient(319deg,_#663dff_0%,_#aa00ff_37%,_#cc4499_100%)]
        shadow-gray-400 shadow-md rounded-full px-3 py-2 ring-1 ring-gray-400
        font-black transition-all duration-300">
        
        <span class="bg-custom-gradient bg-clip-text text-transparent group-hover:text-white">
        {{ $slot }}
        </span>
</a>
