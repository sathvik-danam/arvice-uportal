<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Create an Invitation | Plan Your Party</title>
        <meta name="description" content="An excellent way to plan your party and easy way to create invitation.">
        @include('includes.header') 
                @if (Route::has('login'))
                    @auth
                    <vue-progress-bar></vue-progress-bar>
                    <category-component></category-component>
                    <router-view></router-view>
                    @else
                    <section class="login-wrapper dark">
                    <h1 align="center" class="pt-5">Please Login/ Sign Up to Continue<br/>
                    <a href="javascript:;" data-toggle="modal" data-target="#loginModal" class="btn btn-primary">Login/ Sign Up</a>
                    </h1>
                    </section>
                    @endauth  
				@endif	  
        @include('includes.footer') 