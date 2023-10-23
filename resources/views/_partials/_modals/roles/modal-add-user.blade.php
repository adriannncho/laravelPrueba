

<!-- Vertically Centered Modal -->
<div class="col-lg-4 col-md-6">
    <div class="mt-3">
      
      <!-- Modal -->
      <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Crear Usuario</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('roles-store') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <div class="row">
                      <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">Nombre</label>
                        <input type="text" name="name" id="nameWithTitle" class="form-control" placeholder="Ingresar Nombre" required>
                      </div>
                    </div>
                    <div class="row g-2">
                      <div class="col mb-0">
                        <label for="emailWithTitle" class="form-label">Email</label>
                        <input type="text" name="email" id="emailWithTitle" class="form-control"  placeholder="john.doe@example.com" required>
                      </div>
                      <div class="col mb-0">
                          <label for="nameWithTitle" class="form-label">Contraseña</label>
                          <input type="password" name="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-label-secondary" data-bs-dismiss="modal">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
                  </div>
              </div>
            </form>
          </div>
        </div>
        
    </div>
  </div>

  <script>
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
  form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
      event.preventDefault()
      event.stopPropagation()
      }

      form.classList.add('was-validated')
  }, false)
  })
  </script>