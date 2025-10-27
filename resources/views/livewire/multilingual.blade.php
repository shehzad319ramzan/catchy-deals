<x-auth.card card-header="Manage Languages" header-button="">
    @php
        $default_language = $setting->default_language;
        $languages = $setting->languages;
        $supportedLocales = LaravelLocalization::getSupportedLocales();
        // Filter out the default language and list it first
        $otherLanguages = array_filter(
            $supportedLocales,
            function ($localeCode) use ($default_language) {
                return $localeCode !== $default_language;
            },
            ARRAY_FILTER_USE_KEY,
        );
    @endphp

    <x-slot:header-custom>
        {{ $defaultLanguage }}
        <select wire:model.change="defaultLanguage" class="form-control" name="default_languages" id="default_languages">
            <option value="" disabled selected>{{ __('Select Default Language ↓') }}</option>
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                @if (in_array($localeCode, $languages))
                    <option value="{{ $localeCode }}" @if ($default_language === $localeCode) {{ 'selected' }} @endif>
                        {{ ucfirst($properties['native']) }} @if ($default_language === $localeCode)
                            {{ __('(Default Language)') }}
                        @endif
                    </option>
                @endif
            @endforeach
        </select>
    </x-slot:header-custom>

    <div class="alert alert-danger alert-outline-coloured alert-dismissible text-danger" role="alert">
        <div class="alert-message">
            <strong>{{ __('Take a backup before process!') }}</strong><br>
            {{ __('If you have previously created or edited a language file, the Generate process will overwrite those files.') }}
        </div>
    </div>

    <h4 class="">{{ __('Available Languages') }}</h4>
    <select class="form-control" name="available" id="available">
        <option value="" disabled selected>{{ __('Add new language ↓') }}</option>
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if (!in_array($localeCode, $languages))
                <option value="{{ $localeCode }}" @if ($default_language === $localeCode) {{ 'selected' }} @endif>
                    {{ $localeCode }} - {{ ucfirst($properties['native']) }}
                </option>
            @endif
        @endforeach
    </select>


    <h4 class="mt-3">{{ __('Installed Languages') }}</h4>
    {{-- Display default language first --}}
    @if (in_array($default_language, $setting->installed_languages))
        <div class="bg-light p-2 mt-3">
            <div class="float-end">
                <x-auth.input-checkbox margin-top="0" name="installed_languages[]"
                    id="installed_languages{{ $default_language }}" label=""
                    value="{{ in_array($default_language, $setting->languages) ? 1 : 0 }}" />
            </div>
            <label class="card-title h5"
                for="installed_languages{{ $default_language }}">{{ ucfirst($supportedLocales[$default_language]['native']) }}
                {{ __('(Default Language)') }}
            </label>
        </div>
    @endif

    {{-- Display other installed languages --}}
    @foreach ($otherLanguages as $localeCode => $properties)
        @if (in_array($localeCode, $setting->installed_languages))
            <div class="bg-light p-2 mt-3">
                <div class="float-end">
                    <x-auth.input-checkbox margin-top="0" name="installed_languages[]"
                        id="installed_languages{{ $localeCode }}" label=""
                        value="{{ in_array($localeCode, $setting->languages) ? 1 : 0 }}" />
                </div>
                <label class="card-title h5"
                    for="installed_languages{{ $localeCode }}">{{ ucfirst($properties['native']) }}
                    @if ($setting->default_language === $localeCode)
                        {{ __('(Default Language)') }}
                    @endif
                </label>
            </div>
        @endif
    @endforeach

</x-auth.card>
