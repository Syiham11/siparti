@extends('layouts.base')

@section('script-head')
    <script src="http://cdn.intercoolerjs.org/intercooler-0.9.0.min.js"></script>
@endsection

@section('body')
    @include('admin.elements.header')
    @include('elements.flash')

    <div id="layout-admin" style="min-height: calc(80% - 100px)">
        <div class="ui divider hidden"></div>
        @yield('content')
    </div>

    @include('admin.elements.footer')
@endsection