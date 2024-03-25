@extends('home')

@section('contenido')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="btn btn-sm btn-outline-info"><i class="icon mdi mdi-arrow-left"></i>  Home</a></li>
  </ol>
</nav>
<div class="card" style="border-color: #808080;">
    <div class="card-header" style="background-color: #808080; color: #fff;">
      <button type="button" class="btn btn-info btn-sm" style="background-color: #FF4747; color: #fff;" id="btnUsuario"  data-toggle="tooltip" data-placement="top" title="Agregar nuevo usuario"><i class="mdi mdi-plus-box"></i> Agregar</button>
    </div>
    
   <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="ListadoAreas">
              <thead class="thead-light">
                <tr>
                  <th scope="col" style="background-color: #808080; color: #fff;">Rut</th>
                  <th scope="col" style="background-color: #808080; color: #fff;">Nombre</th>
                  <th scope="col" style="background-color: #808080; color: #fff;">Dirección</th>
                  <th scope="col" style="background-color: #808080; color: #fff;">Teléfono</th>
                  <th scope="col" style="background-color: #808080; color: #fff;">Email</th>
                  <th scope="col" style="background-color: #808080; color: #fff;">Acciones</th>
                </tr>
              </thead>
              @foreach($veterinario as $vet)
                <tr>
                    <td>{{$vet->rut}}</td>
                    <td>{{$vet->name.' '.$vet->apellido_paterno.' '.$vet->apellido_materno }}</td>
                    <td>{{$vet->direccion}}</td> 
                    <td>{{$vet->fono}}</td>
                    <td>{{$vet->email}}</td>
                    <td>
                      <a href="{{route('usuarios.edit',Crypt::encrypt($vet->id))}}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Editar Usuario"><i class="mdi mdi-pencil"></i></a>
                      <!--<a href="#" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Horario Usuario"><i class="mdi mdi-calendar-clock"></i></a>-->
                    </td>         
                </tr>
              @endforeach
          </table>
        </div>
    </div>
  </div>
