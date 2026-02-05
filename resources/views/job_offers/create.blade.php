    <x-app-layout>
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="w-full max-w-md px-4">
                <div class="bg-white p-6 rounded-lg shadow-md" style="max-width: 400px; margin: 0 auto;">
                    <h1 class="text-xl font-semibold mb-1 text-gray-800 text-center">Create Job Offer</h1>
                    <p class="text-xs text-gray-500 text-center mb-5">Fill in the details below</p>

                    @if(session('success'))
                        <div class="bg-green-100 text-green-700 p-2 rounded-md mb-3 text-center text-xs">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('job_offers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                        @csrf

                        <div>
                            <input type="text" name="title" placeholder="Job Title"
                                class="w-full border border-gray-300 rounded-md px-4 py-4 mb-2 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm" required>
                        </div>

                        <div>
                            <textarea name="description" placeholder="Job Description" rows="3"
                                class="w-full border border-gray-300 rounded-md px-4 py-4 mb-2 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm resize-none" required></textarea>
                        </div>

                        <div>
                            <input type="text" name="company" placeholder="Company Name"
                                class="w-full border border-gray-300 rounded-md px-4 py-4 mb-2 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm" required>
                        </div>

                        <div>
                            <select name="contract_type"
                                class="w-full border border-gray-300 rounded-md px-4 py-4 mb-2 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-sm text-gray-700" required>
                                <option value="" class="text-gray-500">Select Contract Type</option>
                                <option value="CDI">CDI</option>
                                <option value="CDD">CDD</option>
                                <option value="Full-time">Full-time</option>
                                <option value="Stage">Stage</option>
                                <option value="Freelance">Freelance</option>
                            </select>
                        </div>

                        <div>
                            <input type="file" name="image"
                                class="w-full border border-gray-300 rounded-md px-3 py-1.5 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-xs file:mr-3 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>

                        <div class="pt-1">
                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md font-medium transition-colors duration-200 text-sm">
                                Create Job Offer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>