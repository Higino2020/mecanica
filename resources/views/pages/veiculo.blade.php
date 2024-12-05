@extends('layouts.base')
@section('mecanica')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12" style="display: flex; justify-content: space-between; width: 100%">
                <h4 class="page-title">Veiculos</h4>
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
                                    <th>Nome do Motorista</th>
                                    <th>Tipo de Veiculo</th>
                                    <th>Cilindrada</th>
                                    <th>Peso</th>
                                    <th>Lotação</th>
                                    <th>Nº Chaci</th>
                                    <th>Nº Matricula</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($veiculo as $veicu)
                                    <tr>
                                        <td>{{$veicu->motorista->nomeCompleto}}</td>
                                        <td>{{$veicu->tipo}}</td>
                                        <td>{{$veicu->cilindrada}}</td>
                                        <td>{{$veicu->peso}}</td>
                                        <td>{{$veicu->lotacao}}</td>
                                        <td>{{$veicu->numero_chaci}}</td>
                                        <td>{{$veicu->matricula}}</td>
                                        <td>
                                            <a href="#Cadastrar" data-toggle="modal" style="font-size: 16pt" onclick="editar({{$veicu}})" class="text-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('veiculo.show',$veicu)}}" style="font-size: 16pt" class="text-danger ml-2"><i class="fa fa-trash"></i></a>
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
                        <h5 class="modal-title">Cadastrar de Veiculo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                   <form action="{{route('veiculo.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="matricula">Numéro de matriculo</label>
                            <div class="form-input">
                                <input type="text" class="form-control" name="matricula" id="matricula">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="numero_chaci">Numéro do Chaci</label>
                            <div class="form-input">
                                <input type="text" class="form-control" name="numero_chaci" id="numero_chaci">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lotacao">Lotação</label>
                            <div class="form-input">
                                <input type="text" class="form-control" name="lotacao" id="lotacao">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cilindrada">Cilindragem</label>
                            <div class="form-input">
                                <input type="text" class="form-control" name="cilindrada" id="cilindrada">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipo">tipo</label>
                            <div class="form-input">
                                <select class="form-control" name="tipo" id="tipo">
                                    <option value="Ligero">Ligero</option>
                                    <option value="Pesado">Pesado</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="peso"> Peso</label>
                            <div class="form-input">
                                <input type="text" class="form-control" name="peso" id="peso">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="motorista_id">Motorista</label>
                            <div class="form-input">
                                <select class="form-control" name="motorista_id" id="motorista_id">
                                    @foreach (App\Models\Motorista::orderBy('nomeCompleto','ASC')->get() as $item)
                                        <option value="{{$item->id}}">{{$item->nomeCompleto}}</option>
                                    @endforeach
                                </select>
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
        document.getElementById('matricula').value = valor.matricula;
        document.getElementById('cilindrada').value = valor.cilindrada;
        document.getElementById('peso').value = valor.peso;
        document.getElementById('numero_chaci').value = valor.numero_chaci;
        document.getElementById('motorista_id').value = valor.motorista_id;
        document.getElementById('lotacao').value = valor.lotacao;
        document.getElementById('tipo').value = valor.tipo;
    }
    function limpar() {
        document.getElementById('id').value = ""
        document.getElementById('nomeCompleto').value = ""
        document.getElementById('cilindrada').value = ""
        document.getElementById('peso').value = ""
        document.getElementById('numero_chaci').value = ""
        document.getElementById('motorista_id').value = ""
        document.getElementById('lotacao').value = ""
        document.getElementById('tipo').value = ""
    }
    
</script>
@endsection