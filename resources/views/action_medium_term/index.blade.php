@extends('layouts.app')
@section('title')
    Planificacion
@endsection
@section('breadcrums')
    {{ Breadcrumbs::render('action_medium_term') }}
@endsection
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header card-calendar">

                    <h4 class="card-title ">
                        {{$title??''}}
                        <small class="float-sm-right">
                            {{-- <a href="{{url('amp_report_excel')}}" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> </a>  --}}
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ActionMediumTermModal" data-backdrop="static" data-keyboard="false" data-json="null" > Nuevo  <i class="fa fa-plus-circle"></i> </button>
                        </small>
                    </h4>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="lista" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cod.</th>
                                <th>Accion Mediano Plazo</th>
                                <th>Resultado</th>
                                <th>Meta</th>
                                <th>Ponderacion</th>
                                <th>Ejecutado</th>
                                <th>Eficacia</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lista as $item)
                            <tr>
                                <td>{{$item->code}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->resultado_intermedio}}</td>
                                <td>{{ number_format($item->alcance_meta , 2, ',', '.')}}</td>
                                <td>{{$item->weighing }}</td>
                                <td>{{$item->executed??'' }}</td>
                                <td>{{$item->efficacy?$item->efficacy.'%':'' }}</td>
                                <td>
                                    <a href="{{url('action_short_term_year/'.$item->years[0]->id)}}"><i class="material-icons text-warning">folder</i></a>
                                    <a href="#" data-toggle="modal" data-target="#ActionMediumTermModal" data-backdrop="static" data-keyboard="false" data-json="{{$item}}"><i class="material-icons text-primary">edit</i></a>
                                    <a href="#"> <i class="material-icons text-danger deleted" data-json='{{$item}}'>delete</i></a>
                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>
                            {{-- <div id='calendar'></div> --}}
                </div>
            </div>
        </div>

        {{-- aqui los modals --}}
    <years-component url='{{url('action_medium_term')}}' csrf='{!! csrf_field('POST') !!}' :structures="{{$programmatic_structures}}  " ></year-component>


    </div>

@endsection
<script>

    @section('script')
        var classname = document.getElementsByClassName("deleted");
        // console.log(classname);
        function deleteItem(){

            var data = JSON.parse(this.getAttribute("data-json"));

            Swal.fire({
            title: 'Esta Seguro de Eliminar '+data.code+'?',
            text: "una vez eliminado no se podra revertir la accion!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar!',
            cancelButtonText: 'No'
            }).then((result) => {
            if (result.value) {

                axios.delete(`action_medium_term/${data.id}`)
                    .then(response=>{
                        console.log(response);
                        location.reload();
                    })
                    .catch(error=>{
                        // handle error
                        Swal.fire(
                        'Error! contactese con soporte tecnico',
                        ''+error,
                        'error'
                        )
                        // console.log(error);
                    });


            }
            })

        }
        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', deleteItem, false);
        }
    @endsection
</script>
