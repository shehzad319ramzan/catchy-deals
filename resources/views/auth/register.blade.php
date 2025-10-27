<x-layouts.login page-title="{{ __('register.register') }}">

    <x-auth.form form-action="{{ route('register', ['plan' => request()->plan, 'billing' => request()->billing]) }}">

        <x-auth.input-field type="text" name="first_name" id="first_name" required="true"
            place="{{ __('register.first_name_placeholder') }}" val="" extraclasses="mb-3"
            label="{{ __('register.first_name_label') }}" />

        <x-auth.input-field type="text" name="last_name" id="last_name" required="true"
            place="{{ __('register.last_name_placeholder') }}" val="" extraclasses="mb-3"
            label="{{ __('register.last_name_label') }}" />

        <x-auth.input-field type="text" name="email" id="email" required="true"
            place="{{ __('register.email_placeholder') }}" val="" extraclasses="mb-3"
            label="{{ __('register.email_label') }}" />

        <div class="mb-3">
            <div class="password-field position-relative">
                <x-auth.input-field type="password" name="password" id="password" required="true"
                    place="{{ __('register.password_placeholder') }}" val=""
                    label="{{ __('register.password_label') }}" />
                <span><i class="bi bi-eye-slash passwordToggler"></i></span>
            </div>
        </div>

        <div class="mb-3">
            <div class="password-field position-relative">
                <x-auth.input-field type="password" name="password_confirmation" id="password_confirmation"
                    required="true" place="{{ __('register.password_placeholder') }}" val=""
                    label="{{ __('register.confirm_password_label') }}" />
                <span><i class="bi bi-eye-slash passwordToggler"></i></span>
            </div>
        </div>

        <div class="d-grid">
            <x-auth.input-button btn-class="mb-3" btn-type="submit"
                btn-value="{{ __('register.create_account_button') }}" />
        </div>

    </x-auth.form>

    <div class="text-center ">
        <p class="mb-0">
            {{ __('register.already_have_account') }}
            <x-auth.href-link link-href="{{ route('login') }}" link-value="{{ __('register.sign_in') }}" />
        </p>
    </div>
</x-layouts.login>
