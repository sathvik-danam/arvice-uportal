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

<section class="profile-detail"> 
<div class="container">

@if (Route::has('login'))
	@auth
			<div class="col-md-12">
				<div class="row">
					<div class="basic-information">
                    <div class="col-md-12 col-sm-12">
							<div class="profile-content text-center mb-4">
									<h2>Find out guest list.</h2>
								</div>
							</div>

				<div class="card">
				<div class="card-body">
				<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<th>
							Guest Name
						</th>
						<th>
							Guest Email
						</th>
						<th>
							Status
						</th>
						<th>
							Total Guest
						</th>
					</thead>
					<tbody>
					@if($posts->count() > 0)
					@foreach($posts as $post)
							<tr>
								<td> 
                                {{ $post->name }}
								</td>
								<td>
                                {{ $post->guest_email }}
								</td>
								<td>
                                {{ $post->attending_status }}
								</td>
								<td>
                                {{ $post->total_guest }}
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
				</div>
						<div>
							{{ $posts->links() }}
						</div>
				</div> 
			</div>
        </div>
	</div>
			@else

			<div class="col-md-12">
				<div class="row">
					<div class="basic-information">
						<div class="col-md-12 col-sm-12">
							<div class="profile-content text-center mb-4">
									<h2>Will you attend?</h2>
									<button class="btn btn-lg btn-success mr-3" onclick="setValueYes()">Yes</button>
									<button class="btn btn-lg btn-warning mr-3" onclick="setValueMaybe()">May Be</button>
									<button class="btn btn-lg btn-danger" onclick="setValueNo()">No</button>
								</div>
							</div>

	<form action="{{route('guest.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
<div>
            <table>
                <tr class="required">
                    <td><label for="name">Name</label></td>
                    <td><input type="text" required name="name" size="90%" value="{{ old('name') }}" class="form-control input-sm" placeholder="Your Name"></td>
                    <td><input type="hidden" required name="slug" size="90%" value="{{ $slug }}"></td>
                </tr>
                <tr class="required1">
                    <td><label for="email">Email</label></td>
                    <td><input type="email" required name="email" size="90%" value="{{ old('email') }}" class="form-control input-sm" placeholder="Your Email"></td>
                </tr>
                <tr class="required">
                    <td><label for="postname">Status</label></td>
                    <td>
                        <select id="txtstatus" class="form-control" name="status" class="form-control" >
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="May Be">May Be</option>
                        </select>
                    </td>
                    <!-- <td><input type="text" id="txtstatus" required name="status" size="90%" value="{{ old('status') }}" class="form-control input-sm" placeholder="Status"></td> -->
                </tr>
                <tr class="required">
                    <td><label for="total_guest">Total Guest</label></td>
                    <td><input type="number" id="tguest" required name="total_guest" size="90%" value="{{ old('total_guest') }}" class="form-control input-sm" placeholder="Total Guest" ></td>
                </tr>
            </table>
</div>            

        <div class="form-group">
            <div class="text-center">
                <button class="btn btn-success btn-lg mypostbtn" type="submit">
                    Submit Your Invitation Status
                </button>
            </div>
        </div>
    </form>
						
					</div>
				</div>
			</div>   

			<div class="col-md-12">
				<div class="row">
					<div class="basic-information">
                    <div class="col-md-12 col-sm-12">
							<div class="profile-content text-center mb-4">
									<h2>Find out guest list.</h2>
								</div>
							</div>

				<div class="card">
				<div class="card-body">
				<table class="table table-hover">
					<thead>
						<th>
							Guest Name
						</th>
						<th>
							Guest Email
						</th>
						<th>
							Status
						</th>
						<th>
							Total Guest
						</th>
					</thead>
					<tbody>
					@if($posts->count() > 0)
					@foreach($posts as $post)
							<tr>
								<td> 
                                {{ $post->name }}
								</td>
								<td>
                                {{ $post->guest_email }}
								</td>
								<td>
                                {{ $post->attending_status }}
								</td>
								<td>
                                {{ $post->total_guest }}
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
	</div>
	@endauth
@endif

	</div>
	</section>

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