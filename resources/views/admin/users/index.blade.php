@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Users</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                
                            
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</td>
                                <td>
                                <a href="{{route('admin.users.edit',$user->id)}}" class="float-left">
                                    <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                </a>
                                <form action="{{route('admin.users.destroy',$user->id)}}" class="float-left" method="POST">
                                    
                                    {{method_field('DELETE')}}
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   {{$users->links()}}
                </div>
                   

                    
                </div>
            </div>
        </div>
    </div>
@endsection
