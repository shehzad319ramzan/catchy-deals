@include('layouts.guest.links')

@include('layouts.guest.navigation')

<main class="main h-100 w-100">
    <div class="container h-100">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="text-center mt-4">
                        <h1 class="h2">{{ $pageTitle }}</h1>
                        <p class="lead">{{ $subTitle }}</p>
                    </div>

                    <x-auth.card>
                        <div class="m-sm-4">
                            <div class="text-center">
                                <x-logo />
                            </div>

                            {{ $slot }}

                            <hr>
                            <x-social-logins />
                        </div>
                    </x-auth.card>

                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.guest.footer')
