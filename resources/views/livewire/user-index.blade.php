<div>
    <div class="row g-4">
        <div class="col-xl-4 col-lg-6 col-md-6 ">
          <div class="card p-1">
            <div class="card-body">
              <div class="d-flex justify-content-between mb-2">
                <h6 class="fw-normal">Total 4 users</h6>
                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Vinnie Mostowy" class="avatar avatar-sm pull-up">
                    <img class="rounded-circle" src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar">
                  </li>
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Allen Rieske" class="avatar avatar-sm pull-up">
                    <img class="rounded-circle" src="{{asset('assets/img/avatars/12.png')}}" alt="Avatar">
                  </li>
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Julee Rossignol" class="avatar avatar-sm pull-up">
                    <img class="rounded-circle" src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar">
                  </li>
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kaith D'souza" class="avatar avatar-sm pull-up">
                    <img class="rounded-circle" src="{{asset('assets/img/avatars/15.png')}}" alt="Avatar">
                  </li>
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="John Doe" class="avatar avatar-sm pull-up">
                    <img class="rounded-circle" src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar">
                  </li>
                </ul>
              </div>
              <div class="d-flex justify-content-between align-items-end">
                <div class="role-heading">
                  <h4 class="mb-1"> Usuarios</h4>
                  @can('admin.roles.create')
                  <a href="{{ route('user.create')}}" ><small>Crear usuario</small></a>
                  @endcan
                </div>
                <a href="javascript:void(0);" class="text-muted"><i class="bx bx-copy"></i></a>
              </div>
            </div>
          </div>
        </div>
        

        

        @can('admin.roles.create')
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="card h-100">
            <div class="h-100">
              <div class="col-sm-12">
                <div class="card-body text-sm-end text-center ps-sm-0">
                  @can('admin.roles.create')
                  <a href="{{ route('index-rol')}}" ><small>Ver roles</small></a>
                  @endcan
                  <p class="mb-0">Mira o agrega un rol si no existe</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endcan
        
        <div class="col-12">
          <!-- Role Table -->
            

          <div class="card">

            <div class="card-header">
                <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre o un correo de un usuario">
            </div>
            

            @if ($users->count())
            <div class="card-body table-responsive">
                <table class="table border-top">
                    <thead>
                        <tr>
                          <th data-column-id="id">#</th>
                          <th data-column-id="name">Nombre</th>
                          <th data-column-id="email">Email</th>
                          <th data-column-id="roles">Role</th>
                          @can('admin.roles.edit')
                          <th data-column-id="actions">Acciones</th>
                          @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if ($user->roles->count() > 0)
                                    @foreach ($user->roles as $role)
                                        {{$role->name}}
                                        @if (!$loop->last) {{-- Evita agregar una coma al último rol --}}
                                            ,
                                        @endif
                                    @endforeach
                                @else
                                    Sin rol
                                @endif
                            </td>
                            <td>
                              @can('admin.roles.edit')
                              <a href="{{ route('user.edit', $user)}}" class="badge bg-label-warning">Editar</a>
                              @endcan
                              @can('admin.roles.destroy')
                              <a href="" class="">
                                <button type="sumbmit" class="badge bg-label-danger ms-2" style="border: transparent" id="confirm-text">
                                  Borrar
                                </button>
                              </a>
                              @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
  
              <div class="card-footer">
                  {{$users->links()}}
              </div>
              @else
                  <div class="card-body">
                    <strong>No hay registros</strong>
                  </div>
            @endif
            
          </div>
          <!--/ Role Table -->
        </div>
      </div>
</div>
