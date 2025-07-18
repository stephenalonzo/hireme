<x-layout>
    <section class="p-6">
        <div class="mx-auto w-full max-w-2xl space-y-4 lg:py-16">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 dark:text-white">Create job listing</h2>
            @if (session()->has('method_boolean'))
                <div>
                    <h2 class="sr-only">Steps</h2>

                    <div
                        class="relative after:absolute after:inset-x-0 after:top-1/2 after:block after:h-0.5 after:-translate-y-1/2 after:rounded-lg after:bg-gray-100">
                        <ol class="relative z-10 flex justify-between text-sm font-medium text-gray-500">
                            <li class="flex items-center gap-2 bg-white p-2">
                                <span class="rounded-full bg-blue-600 text-[10px]/6 text-white">
                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                                {{-- <span
                                    class="size-6 rounded-full bg-blue-600 text-center text-[10px]/6 font-bold text-white">
                                    1
                                </span> --}}

                                <span class="hidden sm:block"> Company Details </span>
                            </li>

                            <li class="flex items-center gap-2 bg-white p-2">
                                <span class="size-6 rounded-full bg-gray-100 text-center text-[10px]/6 font-bold"> 2
                                </span>

                                <span class="hidden sm:block"> Job Details </span>
                            </li>
                        </ol>
                    </div>
                </div>
            @endif
            @guest
                <div>
                    <h2 class="sr-only">Steps</h2>
                    <div
                        class="relative after:absolute after:inset-x-0 after:top-1/2 after:block after:h-0.5 after:-translate-y-1/2 after:rounded-lg after:bg-gray-100">
                        <ol class="relative z-10 flex justify-between text-sm font-medium text-gray-500">
                            <li class="flex items-center gap-2 bg-white p-2">
                                <span class="rounded-full bg-blue-600 text-white">
                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>

                                <span class="hidden sm:block"> Company Details </span>
                            </li>

                            <li class="flex items-center gap-2 bg-white p-2">
                                <span class="size-6 rounded-full bg-gray-100 text-center text-[10px]/6 font-bold"> 2 </span>

                                <span class="hidden sm:block"> Job Details </span>
                            </li>
                        </ol>
                    </div>
                </div>
            @endguest
            <h5 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Job Details</h5>
            <form action="/post-job/store" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="job_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                            Title</label>
                        <input type="text" name="job_title" id="job_title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: Pharmacy Technician..." required>
                    </div>
                    <div class="w-full">
                        <label for="job_type"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select name="job_category" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Select job category</option>
                            <option value="1">Arts, Design, Entertainment, Sports and Media</option>
                            <option value="2">Computer and Mathematical</option>
                            <option value="3">Education, Training and Library</option>
                            <option value="4">Office and Administrative Support</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="opening_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Opening Date of
                            Announcement</label>
                        <input type="date" name="opening_date" id="opening_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                    </div>
                    <div class="w-full">
                        <label for="closing_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Closing Date of
                            Announcement</label>
                        <input type="date" name="closing_date" id="closing_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                    </div>
                    <div class="w-full">
                        <label for="location"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                        <input type="text" name="location" id="location"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: Building 670, Garapan, Saipan, MP 96950" required>
                    </div>
                    <div class="w-full">
                        <label for="hourly_wage"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hourly Wage</label>
                        <input type="text" name="hourly_wage" id="hourly_wage"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: $10/hour..." required>
                    </div>
                    <div class="w-full">
                        <label for="payment_frequency"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment
                            Frequency</label>
                        <input type="text" name="payment_frequency" id="payment_frequency"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: Bi-weekly..." required>
                    </div>
                    <div class="w-full">
                        <label for="job_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                            Type</label>
                        <select name="job_type" id="job_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option disabled selected>Select job type</option>
                            <option value="1">Full Time</option>
                            <option value="2">Part-Time</option>
                            <option value="3">Contract</option>
                            <option value="4">Internship</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="work_hours"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work Hours per
                            day</label>
                        <input type="text" name="work_hours[]" id="work_hours"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: 8 hours/day..." required>
                    </div>
                    <div class="w-full">
                        <label for="work_hours"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Work Hours per
                            week</label>
                        <input type="text" name="work_hours[]" id="work_hours"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: 40 hours/week..." required>
                    </div>
                    <div class="w-full">
                        <label for="work_days"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Works Days per
                            week</label>
                        <input type="text" name="work_days" id="work_days"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: Mon-Fri..." required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="qualifications"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job Qualification
                            Requirements</label>
                        <input type="text" name="qualifications" id="qualifications"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: Bachelor's Degree, 6-8 years of experience in..." required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="job_description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                            Description</label>
                        <textarea name="job_description" id="job_description" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Your description here"></textarea>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Submit
                </button>
            </form>
        </div>
    </section>
</x-layout>
