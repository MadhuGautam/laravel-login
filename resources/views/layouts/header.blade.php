<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | Dashboard</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

  <!--  Material Kit Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
  {{-- <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" /> --}}
  <style>
    body {
      margin:0px;
    }

    .center {
      display:inline;
      margin: 3px;
    }

    .form-input {
      width:100px;
      padding:3px;
      background:#fff;
      /* border:2px dashed dodgerblue; */
    }
    .form-input input {
      display:none;
    }
    /* .form-input label {
      display:block;
      width:100px;
      height: auto;
      max-height: 100px;
      background:#333;
      border-radius:10px;
      cursor:pointer;
    } */

    .form-input img {
      width:25rem;
      height: 16rem;
      margin: 2px;
      /* opacity: .4; */
    }

    .imgRemove{
      position: relative;
      bottom: 114px;
      left: 68%;
      background-color: transparent;
      border: none;
      font-size: 30px;
      outline: none;
    }
    .imgRemove::after{
      content: ' \21BA';
      color: #fff;
      font-weight: 900;
      border-radius: 8px;
      cursor: pointer;
    }
    .small{
      color: firebrick;
    }
    </style>

</head>
