@extends('include/layout')
@section('title','Home 🎤')
@section('body')
    <!-- Nawigacja -->
    <x-navbar />

    <!-- Główna zawartość -->
    <div class="flex-1 flex items-center justify-center py-16 relative ">
        <!-- Główna sekcja -->
        <div class="bg-white dark:bg-slate-800 p-8 shadow-2xl flex-col rounded-lg grid grid-cols-1 lg:grid-cols-2 gap-6 w-[70%]">
            <!-- Sekcja Utwory i Player -->
            <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md flex flex-col ">
                <!-- Lista Utworów -->
                @if (count($results) > 0)
                    <ul class="flex-1 ">
                        @foreach ($results as $result)
                            <x-song_card :id="$result->ID" :title="$result->Title" :category="$result->category_name" :author="$result->author_name" />
                            @auth
                                <div class="flex justify-center mb-4">
                                    <a href="{{ route('requests.create', [$result->ID]) }}"
                                        class="
                                            group
                                            bg-white
                                            dark:bg-gray-700
                                            hover:bg-[linear-gradient(319deg,#ffcccc_0%,#ff66cc_50%,#cc0066_100%)]
                                            shadow-md
                                            hover:shadow-lg
                                            rounded-lg
                                            px-3
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
                                            duration-300"
                                    >
                                        <span class="
                                            bg-[linear-gradient(319deg,#ffcccc_0%,#ff66cc_50%,#cc0066_100%)]
                                            bg-clip-text text-transparent
                                            group-hover:text-white
                                            dark:group-hover:text-gray-700
                                            transition-all
                                            duration-500"
                                        >
                                            Change Request
                                        </span>
                                    </a>
                                </div>
                            @endauth

                        @endforeach
                    </ul>
                @else
                    <p class="text-center text-gray-600">No results found.</p>
                @endif

                <!-- YouTube Player -->
                <div id="player" class="flex-1 justify-start rounded-lg mx-auto min-h-96 w-11/12 my-4"></div>

                <!-- Wyświetlanie Tekstu Piosenki -->
                <div id="lyrics" class="text-center text-lg font-bold mt-4 text-gray-800 dark:text-gray-100">Ładowanie tekstu...</div>
            </div>

            <!-- Sekcja Tekstów Piosenek -->
            <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md flex flex-col items-center">
                <button onclick="ShowLyrics()" class="
                        group
                        bg-white
                        dark:bg-gray-700
                        hover:bg-[linear-gradient(319deg,#ffcccc_0%,#ff66cc_50%,#cc0066_100%)]
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
                        duration-300"
                >
                    <span class="
                        bg-[linear-gradient(319deg,#ffcccc_0%,#ff66cc_50%,#cc0066_100%)]
                        bg-clip-text text-transparent
                        group-hover:text-white
                        dark:group-hover:text-gray-700
                        transition-all
                        duration-500"
                    >
                   🎶 Show Lyrics 🎶
                    </span>
                </button>
                <div id="Text" class="w-full hidden">
                    <ul class="space-y-2">
                        @foreach ($lyrics as $lyric)
                            <li class="border-b pb-2">
                                <span class="
                                    text-sm bg-[linear-gradient(319deg,#ffcccc_0%,#ff66cc_50%,#cc0066_100%)]
                                    bg-clip-text text-transparent ">
                                    🎶 {{ $lyric->TimeTe }}
                                </span>
                                <br>
                                <span class="text-gray-700 dark:text-gray-200 font-semibold ">🎤 {{ $lyric->RowTe }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Stopka -->
            <x-footer/>
        </div>
    </div>

    <!-- Skrypty JavaScript -->
    <script>
        // Dane JSON przekazywane z PHP
        var lyricsDataJson = @json($lyrics); // Przekazuje dane lyrics jako JSON
        var videoId = "{{ $results->first()->Ytlink ?? '' }}"; // Pobiera link do YouTube z pierwszego wyniku

        // Funkcja do konwersji czasu z formatu HH:mm:ss na sekundy
        function timeToSeconds(time) {
            const parts = time.split(':'); // Rozdziel na [HH, mm, ss]
            const hours = parseInt(parts[0], 10) || 0;
            const minutes = parseInt(parts[1], 10) || 0;
            const seconds = parseInt(parts[2], 10) || 0;
            return hours * 3600 + minutes * 60 + seconds;
        }

        // Przetwarzanie JSON na dane z czasem w sekundach
        const lyricsData = lyricsDataJson.map(item => ({
            time: timeToSeconds(item.TimeTe), // Czas w sekundach
            text: item.RowTe                 // Tekst piosenki
        }));

        // Pobierz element do wyświetlania tekstu
        const lyricsElement = document.getElementById('lyrics');

        // Funkcja do formatowania czasu w sekundach na format mm:ss
        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const remainingSeconds = seconds % 60;
            return `${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')}`;
        }

        // Funkcja do aktualizacji tekstu na podstawie czasu
        function updateLyrics(currentTime) {
            let currentLyric = null;
            let previousLyric = null;
            let nextLyric = null;

            // Znajdź odpowiedni fragment tekstu oraz rekord przed i po
            lyricsData.forEach((lyric, index) => {
                const next = lyricsData[index + 1];
                if (currentTime >= lyric.time && (!next || currentTime < next.time)) {
                    currentLyric = lyric;
                    previousLyric = lyricsData[index - 1] || null;
                    nextLyric = next || null;
                }
            });

            // Zaktualizuj wyświetlany tekst
            lyricsElement.innerHTML = '';

            if (previousLyric) {
                const formattedPreviousTime = formatTime(previousLyric.time);
                lyricsElement.innerHTML += `<div style="color: gray;">[${formattedPreviousTime}] ${previousLyric.text}</div>`;
            }

            if (currentLyric) {
                const formattedCurrentTime = formatTime(currentLyric.time);
                lyricsElement.innerHTML += `<div style="color: black; font-weight: bold;">[${formattedCurrentTime}] ${currentLyric.text}</div>`;
            } else {
                lyricsElement.innerHTML += `<div style="color: black;">🎵</div>`;
            }

            if (nextLyric) {
                const formattedNextTime = formatTime(nextLyric.time);
                lyricsElement.innerHTML += `<div style="color: gray;">[${formattedNextTime}] ${nextLyric.text}</div>`;
            }
        }

        // Załaduj API YouTube
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // Stwórz odtwarzacz YouTube
        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '390',
                width: '100%',
                videoId: videoId,
                playerVars: {
                    'playsinline': 1
                },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerReady(event) {
            event.target.playVideo();
            setInterval(() => {
                const currentTime = Math.floor(player.getCurrentTime()); // Aktualny czas w sekundach
                updateLyrics(currentTime);
            }, 1000); // Aktualizacja co 1 sekundę
        }

        function onPlayerStateChange(event) {
            // Możesz dodać dodatkową logikę tutaj, jeśli jest potrzebna
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const textDiv = document.getElementById("Text");
            if (textDiv) {
                textDiv.style.display = "none";
            }
        });

        function ShowLyrics() {
            var y = document.getElementById("Text");
            if (y.style.display === "none") {
                y.style.display = "block";
            } else {
                y.style.display = "none";
            }
        }
    </script>
@endsection
