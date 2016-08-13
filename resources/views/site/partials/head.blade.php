<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width">
@include('site.partials.favicons')

<title>@yield('title')</title>
<link rel="stylesheet" type="text/css" href="{{ elixir('frontend/css/site.css') }}">
<link rel="stylesheet" type="text/css" href="{{ elixir('vendors/css/all.css') }}">



@yield('head.styles')

 <!-- Fonts -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
<link href="//fonts.googleapis.com/css?family=Lato:700,300,400,400italic" rel="stylesheet" />
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" /> -->

<link rel="shortcut icon" href="" />

@include('scripts.site.global')

@include('site.partials.scripts')

