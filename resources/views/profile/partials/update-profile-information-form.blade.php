<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <h3 class="mt-1 text-1xl text-gray-600 dark:text-gray-400 mb-3">
            {{ __("Update your account's profile information and email address.") }}
        </h3>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            @if (Auth::user()->profile_pic)
                <img class="rounded-full w-96 h-96 bg-gray-700 dark:bg-white" src="{{ asset(Auth::user()->profile_pic) }}" alt="Profile Photo">
            @else
                <img class="rounded-full w-96 h-96 bg-gray-700  dark:bg-white" src="{{ asset('assets/images/DepEd-Logo.png') }}" alt="Profile Photo">
            @endif
        </div>
        <div>        
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="profile_pic"accept="image/*">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG or GIF (MAX. 800x400px).</p>
              </div>
        <div>
            <x-input-label for="lname" :value="__(' Last Name')" />
            <x-text-input id="lname" name="lname" type="text" class="mt-1 block w-full" :value="old('lname', $user->lname)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('lname')" />
        </div>
        <div>
            <x-input-label for="middlename" :value="__('Middle Name')" />
            <x-text-input id="middlename" name="middlename" type="text" class="mt-1 block w-full" :value="old('middlename', $user->middlename)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('middlename')" />
        </div>
        <div>
            <x-input-label for="fname" :value="__('First  Name')" />
            <x-text-input id="fname" name="fname" type="text" class="mt-1 block w-full" :value="old('fname', $user->fname)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('fname')" />
        </div>
        <div>
            <x-input-label for="contact_num" :value="__('Contact Number')" />
            <x-text-input id="contact_num" name="contact_num" type="text" class="mt-1 block w-full" :value="old('contact_num', $user->contact_num)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('contact_num')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save Changes') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
