
@extends('layouts/layoutMaster')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
          <h5 class="card-title mb-sm-0 me-2">Crear Pedido</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <!-- 1. Delivery Address -->
              <br>
              <h5 class="mb-4"> Información del pedido</h5>
              <form id="pedidoForm">
                @csrf
                  <div class="row g-3">
                        <div class="col-md-6">
                            <label for="descripcion"  class="form-label">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" class="nombre form-control" rows="3" required></textarea>
                        </div>
                        <input type="hidden" name="proyecto" value="{{ $proyecto->IdProyecto }}">
            
                        <div class="col-md-6">
                            <label for="proveedor"  class="form-label">Proveedor:</label>
                        <select class="form-select" name="proveedor" id="proveedor" aria-label="Default select example">
                            <option value="">Seleccionar proveedor</option>
                        @forelse ($proveedores as $proveedor)
                            <option value="{{ $proveedor->IdProveedor}}">{{$proveedor->Nombre}} </option>
                        @empty
                            
                        @endforelse
                        </select>
                        </div>
                        
                        <div class="col-md-6">
                        <label for="fecha" class="form-label">Fecha:</label>
                        <input type="date" name="fecha" id="fecha" class="form-control">
                        </div>
            
                        <div class="col-md-6">
                            <label for="concepto"  class="form-label">Concepto:</label>
                            <select class="form-select" name="concepto" id="concepto" aria-label="Default select example">
                            <option value="">Seleccionar concepto</option>
                            @forelse ($conceptos as $concepto)
                                <option value="{{ $concepto->IdConcepto}}">{{$concepto->Nombre}} </option>
                            @empty
                                
                            @endforelse
                            </select>
                        </div> 
                        <input type="text" name="admin" id="admin" value="{{ $user->id }}">

                        <div class="col-md-6">
                            <label for="valor"  class="form-label">Valor:</label>
                            <input type="number" name="valorTotal" id="valorTotal" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Valor Total">
                        </div>
                        <div class="col-md-6">
                            <label for="poster" class="form-label">Factura Pedido:</label>
                            <input type="file" name="poster" id="poster" class="form-control" accept="application/pdf">
                        </div>
                  </div><br><br>
                  <h3>Detalle Pedido</h3><br>
        
                  <!-- Campos de entrada para los detalles de pedido -->
                  <div class="detalle d-flex">
                      <div class="input-group d-block">
                          <label for="materiaPrima">Materia Prima :</label><br>
                          <select class="form-select w-75" name="materiaPrima[]" aria-label="Default select example">
                              <option value="">Seleccionar</option>
                              @forelse ($materiaprimas as $materia)
                              <option value="{{ $materia->IdMateriaPrima }}">{{ $materia->Nombre }} </option>
                              @empty
                              @endforelse
                          </select>
                      </div>
                      <div class="input-group mb-3 d-block">
                          <label for="cantidad">Cantidad :</label><br>
                          <input type="number" name="cantidad[]" class="form-control w-75" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                      <div class="input-group d-block">
                        <label for="materiaPrima">Medida:</label><br>
                        <select class="form-select w-75" name="medida[]" aria-label="Default select example">
                            <option value="">Seleccionar</option>
                            @forelse ($medidas as $medida)
                            <option value="{{ $medida->IdMedida }}">{{ $medida->Simbolo }} </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                      <div class="input-group mb-3 d-block">
                          <label for="valorUnitario">Valor Unitario :</label><br>
                          <input type="number" name="valorUnitario[]" class="form-control w-75" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                      <div class="input-group mb-3 d-block">
                          <label for="total">Valor :</label><br>
                          <input type="number" name="total[]" class="form-control w-75" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                      <button type="button" class="btn" style="height: 40px; color: #fff; background: #5b95d7; margin-top: 20px; color: #fff" onclick="agregarDetalle()">Guardar</button>
                  </div>
                  <!-- Tabla para mostrar los detalles de pedido -->
                  <table id="tabla-detalles" class="table">
                    <thead>
                        <tr>
                            <th>Materia Prima</th>
                            <th>Cantidad</th>
                            <th>Medida</th>
                            <th>Valor Unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se agregarán las filas de detalles del pedido automáticamente -->
                    </tbody>
                  </table>
        
                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-outline-secondary m-2"><a href="{{ route('index-pedidos', ['id' => $proyecto->IdProyecto])}}" style="text-decoration: none">Cancelar</a></button>
                  <button type="submit" class="btn btn-outline-primary m-2" onclick="enviarFormulario()">Crear Pedido</button>
                </div>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
     let materiaPrimaData = {}; // Un diccionario para almacenar los nombres de materia prima
    let medidaData = {}; // Un diccionario para almacenar los símbolos de medida

    // Llena los diccionarios con datos al cargar la página (por ejemplo, en el documento.ready)
    document.addEventListener("DOMContentLoaded", function() {
      @foreach ($materiaprimas as $materia)
        materiaPrimaData[{{ $materia->IdMateriaPrima }}] = "{{ $materia->Nombre }}";
      @endforeach

      @foreach ($medidas as $medida)
        medidaData[{{ $medida->IdMedida }}] = "{{ $medida->Simbolo }}";
      @endforeach
    });

    let detalleTable = document.getElementById("tabla-detalles").getElementsByTagName('tbody')[0];

    function agregarDetalle() {

      console.log("Holaaa");
      // Obtener los valores ingresados
      let materiaPrima = document.querySelectorAll("select[name='materiaPrima[]']");
      let cantidad = document.querySelectorAll("input[name='cantidad[]']");
      let medida = document.querySelectorAll("select[name='medida[]']");
      let valorUnitario = document.querySelectorAll("input[name='valorUnitario[]']");
      let total = document.querySelectorAll("input[name='total[]']");

      // Crear una nueva fila de tabla por cada conjunto de valores
      for (let i = 0; i < materiaPrima.length; i++) {
        let materiaPrimaID = materiaPrima[i].value;
        let cantidadValue = parseFloat(cantidad[i].value);
        let medidaID = medida[i].value;
        let valorUnitarioValue = parseFloat(valorUnitario[i].value);
        let totalValue = cantidadValue * valorUnitarioValue; // Calcular el total

        // Buscar el nombre de la materia prima y el símbolo de la medida en los diccionarios
        let materiaPrimaName = materiaPrimaData[materiaPrimaID];
        let medidaSymbol = medidaData[medidaID];

        // Crear una nueva fila de tabla
        let newRow = detalleTable.insertRow();

        // Agregar celdas con los valores
        let cell1 = newRow.insertCell(0);
        let cell2 = newRow.insertCell(1);
        let cell3 = newRow.insertCell(2);
        let cell4 = newRow.insertCell(3);
        let cell5 = newRow.insertCell(4);
        let cell6 = newRow.insertCell(5); // Agregar una nueva celda para el botón de eliminar
        let cell7 = newRow.insertCell(6);//Nidia Nieto
        let cell8 = newRow.insertCell(7);//Nidia Nieto


        cell1.innerHTML = materiaPrimaName; // Mostrar el nombre de la materia prima
        cell2.innerHTML = cantidadValue;
        cell3.innerHTML = medidaSymbol; // Mostrar el símbolo de la medida
        cell4.innerHTML = valorUnitarioValue;
        cell5.innerHTML = totalValue.toFixed(2); // Redondear el total a dos decimales
        cell6.innerHTML = '<button type="button" class="btn btn-danger" onclick="eliminarDetalle(this)">Eliminar</button>';
        cell7.innerHTML = materiaPrimaID; //Nidia Nieto
        cell8.innerHTML = medidaID; //Nidia Nieto

        // Limpiar los campos de entrada
        materiaPrima[i].value = "";
        cantidad[i].value = "";
        medida[i].value = "";
        valorUnitario[i].value = "";
        total[i].value = "";
      }
    }

    // Función para eliminar una fila de la tabla
    function eliminarDetalle(button) {
      // Obtener la fila que contiene el botón
      let row = button.closest("tr");
      row.parentNode.removeChild(row);
    }

    function enviarFormulario() {
      // Obtener los datos del formulario
      let descripcion = document.getElementById('descripcion').value;
      let proveedor = document.getElementById('proveedor').value;
      let fecha = document.getElementById('fecha').value;
      let concepto = document.getElementById('concepto').value;
      let valorTotal = document.getElementById('valorTotal').value;

      // Obtener el archivo PDF
      let poster = document.getElementById('poster').files[0];

      console.log("Descripción:", descripcion);
      console.log("Proveedor:", proveedor);
      console.log("Fecha:", fecha);
      console.log("Concepto:", concepto);
      console.log("Administrador:", admin);
      console.log("Archivo:", poster);
      console.log("Valor:", valorTotal);

      // Crear un objeto FormData para enviar datos y archivos
      let formData = new FormData();
      formData.append('_token', '{{ csrf_token() }}');
      formData.append('descripcion', descripcion);
      formData.append('proyecto', '{{ $proyecto->IdProyecto }}');
      formData.append('proveedor', proveedor);
      formData.append('fecha', fecha);
      formData.append('concepto', concepto);
      formData.append('admin', '{{ $user->id }}');
      formData.append('poster', poster);
      formData.append('valorTotal', valorTotal);

      // Obtener los datos de la tabla (detalles de pedido)
      let filas = document.querySelectorAll('#tabla-detalles tbody tr');
      let detallesPedidos = [];

      filas.forEach(function (fila) {
        let celdas = fila.querySelectorAll('td');
        let materiaPrima = celdas[6].textContent; //Nidia Nieto
        let cantidad = parseFloat(celdas[1].textContent);
        let medida = celdas[7].textContent;//Nidia Nieto
        let valorUnitario = parseFloat(celdas[3].textContent);
        let total = parseFloat(celdas[4].textContent);

        // Imprimir los valores de cada fila en la consola
        console.log("Materia Prima:", materiaPrima);
        console.log("Cantidad:", cantidad);
        console.log("Medida:", medida);
        console.log("Valor Unitario:", valorUnitario);
        console.log("Total:", total);

        // Agregar los datos de cada fila a un objeto
        let filaDatos = {
          materiaPrima: materiaPrima,
          cantidad: cantidad,
          medida: medida,
          valorUnitario: valorUnitario,
          total: total
        };

        detallesPedidos.push(filaDatos);
      });

      // Agregar detalles de pedido al FormData
      formData.append('detallesPedidos', JSON.stringify(detallesPedidos));

      // Realizar la solicitud AJAX de tipo POST
      $.ajax({
        url: '{{ route('pedidos.store') }}', // Reemplaza con la URL correcta de tu controlador
        type: 'POST',
        data: formData,
        processData: false, // Evitar que jQuery procese los datos
        contentType: false, // Evitar que jQuery configure el encabezado Content-Type
        success: function (response) {
          // Manejar la respuesta del controlador si es necesario
          console.log('Respuesta del controlador:', response);

          // Mostrar un mensaje de éxito al usuario
          alert('Pedido creado exitosamente');
        },
        error: function (error) {
          console.error('Error al enviar datos del formulario a Laravel:', error);
          // Mostrar un mensaje de éxito al usuario
          alert('Error al enviar los datos');
        }
      });
}
  </script>
@endsection
