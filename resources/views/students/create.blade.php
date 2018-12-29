@extends("students.layout.master")

@section("title","SMS")

@section("body")


<div class="panel panel-primary">
  <div class="panel-heading">{{  ucfirst(substr(Route::currentRouteName(), 8)) }} Students

  <a href="{{ url('students') }}" class="btn btn-success pull-right owtbtn">< Back</a>
</div>
  <div class="panel-body">
  	
  	<form action='/students/@yield("studentId")' method="post">
  		{{ csrf_field() }}

      @section("editMethod")
      @show
  	<div class="form-group">
    <label for="email">Name:</label>
    <input type="name" class="form-control" id="email" name="name" value="@yield('studentName')">
  </div>

  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" value="@yield('studentEmail')">
  </div>
  
  <button type="submit" class="btn btn-default" >Submit</button>
</form>
  </div>
</div>
 

@endsection