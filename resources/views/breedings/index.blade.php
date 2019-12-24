@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">

                        <form action="/breedings/search" method="GET">
                            @csrf
                            <div class="input-group">
                                <input type="search" name="search" class="form-control">
                                <span class="input-group-prepend">
                                    <button type="submit" title="Search" class="btn btn-primary"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <a href="{{action('BreedingController@create')}}" class="btn btn-primary float-right"><i
                            class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Data</a>
                </div>

                <div class="card-body">
                    <h2>Breeding Details</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Breed</th>
                                <th scope="col">Cohabitation</th>
                                <th scope="col">Male ID</th>
                                <th scope="col">Female ID</th>
                                <th scope="col">Delivery</th>
                                <th scope="col">Offspring Male</th>
                                <th scope="col">Offspring Female</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($breedings as $breeding)


                            <tr>
                                <td>{{$breeding->breed}}</td>
                                <td>{{$breeding->start}}</td>
                                <td>{{$breeding->male_id}}</td>
                                <td>{{$breeding->female_id}}</td>
                                <td>{{$breeding->delivery}}</td>
                                <td>{{$breeding->pup_male}}</td>
                                <td>{{$breeding->pup_female}}</td>
                                <td>{{$breeding->total}}</td>
                                <td>
                                    <form action="{{action('BreedingController@destroy',$breeding->id)}}" method="POST">
                                        <a href="{{action('BreedingController@show',$breeding->id)}}" title="Show"
                                            class="btn btn-outline-info btn-sm"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                        <a href="{{action('BreedingController@edit',$breeding->id)}}" title="Edit"
                                            class="btn btn-outline-info btn-sm"><i class="fa fa-edit"
                                                aria-hidden="true"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Delete" class="btn btn-outline-danger btn-sm"><i
                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$breedings->links()}}

                </div>



            </div>
            <div class="mb-3"></div>
            <div class="card">
                    <div class="card-header">
                        Export data to Excel Format
                        <a href="{{route('breedexport')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-download"
                                aria-hidden="true"></i>&nbsp; Download</a>
                    </div>
                    <div class="card-body">
                        <p>Choose Excel file to import into Database</p>
    
                        <form action="{{route('breedimport')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="import_file">
                                <span class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"
                                            aria-hidden="true"></i>&nbsp; Upload</button>
    
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
            <div class="mb-3"></div>
            @endsection