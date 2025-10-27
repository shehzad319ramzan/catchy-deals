<x-layouts.auth page-title="Create new user">
    <x-auth.card card-header="Create new user" header-button="true">
        <x-auth.form form-action="{{ route('users.store') }}" enctype="true">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <x-auth.input-field type="text" name="username" id="username" required="true"
                                place="{{ __('login.username_placeholder') }}" val="" extraclasses="mb-3"
                                label="{{ __('login.username_label') }}" />
                        </div>

                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="f_name" id="f_name" required="true"
                                place="{{ __('login.first_name_placeholder') }}" val="" extraclasses="mb-3"
                                label="{{ __('login.first_name_label') }}" />
                        </div>
                        <div class="col-md-6">
                            <x-auth.input-field type="text" name="l_name" id="l_name" required="true"
                                place="{{ __('login.last_name_placeholder') }}" val="" extraclasses="mb-3"
                                label="{{ __('login.last_name_label') }}" />
                        </div>

                        <div class="col-md-6">
                            <x-auth.input-field type="email" name="email" id="email" required="true"
                                place="{{ __('login.email_placeholder') }}" val="" extraclasses="mb-3 disabled"
                                label="{{ __('login.email_label') }}" />
                        </div>

                        <div class="col-md-6">
                            <x-role-list />
                        </div>

                        <div class="col-md-12">

                            <x-auth.input-field type="password" name="password" id="password" required="true"
                                place="{{ __('login.password_placeholder') }}" val=""
                                extraclasses="mb-3 disabled" label="{{ __('login.password_label') }}" />
                        </div>

                        <div class="col-md-12">

                            <x-auth.text-area type="text" name="about" id="about" required="true"
                                place="{{ __('login.username_placeholder') }}" val="" extraclasses="mb-3"
                                label="{{ __('login.biography_label') }}" />

                            <x-auth.input-button btn-class="" btn-type="submit"
                                btn-value="{{ __('Create New User') }}" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <x-auth.upload-file image="" />
                </div>
            </div>

        </x-auth.form>
    </x-auth.card>
</x-layouts.auth>
