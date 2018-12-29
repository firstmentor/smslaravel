<!DOCTYPE html>
<html>
<head>
	<title>@yield("tile")</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
   <style type="text/css">
   	.owtcontainer{
   		 margin-top:50px;

   	}
   	.owtbtn{
   		margin-top: -6px;
   	}

   </style>
	
</head>
<body>
	
	<div class="container owtcontainer">
	 <div class="row">

	 @if($errors->any())

	 <div class ="alert alert-danger">
	 	<ul>
	 		@foreach($errors->all() as $error)
	 		<li>{{ $error}}</li>
	 			@endforeach
	 	</ul>
	 	</div>
	 
	 @endif
	 @if(session()->has("studentMessage"))
	  <div class ="alert alert-success"><p>{{ session()->get("studentMessage")}}</p>
	  </div>	
      

     @endif   
	 	
    @section("body")
	@show

</body>
</html>