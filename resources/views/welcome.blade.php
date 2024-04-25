<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Reslove -Your Everyday Experts, Instantly. </title>
        <meta name="description" content="Reslove - Your Everyday Experts, Instantly.">
        @include('includes.header')
		
		<!-- Main jumbotron for a primary marketing message or call to action -->
		<section class="main-banner" style="background:#242c36 url(job-asset/img/slider-02.jpg) no-repeat">
			<div class="container">
				<div class="caption">
					<h2>Choose the Best Professionals</h2>
					<form method="GET" action="/result">
						<fieldset>
						<div class="col-md-4 col-sm-4 no-pad">
							<input type="text" required class="form-control border-right" name="country_name" autocomplete="off" id="country_name" placeholder="Enter your city" />
							   <div id="countryList"></div>
							   {{ csrf_field() }}
							</div>
							<div class="col-md-6 col-sm-6 no-pad">
								<input type="text" required class="form-control border-right" name="query1" placeholder="Search for a Service E.g., Photographer, Electrician etc." />
							</div>
							<div class="col-md-2 col-sm-2 no-pad">
								<input type="submit" class="btn seub-btn" value="submit" />
							</div>
						
						</fieldset>
					</form>
				</div>
			</div>
		</section>

		<section class="features">
			<div class="container">
				<div class="col-md-4 col-sm-4">
					<div class="features-content">
						<span class="box1"><span aria-hidden="true" class="icon-dial"></span></span>
						<h3>Become Professional</h3>
						<p>Give your talent a new road by connecting through us. Get connected with us and we will help you to reach to your customer.
						We offer you a platform where you can take your work to a new high. Now let millions of people know about your talent. In addition, you can get the best ratings from them and become a star professional of your field.
						</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="features-content">
						<span class="box1"><span aria-hidden="true" class="icon-search"></span></span>
						<h3>Search Professionals</h3>
						<p>Looking for skilled professionals for your daily activity. We are here to provide you the best and skilled professional.
						Now search for the various number of professional through us like Electrician, Plumbers, Photographer etc. Resolve is the best place to choose different professional from there ratings and get your work done in time.
						</p>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-4">
					<div class="features-content">
						<span class="box1"><span aria-hidden="true" class="icon-printer"></span></span>
						<h3>Grow Your Business</h3>
						<p>Do you have a business, which is not getting fame?<br/>
						Get connected with us and promote your business to global audience and increase your sales. We offer you a platform from where you can deal with thousands of customers directly, get rated from them and increase your fame and your business.
						</p>
					</div>
				</div>
			
			</div>
		</section>
		
    <section class="membercard dark">
        <div class="container">
<!-- Row Start -->
            <div class="row">
			<h4>Home Cleaning</h4> 
			@if($homes->count() > 0)
			@foreach($homes as $home)
			<a href="{{ route('post.single', ['slug' => $home->slug ]) }}" target="_blank"> 
                <div class="col-md-3 col-sm-3">
                    <div class="left-widget-sidebar">
                        <div class="card-widget bg-white user-card">
                            <div class="u-img img-cover" style="background-image: url(img/profession/{{ $home->photo1 }});background-size:cover;"></div>
                            <div class="u-content post-property">
                            </div>
                        </div>
                        <h5>{{ $home->profession }}</h5> 
                    </div> 
				</div>
			</a>
				@endforeach
				@else 
					<div class="col-md-12">
					<div class="mymargin">
						<div class="card">
							<div class="card-header text-center">
								<h6>No Results Found!</h6>
							</div>
						</div>
					</div>
					</div>
				@endif

            </div>
			<!-- Row End -->
<!-- Row Start -->
            <div class="row mt-5">
			<h4>Beauty & Spa</h4> 
			@if($beauties->count() > 0)
			@foreach($beauties as $beauty)
			<a href="{{ route('post.single', ['slug' => $beauty->slug ]) }}" target="_blank"> 
                <div class="col-md-3 col-sm-3">
                    <div class="left-widget-sidebar">
                        <div class="card-widget bg-white user-card">
                            <div class="u-img img-cover" style="background-image: url(img/profession/{{ $beauty->photo1 }});background-size:cover;"></div>
                            <div class="u-content post-property">
                            </div>
                        </div>
                        <h5>{{ $beauty->profession }}</h5> 
                    </div>
				</div>
			</a>
				@endforeach
				@else 
					<div class="col-md-12">
					<div class="mymargin">
						<div class="card">
							<div class="card-header text-center">
								<h6>No Results Found!</h6>
							</div>
						</div>
					</div>
					</div>
				@endif

            </div>
			<!-- Row End -->