<div class="modal fade" id="UsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="border-color: #E0004D;">
        <div class="modal-header" style="background-color: #808080">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Ingreso de Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #fff;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('usuarios.store')}}" method="POST" id="FormUsuario" files="true" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  
                    <label for="inputPassword3">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" required autofocus>
                  
                </div>
              </div>
              <div class="col-md-6 mb-16">
              <div class="form-group">
                <label for="inputPassword3">Rut</label>
                  <input type="text" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" id="rut" maxlength="9" placeholder="Sin puntos ni guion"  onkeypress="return numeros(event)">
              </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Apellido Paterno</label>
                    <input type="text" class="form-control" name="apellido_paterno" id="apellidopaterno">
                </div>
              </div>
              <div class="col-md-6 mb-16">
              <div class="form-group">
                <label for="inputPassword3">Apellido Materno</label>
                  <input type="text" class="form-control" name="apellido_materno" id="apellidomaterno">
              </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-16">
              <div class="form-group">
                <label for="inputPassword3">Teléfono</label>
                  <input type="text" class="form-control" name="fono" id="fono" maxlength="10" onkeypress="return numeros(event)">
              </div>
              </div>
              <div class="col-md-6 mb-16">
              <div class="form-group">
                <label for="inputPassword3">Direccion</label>
                  <input type="text" class="form-control" name="direccion" id="direccion">
              </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Comuna</label>
                    <input type="text" class="form-control" name="comuna" id="comuna">
                </div>
              </div>
            </div>  
            <div class="form-row">
              <div class="col-md-6 mb-16">
                <div class="form-group">
                  <label for="inputPassword3">Email</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-16">
              <div class="form-group">
                <label for="inputPassword3">Password</label>
                  <input type="password" class="form-control" name="pass1" id="pass1" value="123456"  readonly >
              </div>
              </div>
              <div class="col-md-6 mb-16">
              <div class="form-group">
                <label for="inputPassword3">Confirma Password</label>
                  <input type="password" class="form-control" name="pass2" id="pass2" value="123456" readonly>
              </div>
              </div>
            </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-block" id="IngresaUsuario">Guardar</button>
      </form>
        </div>
      </div>
    </div>
  </div>


  @endsection
  @section('scripts')
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@latest"></script>
    <script type="text/javascript">
     $(document).ready(function($) {
       // Función para validar el RUT
    function validarRut(rut) {
        // Eliminar puntos y guiones del RUT
        rut = rut.replace(/\./g,'').replace('-', '');

        // Separar el cuerpo y el dígito verificador
        var cuerpo = rut.slice(0, -1);
        var dv = rut.slice(-1).toUpperCase();

        // Calcular el dígito verificador esperado
        var suma = 0;
        var multiplo = 2;

        for (var i = cuerpo.length - 1; i >= 0; i--) {
            suma += parseInt(cuerpo.charAt(i)) * multiplo;
            multiplo = (multiplo < 7) ? multiplo + 1 : 2;
        }

        var dvEsperado = 11 - (suma % 11);

        // Manejar casos especiales para dígito verificador
        dvEsperado = (dvEsperado === 10) ? 'K' : (dvEsperado === 11) ? '0' : dvEsperado.toString();

        // Comparar el dígito verificador ingresado con el esperado
        return (dv === dvEsperado);
    }

    // Manejar clic en el botón de validación
    $('#rut').on('blur', function() {
        var rutInput = $('#rut').val();

        // Validar el RUT y mostrar el resultado
        if (validarRut(rutInput)) {
            console.log('RUT válido.');
        } else {
          $('#rut').val('');
            //alert('RUT inválido.');
            toastr.error('Ingrese el rut valido', 'Error!', {timeOut: 3000})
        }
    });
        $('.table').DataTable({          
        "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
          },
          //'processing' : true,
        });
          $('.table').on('draw.dt', function () {
            $('[data-toggle="tooltip"]').tooltip();
            //alert("vamos que se puede 2")
          });
            $('#btnUsuario').on('click', function(e) {
              e.preventDefault();
              // alert("pasando")
              $('#UsuarioModal').modal({backdrop: 'static', keyboard: false, show: true});
            });
            /*$('#rut').Rut({
              on_error: function(){ 
                  swal("¡Error!", "¡Rut Incorrecto!", "error");
                  $('#rut').val(''); 
                  },
              format_on: 'keyup'
            });*/
        $('#IngresaUsuario').on('click', function(e) {
            e.preventDefault();
            var Nombre = $("#nombre").val();
            var rut = $("#rut").val();
            var ApellidoPaterno = $("#apellidopaterno").val();
            var ApellidoMaterno = $("#apellidomaterno").val();
            var Direccion = $("#direccion").val();
            var comuna = $("#comuna").val();
            var Fono = $("#fono").val();
            var Email = $("#email").val();
           // alert(rut)
           if(Nombre === '')
            {
                toastr.error('Ingrese el nombre', 'Error!', {timeOut: 3000})
                return false;
            }
            if(rut === '')
            {
                toastr.error('Ingrese el rut', 'Error!', {timeOut: 3000})
                return false;
            }
            if(ApellidoPaterno === '')
            {
                toastr.error('Ingrese el Apellido Paterno', 'Error!', {timeOut: 3000})
                return false;
            }
            if(ApellidoMaterno === '')
            {
                toastr.error('Ingrese el Apellido Materno', 'Error!', {timeOut: 3000})
                return false;
            }
            if(Fono === '')
            {
                toastr.error('Ingrese el Fono', 'Error!', {timeOut: 3000})
                return false;
            }
            if(Direccion === '')
            {
                toastr.error('Ingrese el Direccion', 'Error!', {timeOut: 3000})
                return false;
            }
            if(comuna === '')
            {
                toastr.error('Ingrese el Direccion', 'Error!', {timeOut: 3000})
                return false;
            }
            var form = $('#FormUsuario');
            var url = form.attr('action');
            let data= form.serialize();
            //alert(data);
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: 'POST',
                data: form.serialize(),
                dataType: 'JSON',
                success: function(respuesta) {
                    //alert("paso bien index!!")
                if (respuesta.message == 'success') {
                    //swal("OK!", "Veterinario Ingresado Correctamente!", "success")
                    alert("OK!, Veterinario Ingresado Correctamente!, success");
                    location.reload();
                    /*.then((value) => {
                        $("#FormVeterinaria")[0].reset();
                        //$('.table').DataTable().ajax.reload();
                        
                    });*/
                 }
                },
                error: function (respuesta) {
                  /*swal({
                    title: "Error!",
                    text: "El Email Ya Está Registrado",
                    icon: "error",
                    buttons: {willDelete: "Entendido!",},
                    dangerMode: true,
                    })¨*/
                   alert("Error!, El Email Ya Está Registrado")
                  //.then((willDelete) => {
                 location.reload();
                    //alert(respuesta)
                }
            })
          })
        })
        function numeros(e){
        var tecla = e.keyCode;
        var input = e.target;
        var contenido = input.value;

            if (tecla==8 || tecla==9 || tecla==13){
                return true;
            }               
            var patron =/[0-9.]/;
            var tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
    </script>
  @endsection