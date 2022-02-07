@extends('layouts.app')
@section('title')
    {{$title}}
@endsection
@section('breadcrums')
{{ Breadcrumbs::render('roles') }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-calendar">
                    <h4 class="card-title" > {{$title}}
                        <small class="float-sm-right">

                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#RoleModal" data-json="null" > Nuevo  <i class="fa fa-plus-circle"></i> </button>
                        </small>
                    </h4>
                </div>

                <div class="card-body">

						<table id="rol_table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    {{-- <th>Descripcion</th> --}}
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
								@foreach($roles as $rol)
                                <tr>
									<td>{{$rol->name}}</td>
									{{-- <td>{{$rol->description}}</td> --}}
                                    <td>

                                        <a href="#" data-toggle="modal" data-target="#RoleModal" data-backdrop="static" data-keyboard="false" data-json="{{$rol}}"><i class="material-icons text-primary">edit</i></a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModal" data-backdrop="static" data-keyboard="false" data-json="{{$rol}}"><i class="material-icons text-danger">delete</i></a>
                                    </td>
								</tr>
								@endforeach
                            </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>

    {{-- aqui los modals --}}
    <role-component url='{{url('role_save')}}' csrf='{!! csrf_field('POST') !!}' ></role-component>

     {{-- <!-- Modal -->
     {!! Form::open(['action' => 'RolController@delete'] )!!}
     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header bg-danger">
                     <h5 class="modal-title" id="deleteModalLabel">Eliminar el Rol </h5>
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
     {!! Form::close()!!} --}}

</div>
@endsection
<script>
@section('script')

            $('#rol_table').DataTable();

@endsection
</script>
