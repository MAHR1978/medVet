<div class="table-responsive">
<table class="table atendidas" id="ListadoCan">
  <thead class="thead-light">
    <tr>
      <th scope="col" style="background-color: #808080; color: #fff;">Centro</th>
      @if(Auth::user()->role == 'paciente')
      <th scope="col" style="background-color: #808080; color: #fff;">Veterinario</th>
      @elseif(Auth::user()->role == 'medico')
      <th scope="col" style="background-color: #808080; color: #fff;">Paciente</th>
      @endif
      <th scope="col" style="background-color: #808080; color: #fff;">Fecha</th>
      <th scope="col" style="background-color: #808080; color: #fff;">Hora</th>
      <th scope="col" style="background-color: #808080; color: #fff;">Estado</th>
      <th scope="col" style="background-color: #808080; color: #fff;">Acciones</th>
    </tr>
  </thead>
  <tbody>
      @if(empty($horasatendidas))
      <p>sin datos</p>
      @else
        @foreach($horasatendidas as $atendidas)
      <tr>
        <td>{{ $atendidas->centrosmedicos->centro }}</td>
        @if(Auth::user()->role == 'medico')
        <td>{{ $atendidas->usuarios->name.' '.$atendidas->usuarios->apellido_paterno.''.$atendidas->usuarios->apellido_materno }}</td>
        @elseif(Auth::user()->role == 'paciente')
        <td>{{ $atendidas->veterinarios->name.' '.$atendidas->veterinarios->apellido_paterno.' '.$atendidas->veterinarios->apellido_materno }}</td>
        @endif
        <td>{{ $atendidas->fecha }}</td>
        <td>{{ $atendidas->formatHora() }}</td>
        <td><span class="badge mb-5 badge-success">{{ $atendidas->status }}</span></td>
        <td>       
            <a href="{{ url('/horas-atendidas/'.Crypt::encrypt($atendidas->atencion_id).'') }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ver Detalle"><i class="mdi mdi-eye"></i> Ver</a>
        </td>
      </tr>
    
    @endforeach
    @endif
  </tbody>
</table>
</div>