
<!-- Extra Large Modal -->
<div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel4">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin-store') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Nombre</label>
                    <input class="form-control" type="text" id="Nombre" name="Nombre" placeholder="Ingresar Nombre" autofocus  required/>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Apellido</label>
                    <input class="form-control" type="text" name="Apellido" id="Apellido" placeholder="Ingresar Apellido" required/>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Numero de Documento</label>
                    <input class="form-control" type="text" name="NumDocumento" id="NumDocumento" placeholder="CC" required/>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="john.doe@example.com" required />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">CO (+57)</span>
                      <input type="text" id="Telefono" name="Telefono" class="form-control" placeholder="202 555 0111" required />
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="flatpickr-date" class="form-label">Fecha Nacimiento</label>
                    <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="FechaNacimiento" id="flatpickr-date" required />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="nameWithTitle" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-label-secondary" data-bs-dismiss="modal">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Crear Administrador</button>
                  </div>
                </div>  
              </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
const myforms = document.querySelectorAll('.needs-validation')

// Loop over them and prevent submission
Array.from(myforms).forEach(form => {
form.addEventListener('submit', event => {
    if (!form.checkValidity()) {
    event.preventDefault()
    event.stopPropagation()
    }

    form.classList.add('was-validated')
}, false)
})
</script>
