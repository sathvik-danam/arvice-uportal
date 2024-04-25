<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Resolve - {{ $post->profession }}</title>
        <meta name="description" content="{{ $post->profession }}. Best Place to find professional service provider.">
        @include('includes.header')

	
    <!-- Main jumbotron for a primary marketing message or call to action -->
	<section class="inner-banner" style="background-image: url({{ asset('img/profession/'.$post->photo1) }});">
		<div class="container">
			<div class="caption">
				<h2>{{ $post->profession }}</h2>
				<p>{{ $post->category }} \ {{ $post->profession }}</p>
			</div>
		</div>
	</section>


	<section class="profile-detail">
		<div class="container">
			<div class="col-md-8">
				<div class="row">
					<div class="basic-information">
						<div class="col-md-3 col-sm-3">
						 <img src="{{ asset('img/profession/'.$post->photo1) }}" alt="" class="img-responsive">
						</div>
						<div class="col-md-9 col-sm-9">
							<div class="profile-content">
									<h2>Why Resolve?</h2>
									<p>We Value Your Trust</p>
									<ul class="information">
										<li>We are much more timely when it comes to responding to customer inquiries.</li>
										<li>Our services are being rendered by Home Services, Office Services, Education, Retail, Wedding Services and much more.</li>
										<li>We are willing to go beyond expectation to serve you better by reducing your effort and time.</li>
										<li>All of our professional are well experienced and trained.</li>
									</ul>
								</div>
							</div>
						<ul class="social">
							<li><a href="" class="facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="" class="google"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="" class="twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="" class="instagram"><i class="fa fa-instagram"></i></a></li>
						</ul>
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-user fa-fw"></i> About {{ $post->profession }}
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">
							<p>{!! $post->about !!}</p>	
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-leaf fa-fw"></i> How is Works?
							</div>
												<!-- /.panel-heading -->
							<div class="panel-body">
							<p>Get connected with us and get a global customer in a very few easy steps.</p>	
							<ul>
								<li><span>Step 1: </span>Sign up right now on our website and list about your profession and business.</li>
								<li><span>Step 2: </span>After sign up you will be able to get contact details of customers who are looking for your service.</li>
								<li><span>Step 3: </span>Talk to your clients and make aware them about your work quality.</li>
								<li><span>Step 4: </span>We prefer those who prefer quality. So, provide best quality to your clients.</li>
							</ul>
							</div>
						</div>
						@if($partners->count() > 0)
						<h2>Our Service Partners</h2>
					<!-- Starting of Partner List	 -->
				@foreach($partners as $partner)
						<div class="basic-information">
						<div class="col-md-3 col-sm-3">
						 <img src="{{ asset('img/profile/'.$partner->photo) }}" alt="" class="img-responsive partner-pic">
						</div>
						<div class="col-md-9 col-sm-9">
							<div class="profile-content">
									<h5><b>Profession: </b>{{ $partner->profession }}</h5>
									<p><b>Name:</b> {{ $partner->user->name }}<br/>
									<b>City:</b> {{ $partner->city }}<br/>
									<b>Address:</b> {{ $partner->address }}<br/> 
									<hr/>
									<b>About {{ $partner->user->name }}:</b><br/>
									{{ $partner->about }}</p>
								</div>
							</div>
					    </div>
						@endforeach
						@endif
	<!-- Ending of Partner List	 -->
					</div>
				</div>
			</div>
        <div class="col-md-4 myaffix mt-4" id="myaffix">
        <div class="card">
        <div class="card-header bg-image01"><center><h4 class="text-white">Need Professional Help?</h4></center></div>
        <div class="card-footer bg-image01">				
		@if (Route::has('login'))
		@auth				
		<form action="{{route('post.store')}}" method="post">
		{{csrf_field()}}
				<div class="form-group text-white">
					    	<input type="text" class="form-control" value="{{ Auth::user()->name }}"  required name="name" id="name" placeholder=" Enter Name">
					    	<input type="hidden" class="form-control"  name="website" id="website" value="Arvice Portal">
					    	<input type="hidden" class="form-control"  name="profession" id="profession" value="{{ $post->profession }}">
				  		</div>
				  		<div class="form-group text-white">
					    	<input type="email" class="form-control" required name="email" id="email" value="{{ Auth::user()->email }}" placeholder=" Enter Email ID">            
					  	</div>	
					  	<div class="form-group text-white">
					   <input type="tel" class="form-control" required id="phone" value="{{ Auth::user()->phone }}" name="phone" placeholder=" Enter Contact No." >
							</div>
							<div class="form-group text-white">
						<input type="text" class="form-control" required id="address" value="{{ old('address') }}" name="address" placeholder=" Enter Address" >
							</div>
							<div class="form-group text-white">
						<input type="text" class="form-control" required id="city" value="{{ old('city') }}" name="city" placeholder=" Enter City" >
							</div>
                        <div style="text-align:center;">
                            <input type="submit" value="CONTACT NOW" class="btn btn-primary btn-lg" >
			  			</div>
		 </form>
		 @else
		<form action="{{route('post.store')}}" method="post">
		{{csrf_field()}}
				<div class="form-group text-white">
					    	<input type="text" class="form-control" value=""  required name="name" id="name" placeholder=" Enter Name">
					    	<input type="hidden" class="form-control"  name="website" id="website" value="Arvice Portal">
					    	<input type="hidden" class="form-control"  name="profession" id="profession" value="{{ $post->profession }}">
				  		</div>
				  		<div class="form-group text-white">
					    	<input type="email" class="form-control" required name="email" id="email" value="" placeholder=" Enter Email ID">            
					  	</div>	
					  	<div class="form-group text-white">
					   <input type="tel" class="form-control" required id="phone" value="" name="phone" placeholder=" Enter Contact No." >
							</div>
							<div class="form-group text-white">
						<input type="text" class="form-control" required id="address" value="{{ old('address') }}" name="address" placeholder=" Enter Address" >
							</div>
							<div class="form-group text-white">
						<input type="text" class="form-control" required id="city" value="{{ old('city') }}" name="city" placeholder=" Enter City" >
							</div>
                        <div style="text-align:center;">
                            <input type="submit" value="CONTACT NOW" class="btn btn-primary btn-lg" >
			  			</div>
		 </form>
		 @endauth
		@endif
            </div>
        </div>
    </div>                
