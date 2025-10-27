<style>
    .facebookbutton {
        background-color: #316FF6 !important;
        color: white;
    }

    .facebookbutton:hover {
        color: white !important;
    }

    .googlebutton {
        background-color: #DB4437 !important;
        color: white;
    }

    .googlebutton:hover {
        color: white !important;
    }

    .githubbutton {
        background-color: #000000 !important;
        color: white;
    }

    .githubbutton:hover {
        color: white !important;
    }

    .twitterbutton {
        background-color: #1DA1F2 !important;
        color: white;
    }

    .twitterbutton:hover {
        color: white !important;
    }
</style>

@if ($setting->facebook_active)
    <x-auth.href-link link-href="{{ route('social.redirect', 'facebook') }}" link-value=""
        link-class="btn facebookbutton">
        <i class="align-middle fab fa-fw fa-facebook"></i> Facebook
    </x-auth.href-link>
@endif

@if ($setting->google_active)
    <x-auth.href-link link-href="{{ route('social.redirect', 'google') }}" link-value="Google"
        link-class="btn googlebutton">
        <i class="align-middle fab fa-fw fa-google"></i> Google
    </x-auth.href-link>
@endif

@if ($setting->github_active)
    <x-auth.href-link link-href="{{ route('social.redirect', 'github') }}" link-value="Github"
        link-class="btn githubbutton">
        <i class="align-middle fab fa-fw fa-github"></i> Github
    </x-auth.href-link>
@endif

@if ($setting->twitter_active)
    <x-auth.href-link link-href="{{ route('social.redirect', 'twitter') }}" link-value="Twitter"
        link-class="btn twitterbutton">
        <i class="align-middle fab fa-fw fa-twitter"></i> Twitter
    </x-auth.href-link>
@endif
