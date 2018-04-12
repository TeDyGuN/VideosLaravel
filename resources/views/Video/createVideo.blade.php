@extends('Plantilla/plantilla')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li><a href="{{ url("home")}}">Inicio</a></li>
            <li>Subir Video</li>
        </ol>
    </div>
    <!-- Small boxes (Stat box) -->

    <div class="container">
       <div class="row">
           <div class="panel panel-default" id="panel-profin">
               <div class="panel-heading">
                   <h3 class="panel-title" style="text-align: center">Subir Video</h3>
               </div>
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
                         <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"  action="{{ url('video/save') }}">
                             {{ csrf_field() }}
                             <div class="form-group {{ $errors->has('tittle') ? ' has-error' : '' }}">
                                 <label for="tittle" class="col-md-4 control-label">Titulo</label>

                                 <div class="col-md-6">
                                     <input id="tittle" type="text" class="form-control" name="tittle" required>
                                     @if ($errors->has('tittle'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('tittle') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                 <label for="description" class="col-md-4 control-label">Descripción</label>
                                 <div class="col-md-6">
                                     <textarea class="form-control" rows="6" name="description" style="overflow:hidden"></textarea>

                                     @if ($errors->has('description'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('description') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>

                             <div class="form-group {{ $errors->has('mini') ? ' has-error' : '' }}">
                                 <label for="mini" class="col-md-4 control-label">Miniatura</label>

                                 <div class="col-md-6">
                                     <input id="mini" type="file" class="form-control" name="mini" required>
                                     @if ($errors->has('mini'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('mini') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="form-group {{ $errors->has('video') ? ' has-error' : '' }}">
                                 <label for="video" class="col-md-4 control-label">Video</label>

                                 <div class="col-md-6">
                                     <input id="video" type="file" class="form-control" name="video" required>
                                     @if ($errors->has('video'))
                                         <span class="help-block">
                                             <strong>{{ $errors->first('video') }}</strong>
                                         </span>
                                     @endif
                                 </div>
                             </div>
                             <div class="form-group {{ $errors->has('duration') ? ' has-error' : '' }}">
                                 <label for="tittle" class="col-md-4 control-label">Duracion del Video</label>

                                 <div class="col-md-5">
                                     <input id="duration" type="text" class="form-control" name="duration" required>
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
                                   <button type="submit" class="btn btn-primary btn-block">
                                       <i class="fa fa-btn fa-user"></i> Subir Video
                                   </button>
                                 </div>
                             </div>
                         </form>
                     <br><br>
                     {{$success = Session::get('success')}}
                     @if ($success)
                         <div class="alert alert-success">
                             <strong>!!Felicidades!!</strong>Se subio el Video Correctamente <br><br>
                         </div>
                     @endif
                </div>
           </div>
       </div>
@endsection
