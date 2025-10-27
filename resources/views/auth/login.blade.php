<x-layouts.login page-title="{{ __('login.login') }}">

    <x-auth.form form-action="{{ route('login') }}">

        <x-auth.input-field type="email" name="email" id="email" required="true"
            place="{{ __('login.email_placeholder') }}" val="" extraclasses="mb-3"
            label="{{ __('login.email_label') }}" />

        <div class="mb-3">
            <div class="password-field position-relative">
                <x-auth.input-field type="password" name="password" id="password" required="true"
                    place="{{ __('login.password_placeholder') }}" val=""
                    label="{{ __('login.password_label') }}" />
                <span><i class="bi bi-eye-slash passwordToggler"></i></span>
            </div>
        </div>

        <div class="my-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    {{ __('login.agree_terms') }}
                    <x-auth.href-link link-href="#"
                        link-value="{{ __('login.terms_of_use', ['app_name' => config('app.name')]) }}" />
                    <x-auth.href-link link-href="#" link-value="{{ __('login.privacy_policy') }}" />
                </label>
            </div>
        </div>

        <div class="d-grid">
            <x-auth.input-button btn-class="mb-3" btn-type="submit" btn-value="{{ __('login.login_button') }}" />
        </div>
    </x-auth.form>

    @if (Route::has('register'))
        <div class="text-center ">
            <p class="mb-0">
                {{ __('login.dont_have_account') }}
                <x-auth.href-link link-href="{{ route('register') }}" link-value="{{ __('login.sign_up') }}" />
            </p>
        </div>
    @endif

    @if (Route::has('password.request'))
        <div class="text-center mt-3">
            <x-auth.href-link link-href="{{ route('password.request') }}"
                link-value="{{ __('login.forgot_password') }}" />
        </div>
    @endif

</x-layouts.login>
