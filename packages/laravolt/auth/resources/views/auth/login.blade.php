@extends('layouts.auth')

@section('content')

    <div class="ui segment very padded">
        <form class="ui form" method="POST" action="{{ url('/auth/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="ui field left icon input big fluid">
                <input type="email" name="email" placeholder="@lang('auth::auth.identifier')" value="{{ old('email') }}">
                <i class="mail icon"></i>
            </div>
            <div class="ui field left icon input big fluid">
                <input type="password" name="password" placeholder="@lang('auth::auth.password')">
                <i class="lock icon"></i>
            </div>
            <div class="ui equal width grid field">
                <div class="column left aligned">
                    <div class="ui checkbox big">
                        <input type="checkbox" name="remember">
                        <label>@lang('auth::auth.remember')</label>
                    </div>
                </div>
                <div class="column right aligned">
                    <a href="{{ url('/password/email') }}">@lang('auth::auth.forgot_password')</a>
                </div>
            </div>
            <div class="ui field">
                <button type="submit" class="ui big fluid button">@lang('auth::auth.login')</button>
            </div>
        </form>

    </div>

    <div class="ui list small">
        <div class="item">
            @lang('auth::auth.not_registered_yet?')
            <a href="{{ url('auth/register') }}">@lang('auth::auth.register_here')</a>
        </div>
    </div>

@endsection
