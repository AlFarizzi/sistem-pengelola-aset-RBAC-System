@extends('welcome')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Profil {{$user->username}}</h4>
                            </div>
                            <div class="card-body">
                                    <img class="img-thumbnail w-25 mx-auto d-block" style="border-radius: 50%;" src="http://placekitten.com/300/300" alt="">
                                    <h3 style="text-align: center" class="text-muted mt-3">{{$user->username}}</h3>    
                            <div class="container">
                                <div class="mx-auto d-block">
                                    <table style="text-align: center;" class="table table-hover">
                                        <tr >
                                            <td>Nama</td>
                                            <td>{{$user->nama}}</td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>{{$user->username}}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>{{$user->alamat}}</td>
                                        </tr>
                                        <tr>
                                            <td>email</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>level</td>
                                            <td>{{$user->username}}</td>
                                        </tr>
                                        
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection