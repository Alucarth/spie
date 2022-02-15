@extends('layouts.app')
@section('title')
    EJES PDES
@endsection
@section('breadcrums')
    {{-- {{ Breadcrumbs::render('action_short_term_year',$year) }} --}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2">
            <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-info">

                    {{-- <div class="row">
                        <div class="col-md-4">
                                <i class="far fa-calendar" style="font-size:50px;"></i>
                        </div>
                        <div class="col-md-8">
                            <!-- /.widget-user-image -->
                            <h3 >Niveles PDES</h3>
                        </div>
                    </div> --}}
                    <div class="row">
                        <span>  <strong>Descripcion:</strong> Niveles de la estructura PDES</span>
                    </div>
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
                        @foreach ($niveles as $item)

                            <li class="nav-item" >
                                {{-- <a href="{{url($item['ruta'])}}" class="nav-link"> --}}
                                <a href="#" class="nav-link">

                                @if ($item['active']==true)
                                    <i class="fa fa-folder-open text-info"></i>
                                @else
                                    <i class="fa fa-folder text-warning"></i>
                                @endif
                                 {{ $item['nombre']  }}
                                 {{-- <span class="float-right badge bg-success"> <i class="fa fa-flag"></i> </span> --}}
                                </a>
                            </li>

                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-10 justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-calendar">

                        <h3 class="card-title">

                            <h4 class="card-title ">
                                {{$title??'Ejes'}}
                                <small class="float-sm-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalStructure" data-json="null" > Nuevo  <i class="fa fa-plus-circle"></i> </button>
                                </small>
                            </h4>

                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-md">
                            <table id="lista" class="table table-responsive table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col-1">Cod.</th>
                                        <th scope="col-5">Descripción</th>
                                        <th scope="col-1">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estructura as $item)
                                    <tr>
                                        <td>{{$item->codigo}}</td>
                                        <td>{{$item->descripcion}}</td>
                                        <td>
                                            <a href="{{url('planes/pdes/metas/'.$item->id)}}"><i class="material-icons text-warning">folder</i></a>
                                            <a href="#" data-toggle="modal" data-target="#ModalStructure" data-json="{{$item}}"><i class="material-icons text-primary">edit</i></a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-json="{{$item}}"><i class="material-icons text-danger">delete</i></a>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                        {{-- <div id='calendar'></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- aqui los modals --}}
<pdes-form-component url='{{url('pdes/ejes')}}' csrf='{!! csrf_field('POST') !!}'></pdes-form-component>

    <!-- Modal -->
    {!! Form::open(['action' => 'ActionShortTermController@delete'] )!!}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="deleteModalLabel">Eliminar la Accion a corto plazo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span></span>
                    <input type="text" name="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success">Si </button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close()!!}
@endsection
<script>
@section("script")
    $('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var object = button.data('json');  // Extract info from data-* attributes
    console.log(object);
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Eliminar ' + object.code)
    modal.find('.modal-body span').text("Desea eliminar la acciona mediano plazo "+object.code+"?");
    modal.find('.modal-body input').val(object.id);
    })
@endsection()
</script>
