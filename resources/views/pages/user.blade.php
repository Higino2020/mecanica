@extends('layouts.base')
@section('mecanica')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Utilizadores do Sistema</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-block">
                        <p class="content-group">
                            @if(session('Error'))
                                <div class="alert alert-danger">
                                    <p>{{session('Error')}}</p>
                                </div>
                            @endif
                            @if(session('Sucesso'))
                                <div class="alert alert-success">
                                    <p>{{session('Sucesso')}}</p>
                                </div>
                            @endif
                        </p>
                        <div class="table-responsive">
                            <table class="datatable table table-stripped ">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Tipo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $util)
                                    <tr>
                                        <td>{{$util->name}}</td>
                                        <td>{{$util->email}}</td>
                                        <td>{{$util->tipo}}</td>
                                        <td>
                                            <a href="" class="text-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection