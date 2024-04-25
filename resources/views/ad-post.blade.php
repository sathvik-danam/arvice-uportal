<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Urban Portal - View Your Profile</title>
        <meta name="description" content="">
        @include('includes.header')
        <!-- Main content -->
    <div class="content">
      <div class="container-fluid" id="content01">
      <profile-component></profile-component> 
      <router-view></router-view>	
	
	 <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
		
@include('includes.footer')