<x-layout>
    <section class="p-6">
        <div class="relative overflow-x-auto mx-auto w-full max-w-2xl lg:py-16">
            <table
                class="w-full text-sm text-left border border-gray-200 rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            UID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Job Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Resume
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applicant->listings ?? [] as $listing)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $listing->uid }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $listing->job_title }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ asset('storage/' . $applicant->applicant_resume) }}">View Resume</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-layout>
