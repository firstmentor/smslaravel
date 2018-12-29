@extends("students.layout.master")

@section("title","SMS")

@section("body")


<div class="panel panel-primary">
  <div class="panel-heading">Students List
  <a href="{{ url ('students/create') }}" class="btn btn-success pull-right owtbtn"> + Add Students</a>
</div>
  <div class="panel-body">
  	
  	<table class="table">
    <thead>
      <tr>
        <th>Sr No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    	<?php $i=1; ?> <!--auto incremnt-->
    @foreach($students as $student)	
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $student->name  }}</td>
        <td>{{ $student->email }}</td>
        <td>
        	<a href="{{ url('students/'.$student->id.'/edit')}}" class="btn btn-info">Edit</a>
        	<form action='/students/{{ $student->id }}' method="post" class="pull-right">
            {{csrf_field()}}
            {{ method_field("DELETE") }}
           <button class="btn btn-danger" type="submit"> Delete</button>
           </from> 
        </td>.
      </tr>      
      @endforeach
    </tbody>
  </table>
  </div>
</div>
 

@endsection