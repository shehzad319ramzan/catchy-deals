<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="minimal-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('dashboard/assets/image/favicon-32x32.png') }}" type="image/png" />

    <title>{{ config('app.name') }} {{ $pageTitle != null ? '- ' . $pageTitle : '' }}</title>

    @include('layouts.auth.styles')
    @yield('auth_styles')
</head>

<body class="theme-blue">

    <x-splash-screen />

    <div class="wrapper">
