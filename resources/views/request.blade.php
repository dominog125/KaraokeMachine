@extends('include.layout')
@section('title', 'Change text Proposal')

@section('body')
    <x-navbar />

    <!-- Main Content -->
    <div class="flex-1 flex items-center justify-center py-16 relative">
        <!-- Main Section -->
        <div class="bg-white p-8 shadow-2xl flex-col rounded-lg grid grid-cols-1 lg:grid-cols-2 gap-6 w-[70%]">
            <!-- Left Section: Submit Request Form -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4 text-center">Submit a Change Request</h2>

                @auth
                <form action="{{ route('requests.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Hidden Song ID -->
                    <input type="hidden" name="IDSong" value="{{ $song_id }}">

                    <!-- Row Content -->
                    <div>
                        <label for="RowPr" class="block text-gray-700 font-medium">Row Content:</label>
                        <textarea id="RowPr" name="RowPr" rows="3" 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-500 focus:outline-none" 
                            required></textarea>
                    </div>

                    <!-- Time -->
                    <div>
                        <label for="TimePr" class="block text-gray-700 font-medium">Time (HH:MM:SS):</label>
                        <input type="text" id="TimePr" name="TimePr" 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-500 focus:outline-none" 
                            required>
                    </div>

                    <!-- Change Type -->
                    <div>
                        <label for="ChangeType" class="block text-gray-700 font-medium">Change Type:</label>
                        <select id="ChangeType" name="ChangeType" 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-500 focus:outline-none" 
                            required onchange="toggleOldFields(this.value)">
                            <option value="new_text">New Lyrics</option>
                            <option value="change_text">Change Lyrics</option>
                        </select>
                    </div>

                    <!-- Old Content Fields -->
                    <div id="oldFields" class="space-y-4" style="display: none;">
                        <div>
                            <label for="RowPrOld" class="block text-gray-700 font-medium">Old Row Content:</label>
                            <textarea id="RowPrOld" name="RowPrOld" rows="3" 
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-500 focus:outline-none"></textarea>
                        </div>
                        <div>
                            <label for="TimePrOld" class="block text-gray-700 font-medium">Old Time (HH:MM:SS):</label>
                            <input type="text" id="TimePrOld" name="TimePrOld" 
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md">
                        Submit Request
                    </button>
                </form>

                <script>
                    function toggleOldFields(value) {
                        const oldFields = document.getElementById('oldFields');
                        oldFields.style.display = (value === 'change_text') ? 'block' : 'none';
                    }
                </script>
                @endauth

                @guest
                <p class="text-gray-600 text-center">
                    You must be logged in to access this form. 
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Log in</a>
                </p>
                @endguest
            </div>

            <!-- Right Section: Information -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4 text-center">How to Use the Form</h2>
                <p>Use this form to submit a request for changes to song lyrics. Provide the required information, such as the row content, time, and the type of change you want to make.</p>
                <p class="mt-4">If you're modifying existing lyrics, ensure you include the original row content and time for better accuracy during review.</p>
                <p class="mt-4">Please keep in mind that any type of "troling" or harasment will not be tolerated and will be dealt with accordingly.</p>
                <p class="mt-4 font-semibold">Thank you for helping improve our platform! 🎤</p>
            </div>

            <!-- Footer -->
            <x-footer/>
            
        </div>
    </div>
@endsection
