<x-layout>
    <x-search></x-search>
    <section class="p-6">
        <div class="mx-auto w-full md:max-w-xl lg:max-w-4xl">
            <div class="grid gap-6 lg:grid-cols-2">
                @unless (count($companies) == 0)
                    @foreach ($companies as $company)
                        <div
                            class="max-w-full p-6 flex items-center justify-between bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                            <img src="{{ $company->company_logo ? asset('storage/') . '/' . $company->company_logo : '' }}"
                                class="w-16" alt="">
                            <div class="flex flex-col items-end justify-between">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $company->company_name }}
                                </h5>
                                <a href="/?job={{ $company->company_name }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                    View Jobs
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-2">
                        <p class="text-center">No active job listings found.</p>
                    </div>
                @endunless
            </div>
        </div>
    </section>
</x-layout>
