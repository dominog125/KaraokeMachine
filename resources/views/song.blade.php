@extends('include/layout')
@section('title','Home 🎤')
@section('body')
    <!-- Nawigacja -->
    <x-navbar />

    <!-- Główna zawartość -->
    <div class="flex-1 flex items-center justify-center py-16 relative">
        <!-- Główna sekcja -->
        <div class="bg-white p-8 shadow-2xl flex-col rounded-lg grid grid-cols-1 lg:grid-cols-2 gap-6 w-[70%]">
            <!-- Sekcja Utwory i Player -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col ">
                <!-- Lista Utworów -->
                @if (count($results) > 0)
                    <ul class="flex-1">
                        @foreach ($results as $result)
                            <x-song_card :id="$result->ID" :title="$result->Title" :category="$result->category_name" :author="$result->author_name" />
                            @auth
                                <div class="flex justify-center mb-4">
                                    <a href="{{ route('requests.create', [$result->ID]) }}" class="flex mx-auto w-11/12 items-center border border-gray-200 rounded-lg shadow-md hover:shadow-lg overflow-hidden transform hover:scale-105 hover:border-gray-300 px-3 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white font-semibold transition-all duration-300">
                                        Change Request
                                    </a>
                                </div>
                            @endauth
                            @guest
                                <div class="flex justify-end mb-4">
                                    <p class="text-gray-600">Zaloguj się, aby uzyskać dostęp do formularza.</p>
                                </div>
                            @endguest
                        @endforeach
                    </ul>
                @else
                    <p class="text-center text-gray-600">No results found.</p>
                @endif

                <!-- YouTube Player -->
                <div id="player" class="flex justify-center my-4"></div>

                <!-- Wyświetlanie Tekstu Piosenki -->
                <div id="lyrics" class="text-center text-lg font-bold mt-4 text-gray-800">Ładowanie tekstu...</div>
            </div>

            <!-- Sekcja Tekstów Piosenek -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md flex flex-col items-center">
                <button onclick="ShowLyrics()" class="mb-4 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition-all duration-300">
                    Show Lyrics
                </button>
                <div id="Text" class="w-full hidden">
                    <ul class="space-y-2">
                        @foreach ($lyrics as $lyric)
                            <li class="border-b pb-2">
                                <span class="text-sm text-gray-500">{{ $lyric->TimeTe }}</span><br>
                                <span class="text-gray-700">{{ $lyric->RowTe }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Stopka -->
            <footer class="p-6 rounded-lg shadow-md col-span-full py-8 text-center text-sm bg-gray-100 dark:bg-gray-800 dark:text-gray-400 mt-4">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
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
            // Znajdź odpowiedni fragment tekstu
            const currentLyric = lyricsData.find((lyric, index) => {
                const nextLyric = lyricsData[index + 1];
                return currentTime >= lyric.time && (!nextLyric || currentTime < nextLyric.time);
            });

            // Jeśli nie znaleziono żadnego fragmentu tekstu
            if (!currentLyric) {
                lyricsElement.innerHTML = '🎵'; // Wyświetl ikonę nuty
                lyricsElement.style.color = "black"; // Kolor domyślny dla nuty
            } else {
                // Wyświetl pasujący fragment tekstu
                const formattedTime = formatTime(currentTime);
                lyricsElement.innerHTML = `[${formattedTime}] ${currentLyric.text}`; // Wyświetla czas i tekst
                lyricsElement.style.color = "black"; // Aktywny tekst zmienia kolor na czarny
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