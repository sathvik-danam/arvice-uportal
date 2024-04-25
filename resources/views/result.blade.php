<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Urban Portal</title>
        <meta name="description" content="Best Place to find professional service provider.">
        @include('includes.header')

        <section class="jobs">
			<div class="container">
				<div class="row heading">
					<h2>Search Your Professionals</h2>
					<p>We Only Suggest You the Best Among the Rest</p>
                </div>
                
				<div class="companies">
                @if($posts->count() > 0)
                @foreach($posts as $post)
					<div class="company-list">
						<div class="row">
							<div class="col-md-2 col-sm-2">
								<div class="company-logo">
									<img src="img/profession/{{ $post->photo1 }}" class="img-responsive" alt="" />
								</div>
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="company-content">
									<h3>{{ $post->profession }}</h3>
									<p><span class="company-name"><i class="fa fa-briefcase"></i>{{ $post->category }}</span><span class="company-location"><i class="fa fa-map-marker"></i> Hire Now At Your Location</span><span class="package"><i class="fa fa-money"></i>$100 Per Hour</span></p>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<a href="{{ route('post.single', ['slug' => $post->slug ]) }}" type="submit" class="btn view-job" name="View More">Hire Now</a>
							</div>
						</div>
					</div>
                    @endforeach
                    @else 
                        <div class="col-md-12">
                        <div class="mymargin">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5>No Results Found!</h5>
                                </div>
                            </div>
                        </div>
                        </div>
                    @endif     
                    </div>
                    {{ $posts->links() }}

				</div>
			</div>
		</section>

		@include('includes.footer')