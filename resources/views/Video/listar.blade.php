@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Modificar Video</li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <div class="panel panel-default" id="panel-profin">
                    <div class="panel-heading textoHeader">Videos Registrados</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Categoria</th>
                                <th>Duracion</th>
                                <th colspan="2" class="text-center">Acciones</th>
                            </tr>
                            @foreach($videos as $v)
                                <tr data-id="{{ $v->id }}">
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->tittle }}</td>
                                    <td>{{ $v->categoria->nombre }}</td>
                                    <td>{{ $v->duration }}</td>
                                    <td>
                                      <a href="{{ url('modificarVideo/'.$v->id ) }}">
                                        <button type="submit" class="btn btn-primary center-block">
                                          Modificar
                                        </button>
                                      </a>
                                    </td>
                                    <td>
                                        <a href="" class="btn-delete">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $videos->setPath('videos'); !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <form id="form-delete" role="form" method="POST" action="{{ route('video-api.destroy', ':USER_ID') }}">

        <input name="_method" type="hidden"  value="DELETE">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
    </form>
@endsection
@section('addscripts')
    <script>
        $('.btn-delete').click(function()
        {
            event.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete');
            var url = form.attr('action').replace(':USER_ID', id);
            var data = form.serialize();
            row.fadeOut();
            $.post(url, data, function(result)
            {
                alert(result);
            }).fail(function()
            {
                alert('El Video No fue Eliminado');
                row.show();
            });
        });
    </script>
@endsection
