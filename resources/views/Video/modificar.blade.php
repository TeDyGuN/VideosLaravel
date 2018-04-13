@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Inicio</li><li>Modificar Video</li>
        </ol>
    </div>
    <!-- Small boxes (Stat box) -->
    <div class="container">
        <div class="row" >
            <div class="">
                <div class="panel panel-default" id="panel-profin">
                    <div class="panel-heading text-center textoHeader">Modificacion de Video</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Hay problemas con tus Entradas<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('updateVideo') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $video->id }}">
                                <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                                    <label for="titulo" class="col-md-4 control-label">Titulo</label>

                                    <div class="col-md-6">
                                        <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $video->tittle }}">

                                        @if ($errors->has('titulo'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description" class="col-md-4 control-label">Descripción</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" rows="6"  name="description">
                                          {{ $video->description }}
                                        </textarea>

                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('duration') ? ' has-error' : '' }}">
                                    <label for="tittle" class="col-md-4 control-label">Duracion del Video</label>

                                    <div class="col-md-5">
                                        <input id="duration" type="text" class="form-control" name="duration" required value="{{ $video->duration }}" >
                                        @if ($errors->has('duration'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('duration') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-1">
                                      <span>MM:SS</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i> Modificar Video
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <br><br>
                        {{$success = Session::get('success')}}
                        @if ($success)
                            <div class="alert alert-success">
                                <strong>!!Felicidades!!</strong> Se Modifico el Video Correctamente <br><br>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
