{{-- <x-layouts.login page-title="Verify your account">
    @if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
    @endif

    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},

    <x-auth.form form-action="{{ route('verification.resend') }}">
        <div class="d-grid">
            <x-auth.input-button btn-class="mb-3 mt-3" btn-type="submit"
                btn-value="{{ __('Click here to request another') }}" />
        </div>
    </x-auth.form>

</x-layouts.login> --}}



<x-layouts.login page-title="{{ __('verify.verify_account') }}">
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('verify.resent') }}
        </div>
    @endif

    {{ __('verify.check_email') }}
    {{ __('verify.did_not_receive') }},

    <x-auth.form form-action="{{ route('verification.resend') }}">
        <div class="d-grid">
            <x-auth.input-button btn-class="mb-3 mt-3" btn-type="submit" btn-value="{{ __('verify.click_to_resend') }}" />
        </div>
    </x-auth.form>
</x-layouts.login>
