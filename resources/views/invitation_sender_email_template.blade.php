<center>
<img class="img-responsive" alt="logo" src="https://arvices.com/job-asset/img/logo.png">
<h3>You're Invited</h3>
<h2>{{ $data['title'] }}</h2>
<a href="{{ route('discussion.store', ['slug' => $data['slug'] ] )}}" style="font-family:Lato,Helvetica,Arial,sans-serif;margin:0;margin-bottom:10px;padding:0;border:1px solid #28a842;color:#fff;outline:none;text-decoration:none;background-color:#28a842;border-radius:2em;display:inline-block;font-size:14px;margin-left:5px;margin-right:5px;margin-top:0;text-align:center;vertical-align:middle;white-space:nowrap;width:auto" bgcolor="#28A842" align="center" valign="middle" width="auto" target="_blank"><span style="background-color:#28a842;border-color:#28a842;border-radius:2em;border-style:solid;border-width:5px 20px;display:block;margin:6px 3px;" bgcolor="#28A842" valign="middle">View Invitation</span></a>
<p>Invitation Type: {{ $data['type'] }}</p>
<p>Host Name: {{ $data['name'] }}</p>
<p>Host Email: {{ $data['email'] }}</p>
<p>Host Contact: {{ $data['phone'] }}</p> 
<p>Message: {{ $data['message'] }}</p> 
<p>Resolve.com</p>
<p><a href="https://arvices.com/privacy" target="_blank"> Privacy policy </a> | <a href="https://arvices.com/" target="_blank"> Visit Website</a>
<br/></p>
<p>Thank you for using our application!</p>
</center> 

<!-- route('discussion', ['slug' => $this->discussion->slug ]) --> 