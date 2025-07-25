<x-layout>
    <section class="p-6 min-h-screen">
        <div class="mx-auto w-full md:max-w-3xl">
            <div class="flex flex-col items-start space-y-4">
                <div class="space-y-3">
                    <div class="space-y-2">
                        <div class="flex flex-wrap items-center space-x-3">
                            <a href="/?_token={{ CSRF_TOKEN() }}&job={{ str_replace('#', '%23', $listing->uid) }}"
                                class="text-sm text-gray-400">{{ $listing->uid }}</a>
                        </div>
                        <h3 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $listing->job_title }}
                        </h3>
                        <div
                            class="flex @switch($listing->job_category)
                                            @case(1)
                                                {{ 'flex-col items-start space-x-0 space-y-2 md:flex-row md:items-center md:space-x-3 md:space-y-0' }}
                                            @break
                                            @default
                                            {{ 'items-center space-x-3' }}
                                        @endswitch">
                            <a href="/?_token={{ CSRF_TOKEN() }}&job_type={{ $listing->job_type }}"
                                class="px-2 py-1 text-sm rounded-md bg-gray-200">
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
                            </a>
                            <a href="/?_token={{ CSRF_TOKEN() }}&job_category={{ $listing->job_category }}"
                                class="px-2 py-1 text-sm rounded-md bg-gray-200">
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
                            </a>
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
                </div>
                @unless (count($listing->applicants) == 0)
                    @if ($listing->applicants->contains('applicant_name', auth()->user()->name ?? false))
                        <span
                            class="w-full text-center bg-gray-200 text-gray-500 dark:text-white focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none dark:focus:ring-gray-800">Applied</span>
                    @else
                        <a href="/job/{{ $listing->id }}/apply"
                            class="px-4 py-2 rounded-md bg-blue-600 text-white w-full text-center">Apply Now</a>
                    @endif
                @else
                    <a href="/job/{{ $listing->id }}/apply"
                        class="px-4 py-2 rounded-md bg-blue-600 text-white w-full text-center">Apply Now</a>
                @endunless
                <hr class="opacity-20 w-full">
                <div class="space-y-2">
                    <h5 class="font-bold text-xl mt-2">Job description</h5>
                    <p>{{ $listing->job_description }}</p>
                </div>
                <div class="space-y-2">
                    <h5 class="font-bold text-xl">Details</h5>
                    <p class="font-medium">Opening Date & Closing Date of Announcement</p>
                    <ul class="list-disc list-inside">
                        <li>{{ date('F d, Y', strtotime($listing->opening_date)) }} -
                            {{ date('F d, Y', strtotime($listing->closing_date)) }}</li>
                    </ul>
                    <p class="font-medium">Location</p>
                    <ul class="list-disc list-inside">
                        <li>{{ $listing->location }}</li>
                    </ul>
                    <p class="font-medium">Work Days per week</p>
                    <ul class="list-disc list-inside">
                        <li>{{ $listing->work_days }}</li>
                    </ul>
                    <p class="font-medium">Estimated Work Hours per day (w/ per week)</p>
                    <ul class="list-disc list-inside">
                        @foreach ($listing->work_hours as $work_hours)
                            <li>{{ $work_hours }}</li>
                        @endforeach
                    </ul>
                    <p class="font-medium">Payment Frequency</p>
                    <ul class="list-disc list-inside">
                        <li>{{ $listing->payment_frequency }}</li>
                    </ul>
                    <p class="font-medium">Job Qualification Requirements</p>
                    <ul class="list-disc list-inside">
                        <li>{{ $listing->qualifications }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</x-layout>
