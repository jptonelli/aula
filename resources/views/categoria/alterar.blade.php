@extends('admin_layout.index')

@section('admin_template')

<div class="container-fluid px-4">
    <h1 class="mt-4">Categorias</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Categorias</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Alteração de Categoria
        </div>
        <div class="card-body">
            <form method="POST" action="/categoria/upd">
                @csrf <!-- TOKEN PARA SEGURANÇA -->
                <input type="hidden" name="id" id="id" value="{{$categoria->id}}">
                <div class="modal-body">
                    <label class="form-label" for="cat_nome">Nome da Categoria</label>
                    <input class="form-control" type="text" name="cat_nome" id="cat_nome" value="{{$categoria->cat_nome}}">

                    <label class="form-label" for="cat_descricao">Descrição da Categoria</label>
                    <input class="form-control" type="text" name="cat_descricao" id="cat_descricao" value="{{$categoria->cat_descricao}}">
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