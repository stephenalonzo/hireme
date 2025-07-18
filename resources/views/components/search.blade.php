<section class="p-6">
    <div class="mx-auto w-full md:max-w-xl">
        @if (Route::currentRouteName() === 'Home')
            <form action="" method="GET">
                @csrf
                <div class="flex flex-col items-center w-full space-y-3 md:items-start">
                    <div class="relative w-full">
                        <input type="search" name="job"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-tl-gray-50 border-bl-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Search job title, company..." value="{{ request('job') }}" />
                        <button type="submit"
                            class="absolute top-0 end-0 p-2.5 text-sm w-12 flex items-center justify-center font-medium h-full text-white bg-blue-600 rounded-e-lg border border-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-800 hover:cursor-pointer">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                    <div class="flex flex-col items-center w-full space-y-3 md:space-x-3 md:flex-row md:space-y-0">
                        <select name="job_category" id=""
                            class="w-full text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 md:w-48 md:text-start">
                            <option disabled selected>Categories</option>
                            <option value="1" {{ request('job_category') == 1 ? 'selected' : '' }}>Arts, Design,
                                Entertainment, Sports and Media</option>
                            <option value="2" {{ request('job_category') == 2 ? 'selected' : '' }}>Computer and
                                Mathematical</option>
                            <option value="3" {{ request('job_category') == 3 ? 'selected' : '' }}>Education,
                                Training and Library</option>
                            <option value="4" {{ request('job_category') == 4 ? 'selected' : '' }}>Office and
                                Administrative Support</option>
                        </select>
                        <select name="job_type" id=""
                            class="w-full text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 md:w-48 md:text-start">
                            <option disabled selected>Job Types</option>
                            <option value="1" {{ request('job_type') == 1 ? 'selected' : '' }}>Full Time</option>
                            <option value="2" {{ request('job_type') == 2 ? 'selected' : '' }}>Part-Time</option>
                            <option value="3" {{ request('job_type') == 3 ? 'selected' : '' }}>Contract</option>
                            <option value="4" {{ request('job_type') == 4 ? 'selected' : '' }}>Internship</option>
                        </select>
                        <select name="sort_by" id=""
                            class="w-full text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 md:w-48 md:text-start">
                            <option disabled selected>Sort By</option>
                            <option value="1" {{ request('sort_by') == 1 ? 'selected' : '' }}>A-Z</option>
                            <option value="2" {{ request('sort_by') == 2 ? 'selected' : '' }}>Z-A</option>
                            <option value="3" {{ request('sort_by') == 3 ? 'selected' : '' }}>Date Posted</option>
                        </select>
                    </div>
                </div>
            </form>
        @endif
        @if (Route::currentRouteName() === 'Companies')
            <form action="" method="GET">
                @csrf
                <div class="flex flex-col items-center w-full space-y-3 md:items-start">
                    <div class="relative w-full">
                        <input type="search" name="company"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-tl-gray-50 border-bl-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Search a company" />
                        <button type="submit"
                            class="absolute top-0 end-0 p-2.5 text-sm w-12 flex items-center justify-center font-medium h-full text-white bg-blue-600 rounded-e-lg border border-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-800 hover:cursor-pointer">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>
        @endif
    </div>
</section>