<!-- Row Start -->
            <div class="row mt-5">
			<h4>Appliance Repair</h4> 
			@if($appliances->count() > 0)
			@foreach($appliances as $appliance)
			<a href="{{ route('post.single', ['slug' => $appliance->slug ]) }}" target="_blank"> 
                <div class="col-md-3 col-sm-3">
                    <div class="left-widget-sidebar">
                        <div class="card-widget bg-white user-card">
                            <div class="u-img img-cover" style="background-image: url(img/profession/{{ $appliance->photo1 }});background-size:cover;"></div>
                            <div class="u-content post-property">
                            </div>
                        </div>
                        <h5>{{ $appliance->profession }}</h5>
                    </div>
				</div>
			</a>
				@endforeach
				@else 
					<div class="col-md-12">
					<div class="mymargin">
						<div class="card">
							<div class="card-header text-center">
								<h6>No Results Found!</h6>
							</div>
						</div>
					</div>
					</div>
				@endif

            </div>
			<!-- Row End -->
<!-- Row Start -->
            <div class="row mt-5">
			<h4>Wedding & Events</h4> 
			@if($weddings->count() > 0)
			@foreach($weddings as $wedding)
			<a href="{{ route('post.single', ['slug' => $wedding->slug ]) }}" target="_blank"> 
                <div class="col-md-3 col-sm-3">
                    <div class="left-widget-sidebar">
                        <div class="card-widget bg-white user-card">
                            <div class="u-img img-cover" style="background-image: url(img/profession/{{ $wedding->photo1 }});background-size:cover;"></div>
                            <div class="u-content post-property">
                            </div>
                        </div>
                        <h5>{{ $wedding->profession }}</h5> 
                    </div>
				</div>
			</a>
				@endforeach
				@else 
					<div class="col-md-12">
					<div class="mymargin">
						<div class="card">
							<div class="card-header text-center">
								<h6>No Results Found!</h6>
							</div>
						</div>
					</div>
					</div>
				@endif

            </div>
			<!-- Row End -->


        </div>
    </section>

		<section class="testimonials">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div id="testimonial-slider" class="owl-carousel">

							<div class="testimonial">
								<div class="pic">
									<img src="job-asset/img/client.png" alt="">
								</div>
								<p class="description">
									" Very impressed, very satisfied with the quality of  work, they are timeliness and their work turnaround time are quick and I am happy and satisfied. Honestly Resolve is the best. "
								</p>
								<h3 class="testimonial-title">Mukesh Pal</h3>
								<span class="post">Client</span>
							</div>
							
							<div class="testimonial">
								<div class="pic">
									<img src="job-asset/img/client.png" alt="">
								</div>
								<p class="description">
									" Working with this company has been a pleasant experience. The work they did for me was top notch. I would definitely recommend them in the future."
								</p>
								<h3 class="testimonial-title">Mohit Kumar</h3>
								<span class="post">client</span>
							</div>
							<div class="testimonial">
								<div class="pic">
									<img src="job-asset/img/client.png" alt="">
								</div>
								<p class="description">
									" Resolve has given me an online platform to expand my business. It's very easy way to get my business with the help of Resolve."
								</p>
								<h3 class="testimonial-title">Arpit Mahajan</h3>
								<span class="post">Professional</span>
							</div>
							
							<div class="testimonial">
								<div class="pic">
									<img src="job-asset/img/client.png" alt="">
								</div>
								<p class="description">
									" Awesome home service, I had asked them to repair my AC. Happy as they did it in just an hour."
								</p>
								<h3 class="testimonial-title">Sulekha Singh</h3>
								<span class="post">client</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="counter">
			<div class="container">
				<div class="col-md-3 col-sm-3">
					<div class="counter-text">
						<span aria-hidden="true" class="icon-briefcase"></span>
						<h3>1000+</h3>
						<p>Customers Served</p>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3">
					<div class="counter-text">
						<span class="box1"><span aria-hidden="true" class="icon-expand"></span></span>
						<h3>207+</h3>
						<p>Verified Professionals</p>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3">
					<div class="counter-text">
						<span class="box1"><span aria-hidden="true" class="icon-profile-male"></span></span>
						<h3>50+</h3>
						<p>Live Services</p>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3">
					<div class="counter-text">
					<span class="box1"><span aria-hidden="true" class="icon-happy"></span></span>
						<h3>802+</h3>
						<p>Happy Members</p>
					</div>
				</div>
			</div>
		</section>
		@include('includes.footer')