<x-layouts.login page-title="Verify Email">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <x-auth.form form-action="{{ route('password.email') }}">
        <x-auth.input-field type="email" name="email" id="email" required="true" place="Enter your email"
            val="" extraclasses="mb-3" label="e-Mail" />

        <div class="d-grid">
            <x-auth.input-button btn-class="mb-3" btn-type="submit" btn-value="{{ __('Send Password Reset Link') }}" />
        </div>
    </x-auth.form>
</x-layouts.login>
