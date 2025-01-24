<a {{ $attributes }}
    class="
        group
        bg-white
        dark:bg-black
        hover:bg-[linear-gradient(319deg,_#663dff_0%,_#aa00ff_37%,_#cc4499_100%)]
        shadow-md
        hover:shadow-lg
        rounded-lg
        px-4
        py-2
        text-gray-800
        dark:text-gray-200
        hover:text-white
        hover:scale-105
        ring-1
        ring-gray-300
        dark:ring-gray-600
        font-bold
        block
        text-center
        transition-all
        duration-300
    ">
    <span class="bg-[linear-gradient(319deg,_#663dff_0%,_#aa00ff_37%,_#cc4499_100%)] bg-clip-text text-transparent group-hover:text-white transition-all duration-500">
        {{ $slot }}
    </span>
</a>