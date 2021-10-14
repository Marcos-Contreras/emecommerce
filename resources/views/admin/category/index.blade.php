@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>EME - Dashboard</h4>
        <hr>
    </div>
    <div class="card-body">
       <table class="table table-bordered table-striped">
           <thead>
               <tr>
                   <th>id</th>
                   <th>name</th>
                   <th>description</th>
                   <th>image</th>
                   <th>action</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($category as $item)
               <tr>
                   <td>{{$item->id}}</td>
                   <td>{{$item->name}}</td>
                   <td>{{$item->description}}</td>
                   <td>
                       <img src="{{asset('assets/uploads/category/'.$item->image)}}" class="cate-image" class="w-25" alt="Image here">
                    </td>
                   <td>
                       <a href="{{url('edit-prod/'.$item->id)}}" class="btn btn-primary">Edit</a>
                       <a href="{{url('delete-category/'.$item->id)}}"="btn btn-danger">Delete</button>
                    </td>
               </tr>
               @endforeach
           </tbody>
       </table>
    </div>
</div>
@endsection