</div>
	</section>
	<input type="submit" value="HIRE NOW" class="btn btn-primary btn-lg btn-mobile" data-toggle="modal" data-target="#myMobileModal">
	  <!-- Modal -->
	<div class="modal fade" id="myMobileModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content bg-image01">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="card bg-image01">
			<div class="card-header"><center><h4 class="text-white">Need Professional Help?</h4></center></div>
			</div>
        </div>
        <div class="modal-body">

			<div class="card bg-image01">
			<div class="card-footer">				
			@if (Route::has('login'))
			@auth				
			<form action="{{route('post.store')}}" method="post">
			{{csrf_field()}}
					<div class="form-group text-white">
								<input type="text" class="form-control" value="{{ Auth::user()->name }}"  required name="name" id="name" placeholder=" Enter Name">
								<input type="hidden" class="form-control"  name="website" id="website" value="Arvice Portal">
								<input type="hidden" class="form-control"  name="profession" id="profession" value="{{ $post->profession }}">
							</div>
							<div class="form-group text-white">
								<input type="email" class="form-control" required name="email" id="email" value="{{ Auth::user()->email }}" placeholder=" Enter Email ID">            
							</div>	
							<div class="form-group text-white">
						<input type="tel" class="form-control" required id="phone" value="{{ Auth::user()->phone }}" name="phone" placeholder=" Enter Contact No." >
							</div>
							<div class="form-group text-white">
						<input type="text" class="form-control" required id="address" value="{{ old('address') }}" name="address" placeholder=" Enter Address" >
							</div>
							<div class="form-group text-white">
						<input type="text" class="form-control" required id="city" value="{{ old('city') }}" name="city" placeholder=" Enter City" >
							</div>
							<div style="text-align:center;">
								<input type="submit" value="HIRE NOW" class="btn btn-primary btn-lg" >
							</div>
			</form>
			@else
			<form action="{{route('post.store')}}" method="post">
			{{csrf_field()}}
					<div class="form-group text-white">
								<input type="text" class="form-control" value="{{ old('name') }}"  required name="name" id="name" placeholder=" Enter Name">
								<input type="hidden" class="form-control"  name="website" id="website" value="Arvice Portal">
								<input type="hidden" class="form-control"  name="profession" id="profession" value="{{ $post->profession }}">
							</div>
							<div class="form-group text-white">
								<input type="email" class="form-control" required name="email" id="email" value="{{ old('email') }}" placeholder=" Enter Email ID">            
							</div>	
							<div class="form-group text-white">
						<input type="tel" class="form-control" required id="phone" value="{{ old('phone') }}" name="phone" placeholder=" Enter Contact No." >
							</div>
							<div class="form-group text-white">
						<input type="text" class="form-control" required id="address" value="{{ old('address') }}" name="address" placeholder=" Enter Address" >
							</div>
							<div class="form-group text-white">
						<input type="text" class="form-control" required id="city" value="{{ old('city') }}" name="city" placeholder=" Enter City" >
							</div>
							<div style="text-align:center;">
								<input type="submit" value="HIRE NOW" class="btn btn-primary btn-lg" >
							</div>
			</form>
			@endauth
			@endif
				</div>
			</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	@include('includes.footer')