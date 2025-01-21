@extends('include/layout')
@section('title','Home 🐒')
@section('body')
    <x-navbar />

    <div class="flex-1 flex top-[30px] items-center justify-center py-16 relative">
        <!-- Główna sekcja -->
        <div class="bg-white p-8 shadow-2xl flex-col rounded-lg grid grid-cols-1 md:grid-cols-1 gap-6 w-[70%] ">


            @auth
                <div class="flex justify-end mb-4">
                    <a href="" class="rounded-md px-4 py-2 bg-blue-500 text-white font-semibold hover:bg-blue-600 transition-all duration-300">
                        Change Request
                    </a>
                </div>
            @endauth
            @guest
                <div class="mt-4 text-left">
                    <p class="text-gray-600">Zaloguj się, aby uzyskać dostęp do formularza.</p>
                </div>
            @endguest


            @if (count($results) > 0)
                <ul>
                    @foreach ($results as $result)


                        <x-song_card :id="$result->ID" :title="$result->Title" :category="$result->category_name" :author="$result->author_name" />
                    @endforeach
                </ul>

            @else
                <p>No results found.</p>
            @endif
                <div id="player"></div>
                <div id="lyrics" style="font-size: 24px; font-weight: bold; margin: 20px; text-align: center; color: black;">Ładowanie tekstu...</div>

            <script>
                // Dane JSON przekazywane z PHP
                var lyricsDataJson = @json($lyrics); // Przekazuje dane lyrics jako JSON
                var videoId = "{{ $result->Ytlink }}"; // Pobiera link do YouTube z wyniku

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
                        lyricsElement.style.color = "black"; // Aktywny tekst zmienia kolor na czerwony
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
                        width: '640',
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
                    }, 100); // Aktualizacja co 100 ms
                }

                function onPlayerStateChange(event) {
                    // Możesz dodać dodatkową logikę tutaj, jeśli jest potrzebna
                }
            </script>
            <button onclick="ShowLyrics()">Show Lyrics</button>

            <div id="Text" style="display: none;">
                <ul>

                    @foreach ($lyrics as $lyric)
                        <li>
                            {{$lyric->TimeTe}}<br>
                            {{$lyric->RowTe}}
                        </li>
                    @endforeach

                </ul>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const textDiv = document.getElementById("text");
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



            <!-- Stopka -->
            <footer class="p-6 rounded-lg shadow-md col-span-full md:grid-cols-1 py-8 text-center text-sm bg-gray-100 dark:bg-gray-800 dark:text-gray-400 mt-4">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})

                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-red-600 ring-1 ring-gray-400 font-black transition-all duration-300 hover:text-white hover:ring-red-600 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Log in
                </a>
                <a href="{{ route('registration') }}" class="rounded-md px-3 py-2 text-red-600 ring-1 ring-gray-400 font-black transition-all duration-300 hover:text-white hover:ring-red-600 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Register
                </a>

            </footer>
        </div>
    </div>




@endsection
