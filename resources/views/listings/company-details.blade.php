<x-layout>
    <section class="p-6">
        <div class="mx-auto w-full max-w-2xl space-y-4 lg:py-16">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 dark:text-white">Create job listing</h2>
            <div>
                <h2 class="sr-only">Steps</h2>

                <div
                    class="relative after:absolute after:inset-x-0 after:top-1/2 after:block after:h-0.5 after:-translate-y-1/2 after:rounded-lg after:bg-gray-100">
                    <ol class="relative z-10 flex justify-between text-sm font-medium text-gray-500">
                        <li class="flex items-center gap-2 bg-white p-2">
                            <span class="size-6 rounded-full bg-blue-600 text-center text-[10px]/6 font-bold text-white">
                                1
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
            <h5 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Job Details</h5>
            <form action="/post-job/company-details" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="company_logo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Company
                            Logo</label>
                        <input type="file" name="company_logo" id="company_logo"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>
                    <div class="w-full">
                        <label for="company_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company
                            Name</label>
                        <input type="text" name="company_name" id="company_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: My Company, Inc." value="{{ old('company_name') }}" required>
                        @error('company_name')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="company_website"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company Website</label>
                        <input type="text" name="company_website" id="company_website"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: www.mycompanywebsite.com" value="{{ old('company_website') }}" required>
                        @error('company_website')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="company_email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company Email
                            Address</label>
                        <input type="email" name="company_email" id="company_email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: mycompany@email.com" value="{{ old('company_email') }}" required>
                        @error('company_email')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="company_phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company Phone
                            Number</label>
                        <input type="text" name="company_phone" id="company_phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: 670-123-4567" value="{{ old('company_phone') }}" required>
                        @error('company_phone')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="company_address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company Address</label>
                        <input type="text" name="company_address" id="company_address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: Some Street, Garapan, Saipan, MP 96950"
                            value="{{ old('company_address') }}" required>
                        @error('company_address')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @if ((Auth::check() && ($user->company_id ?? []) === null) || !Auth::check())
                    <h5 class="my-4 text-lg font-medium text-gray-900 dark:text-white">Your Account Details</h5>
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="w-full">
                            <label for="full_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full
                                Name</label>
                            <input type="text" name="name" id="full_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Enter full name" value="{{ old('name') }}" required>
                            @error('name')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                Address</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Enter your email address" value="{{ old('email') }}" required>
                            @error('email')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                        <div class="w-full">
                            <label for="password_confirm"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation" id="password_confirm"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>
                    </div>
                @endif
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Submit
                </button>
            </form>
        </div>
    </section>
</x-layout>
