@extends('include/layout')
@section('title','Home 🐒')
@section('body')
    <x-navbar />

    <div class="flex-1 flex top-[30px] items-center justify-center py-16 relative">
        <!-- Główna sekcja -->
        <div class="bg-white p-8 shadow-2xl flex-col rounded-lg grid grid-cols-1 md:grid-cols-1 gap-6 w-[70%] items-center ">
            @auth
            <form action="{{ route('requests.store') }}" method="POST">
                @csrf
                <div>
                    <label for="IDSong">Song ID:</label>
                    <input type="number" id="IDSong" name="IDSong" required>
                </div>
                <div>
                    <label for="RowPr">Row Content:</label>
                    <textarea id="RowPr" name="RowPr" required></textarea>
                </div>
                <div>
                    <label for="TimePr">Time :</label>
                    <input type="number" id="TimePr" name="TimePr" step="1" required>
                </div>
                <div>
                    <label for="ChangeType">Change Type:</label>
                    <select id="ChangeType" name="ChangeType" required onchange="toggleOldFields(this.value)">
                        <option value="new_text">New Text</option>
                        <option value="change_text">Change Text</option>
                    </select>
                </div>
                <div id="oldFields" style="display: none;">
                    <div>
                        <label for="RowPrOld">Old Row Content:</label>
                        <textarea id="RowPrOld" name="RowPrOld"></textarea>
                    </div>
                    <div>
                        <label for="TimePrOld">Old Time (HH:MM:SS):</label>
                        <input type="number" id="TimePrOld" name="TimePrOld" step="1">
                    </div>
                </div>
                <button type="submit">Submit Request</button>
            </form>

            <script>
                function toggleOldFields(value) {
                    const oldFields = document.getElementById('oldFields');
                    if (value === 'change_text') {
                        oldFields.style.display = 'block';
                    } else {
                        oldFields.style.display = 'none';
                    }
                }
            </script>
            @endauth

                @guest
                    <p class="text-gray-600">You must be logged in to access this form. <a href="{{ route('login') }}" class="text-blue-500">Log in</a></p>
                @endguest

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
