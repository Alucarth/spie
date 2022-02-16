@extends('layouts.app')
@section('title')
    PGDES
@endsection
@section('breadcrums')
    {{-- {{ Breadcrumbs::render('action_short_term_year',$year) }} --}}
@endsection
@section('content')
    <div class="row">

        <div class="col-md-12 justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-calendar">

                        <h3 class="card-title">

                            <h4 class="card-title ">
                                {{$title??''}}
                                <small class="float-sm-right">
                                    {{-- <a href="{{url('amp_report_excel')}}" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> </a>  --}}
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ProgramaticModal" data-json="null" > Nuevo  <i class="fa fa-plus-circle"></i> </button>
                                </small>
                            </h4>

                        </h3>
                    </div>
                    <div class="card-body">
                        {{-- {{$programmatic_structures}} --}}

                        <table id="programatic_list" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Formulario</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formularios as $item)
                                <tr>
                                    <td>{{$item->entidad->codigo}}</td>
                                    <td>{{$item->entidad->descripcion}}</td>
                                    <td>{{$item->formulario->sigla}}</td>
                                    <td>
                                        {{-- <a href="{{url('ast_operations/'.$item->id)}}"><i class="material-icons text-warning">folder</i></a> --}}
                                        <a href="#" data-toggle="modal" data-target="#ProgramaticModal" data-backdrop="static" data-keyboard="false" data-json="{{$item}}"><i class="material-icons text-primary">edit</i></a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModal" data-backdrop="static" data-keyboard="false" data-json="{{$item}}"><i class="material-icons text-danger">delete</i></a>
                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>
                        {{-- <div id='calendar'></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- aqui los modals --}}
    <asignacion-formulario-component url='{{url('entidades/asignacionFormularios')}}' csrf='{!! csrf_field('POST') !!}'></asignacion-formulario-component>
    {{-- <indicadores-component url='{{url('action_short_term')}}' csrf='{!! csrf_field('POST') !!}' year="{{$year}}" :structures="{{$programmatic_structures}}"  ></indicadores-component> --}}

    <!-- Modal -->
    {!! Form::open(['action' => 'PgdesStructureController@delete'] ) !!}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="deleteModalLabel">Eliminar el Pilar del PGDES.?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span></span>
                    <input type="text" name="id" hidden>
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

$('#programatic_list').DataTable({
                responsive: true,
                language: spanish_lang

            });

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var object = button.data('json');  // Extract info from data-* attributes
        console.log(object);
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Eliminar ' + object.code)
        modal.find('.modal-body span').text("Desea eliminar el Pilar del PGDES con codigo: "+object.code+"?");
        modal.find('.modal-body input').val(object.id);
    })
@endsection()
</script>
