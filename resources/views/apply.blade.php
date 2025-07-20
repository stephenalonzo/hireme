<x-layout>
    <section class="p-6 min-h-screen">
        <div class="mx-auto w-full max-w-2xl space-y-6 lg:py-16">
            <div class="space-y-2">
                <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900dark:text-white">Application
                    for
                    Job Listing</label>
                <a href="/job/{{ $listing->id }}" class="underline underline-offset-2"
                    target="_blank">{{ $listing->uid }}</a>
            </div>
            <h2 class="mb-4 text-3xl font-bold text-gray-900 dark:text-white">Submit an Application</h2>
            <h5 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Contact Information</h5>
            <form action="/job/apply/submit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="applicant_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full
                            Name</label>
                        <input type="text" name="applicant_name" id="applicant_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Enter full name" value="{{ auth()->check() ? auth()->user()->name : '' }}"
                            required>
                    </div>
                    <div class="w-full">
                        <input type="text" name="listing_id" class="hidden" readonly value="{{ $listing->id }}">
                        <label for="applicant_email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                            Address</label>
                        <input type="email" name="applicant_email" id="applicant_email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Enter email address" value="{{ auth()->check() ? auth()->user()->email : '' }}"
                            required>
                    </div>
                    <div class="w-full">
                        <label for="applicant_phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                            Number</label>
                        <input type="text" name="applicant_phone" id="applicant_phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Enter phone number" required>
                    </div>
                    <div class="w-full">
                        <label for="applicant_address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input type="text" name="applicant_address" id="applicant_address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Enter your address" required>
                    </div>
                    <div class="w-full">
                        <label for="applicant_resume"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload your
                            resume</label>
                        <input type="file" name="applicant_resume" id="applicant_resume"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            required>
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
