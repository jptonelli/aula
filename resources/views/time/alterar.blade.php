@extends('admin_layout.index')

@section('admin_template')

<div class="container-fluid px-4">
    <h1 class="mt-4">Times</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Times</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Alteração de Equipe
        </div>
        <div class="card-body">
            <form method="POST" action="/time/upd">
                @csrf <!-- TOKEN PARA SEGURANÇA -->
                <input type="hidden" name="id" id="id" value="{{$time->id}}">
                <div class="modal-body">
                    <label class="form-label" for="time_nome">Nome da Equipe</label>
                    <input class="form-control" type="text" name="time_nome" id="time_nome" value="{{$time->time_nome}}">

                    <label class="form-label" for="time_estado">Estado da Equipe</label>
                    <input class="form-control" type="text" name="time_estado" id="time_estado" value="{{$time->time_estado}}">
                </div>
                
                <div class="modal-footer" style="margin-top:10px;gap:10px">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection