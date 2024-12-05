@extends('layouts.base')
@section('mecanica')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12" style="display: flex; justify-content: space-between; width: 100%">
                <h4 class="page-title">Manutenções</h4>
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
                                    <th>Tipo de Manutenção</th>
                                    <th>Preço</th>
                                    <th>Descrição</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($manutencao as $manu)
                                    <tr>
                                        <td>{{$manu->tipo}}</td>
                                        <td><b>{{number_format($manu->preco,0,',',' ')}} kz</b></td>
                                        <td>{{$manu->descricao}}</td>
                                        <td>
                                            <a href="#Cadastrar" data-toggle="modal" style="font-size: 16pt" onclick="editar({{$manu}})" class="text-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('manutecao.show',$manu)}}"  style="font-size: 16pt" class="text-danger ml-2"><i class="fa fa-trash"></i></a>
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
                        <h5 class="modal-title">Cadastrar Manutenções</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                   <form action="{{route('manutecao.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <div class="form-input">
                                <select class="form-control" name="tipo" id="tipo">
                                    <option >Mudança de Oléo</option>
                                    <option >Mudança de Peneus</option>
                                    <option >Soprar Filtros</option>
                                    <option >Mudança de Calsos</option>
                                    <option >Mudança de Terminais</option>
                                    <option >Mudança de Rolamentos</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Preço</label>
                            <div class="form-input">
                                <input type="preco" class="form-control" name="preco" id="preco">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descricao"> Descrição</label>
                            <div class="form-input">
                                <textarea style="resize: none" class="form-control" name="descricao" id="descricao" cols="30" rows="4"></textarea>
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
        document.getElementById('tipo').value = valor.tipo;
        document.getElementById('preco').value = valor.preco;
        document.getElementById('descricao').value = valor.descricao;
    }
    function limpar() {
        document.getElementById('id').value = ""
        document.getElementById('tipo').value = ""
        document.getElementById('preco').value = ""
        document.getElementById('descricao').value = ""
    }
    
</script>
@endsection