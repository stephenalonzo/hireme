<x-layout>
    <x-search></x-search>
    <section class="p-6">
        <div class="mx-auto w-full md:max-w-7xl">
            <div class="grid gap-6 lg:grid-cols-2">
                @unless (count($listings) == 0)
                    @foreach ($listings as $listing)
                        <div
                            class="max-w-full p-6 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                            <div class="space-y-2">
                                <p class="text-sm text-gray-400">{{ $listing->uid }}</p>
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $listing->job_title }}
                                </h5>
                                <div
                                    class="flex @switch($listing->job_category)
                                            @case(1)
                                                {{ 'flex-col items-start space-x-0 space-y-3 md:flex-row md:items-center md:space-x-3 md:space-y-0' }}
                                            @break
                                            @default
                                            {{ 'items-center space-x-3' }}
                                        @endswitch">
                                    <span class="px-2 py-1 text-sm rounded-md bg-gray-200">
                                        @switch($listing->job_type)
                                            @case(1)
                                                {{ 'Full-Time' }}
                                            @break

                                            @case(2)
                                                {{ 'Part-Time' }}
                                            @break

                                            @case(3)
                                                {{ 'Contract' }}
                                            @break

                                            @case(4)
                                                {{ 'Internship' }}
                                            @break

                                            @default
                                        @endswitch
                                    </span>
                                    <span class="px-2 py-1 text-sm rounded-md bg-gray-200">
                                        @switch($listing->job_category)
                                            @case(1)
                                                {{ 'Arts, Design, Entertainment, Sports and Media' }}
                                            @break

                                            @case(2)
                                                {{ 'Computer and Mathematical' }}
                                            @break

                                            @case(3)
                                                {{ 'Education, Training and Library' }}
                                            @break

                                            @case(4)
                                                {{ 'Office and Administrative Support' }}
                                            @break

                                            @default
                                        @endswitch
                                    </span>
                                </div>
                            </div>
                            <ul class="flex flex-wrap items-center space-x-5">
                                @foreach ($listing->companies as $company)
                                    <li class="text-sm">{{ $company->company_name }}</li>
                                @endforeach
                                <li class="text-sm list-disc">
                                    {{ $listing->hourly_wage }}
                                </li>
                            </ul>
                            <a href="/job/{{ $listing->id }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                Apply
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                @else
                    @if (request('job'))
                        <div class="col-span-2">
                            <p class="text-center">No search results for {{ request('job') }}.</p>
                        </div>
                    @else
                        <div class="col-span-2">
                            <p class="text-center">No active job listings found.</p>
                        </div>
                    @endif
                @endunless
            </div>
        </div>
    </section>
</x-layout>
