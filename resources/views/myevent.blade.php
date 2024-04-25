<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Invitation Status - Find out number of guest attending your party</title>
        <meta name="description" content="Invitation Status - Find out number of guest attending your party">
        @include('includes.header') 
@if(Session::has('success'))
<div class="alert alert-success text-center" role="alert">
{{Session::get('success')}}
</div>        
@endif
@if(Session::has('info'))
<div class="alert alert-info" role="alert">
{{Session::get('info')}}
</div>        
@endif 
@if (Route::has('login'))
		@auth
		<section class="profile-detail">
		<div class="container">
			<div class="col-md-12">
				<div class="row">
					<div class="basic-information">
                    <div class="col-md-12 col-sm-12">
							<div class="profile-content text-center mb-4">
									<h2>My Event List</h2>
								</div>
							</div>

				<div class="card">
				<div class="card-body">
				<table class="table table-hover">
					<thead>
						<th>
							Event Title
						</th>
						<th>
							Event Type
						</th>
						<th>
							Event Date<br/>(yyyy-mm-dd)
						</th>
						<th>
							Event Time
						</th>
						<th>
							Guest Response
						</th>
						<th>
							Action
						</th>
					</thead>
					<tbody>
					@if($posts->count() > 0)
					@foreach($posts as $post)
							<tr>
								<td> 
                                {{ $post->event_title }}
								</td>
								<td>
                                {{ $post->event_type }}
								</td>
								<td class="edate">
                                {{ $post->event_date  }}
								</td>
								<td>
                                {{ $post->event_time }}
								</td>
								<td>
                                <a href="{{ route('discussion.store', ['slug' => $post->slug]) }}" class="btn btn-success">View Details</a>
								</td>
								<td>
                                <a onclick="return confirm('Are you sure you want to delete this event?')" title="Delete Invitation" href="{{route('discussion.delete', ['id' =>$post->id])}}"><i class="fa fa-trash red fa-3x"></i></a>
								</td>
							</tr>
							@endforeach 
						@else
						<tr>
							<th colspan="5" class="text-center">No Data Found!</th>
						</tr>
					@endif 
					</tbody>   
				</table>
				</div>
						<div>
							{{ $posts->links() }}
						</div>
				</div> 
			</div>
        </div>
	</section>
		@else
		<section class="login-wrapper dark">
		<h1 align="center" class="pt-5">Please Login/ Sign Up to Continue<br/>
		<a href="javascript:;" data-toggle="modal" data-target="#loginModal" class="btn btn-primary">Login/ Sign Up</a>
		</h1>
		</section>
		@endauth
	@endif 

    <script type="text/javascript">
    function setValueYes()
    {
        document.getElementById('txtstatus').value="Yes";
        document.getElementById('tguest').value="1";
    }
    function setValueNo()
    {
        document.getElementById('txtstatus').value="No";
        document.getElementById('tguest').value="0";
    }
    function setValueMaybe()
    {
        document.getElementById('txtstatus').value="May Be";
        document.getElementById('tguest').value="1";
    }
      </script>
        @include('includes.footer')  