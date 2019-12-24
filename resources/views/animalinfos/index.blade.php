@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        
                        <form action="/animalinfos/search" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="search" name="search" class="form-control">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary" ><i class="fa fa-search" aria-hidden="true"></i></button>
                            </span>
                        </div>
                        </form>
                    </div>
                    <a href="{{action('AnimalinfoController@create')}}" class="btn btn-primary float-right"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Data</a>
                </div>

                <div class="card-body">
                    <h2>Animal Details</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Animal ID</th>
                                <th scope="col">SR_NO</th>
                                <th scope="col">Date</th>
                                <th scope="col">Treatment Details</th>
                                <th scope="col">Death Details</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($animalinfos as $animalinfo)
                                
                            
                            <tr>
                                <td>{{$animalinfo->animal_id}}</td>
                                <td>{{$animalinfo->sr_no}}</td>
                                <td>{{$animalinfo->ai_date}}</td>
                                <td>{{$animalinfo->treatment_details}}</td>
                                <td>{{$animalinfo->death_details}}</td>
                                <td>
                                    <form action="{{action('AnimalinfoController@destroy',$animalinfo->id)}}" method="POST">
                                        <a href="{{action('AnimalinfoController@show',$animalinfo->id)}}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{action('AnimalinfoController@edit',$animalinfo->id)}}" class="btn btn-outline-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>

                            </tr>   
                            @endforeach
                        </tbody>
                    </table>
                    {{$animalinfos->links()}}
                   
                </div>
                   

                    
                </div>
                <div class="mb-3"></div>
                <div class="card">
                    <div class="card-header">
                        Export data to Excel Format
                        <a href="{{route('animalexport')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-download" aria-hidden="true"></i>&nbsp; Download</a>
                    </div>
                    <div class="card-body">
                        <p>Choose Excel file to import into Database</p>
                        
                        <form action="{{route('animalimport')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input type="file" name="import_file"  >
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload" aria-hidden="true"></i>&nbsp; Upload</button>

                            </span>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
