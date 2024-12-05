@extends('layouts.base')
@section('mecanica')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12" style="display: flex; justify-content: space-between; width: 100%">
                <h4 class="page-title">Funcionarios do Sistema</h4>
                <a href="#Cadastrar" onclick="limpar()" data-toggle="modal" style="font-size: 20pt"><i class="fa fa-plus-circle"></i></a>
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
                                    <th>Genero</th>
                                    <th>Cargo</th>
                                    <th>Data de Nascimento</th>
                                    <th>Telefone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($funcionario as $funcio)
                                    <tr>
                                        <td>{{$funcio->nomeCompleto}}</td>
                                        <td>{{$funcio->email}}</td>
                                        <td>{{$funcio->cargo}}</td>
                                        <td>{{$funcio->data_nascimento}}</td>
                                        <td>{{$funcio->telefone}}</td>
                                        <td>{{$funcio->genero}}</td>
                                        <td>
                                            <a href="#Cadastrar" data-toggle="modal" onclick="editar({{$funcio}})" style="font-size: 16pt" class="text-primary" ><i class="fa fa-edit"></i></a>
                                            <a href="{{route('funcio.show',$funcio)}}" style="font-size: 16pt" class="text-danger ml-2"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="Cadastrar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Funcionários</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                   <form action="{{route('funcio.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nomeCompleto">Nome Compelto</label>
                            <div class="form-input">
                                <input type="text" class="form-control" name="nomeCompleto" id="nomeCompleto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="form-input">
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cargo">Cargo</label>
                            <div class="form-input">
                                <select name="cargo" id="cargo" class="form-control">
                                    <option value="Atendente">Atendente</option>
                                    <option value="Mecanico">Mecanico</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="genero">Genero</label>
                            <div class="form-input">
                                <select class="form-control" name="genero" id="genero">
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <div class="form-input">
                                <input type="date" max="{{date('2024-1-1')}}" class="form-control" name="data_nascimento" id="data_nascimento">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefone"> Telefone</label>
                            <div class="form-input">
                                <input type="text" class="form-control" name="telefone" id="telefone">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </form>
            </div>
        </div>
    </div>
</div>

<script>
    function editar(valor) {
        document.getElementById('id').value = valor.id;
        document.getElementById('nomeCompleto').value = valor.nomeCompleto;
        document.getElementById('data_nascimento').value = valor.data_nascimento;
        document.getElementById('email').value = valor.email;
        document.getElementById('cargo').value = valor.cargo;
        document.getElementById('telefone').value = valor.telefone;
        document.getElementById('genero').value = valor.genero;
    }
    function limpar() {
        document.getElementById('id').value = ""
        document.getElementById('nomeCompleto').value = ""
        document.getElementById('data_nascimento').value = ""
        document.getElementById('email').value = ""
        document.getElementById('cargo').value = ""
        document.getElementById('telefone').value = ""
        document.getElementById('genero').value = ""
    }
    
</script>
@endsection