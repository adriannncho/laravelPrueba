<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Socio']);
        $role3 = Role::create(['name' => 'Usuario']);
        $role4 = Role::create(['name' => 'Trabajador']);

        

        Permission::create(['name' => 'pages-home', 'description' => 'Ver página principal'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.proyectos.index', 'description' => 'Ver página de proyectos'])->syncRoles([$role1, $role2, $role3, $role4 ]);
        Permission::create(['name' => 'admin.proyectos.create', 'description' => 'Crear proyectos'])->assignRole($role1);
        Permission::create(['name' => 'admin.proyectos.edit', 'description' => 'Editar proyectos'])->assignRole($role1);

        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver página de roles'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear roles'])->assignRole($role1);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar roles'])->assignRole($role1);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Borrar roles'])->assignRole($role1);

        Permission::create(['name' => 'admin.pedido.index', 'description' => 'Ver página de pedidos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.pedido.create', 'description' => 'Crear pedidos'])->assignRole($role1);
        Permission::create(['name' => 'admin.pedido.edit', 'description' => 'Editar pedidos'])->assignRole($role1);
        Permission::create(['name' => 'admin.pedido.destroy', 'description' => 'Borrar pedidos'])->assignRole($role1);

        Permission::create(['name' => 'admin.trabajador.index', 'description' => 'Ver página de trabajadores'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.trabajador.create', 'description' => 'Crear trabajadores'])->assignRole($role1);
        Permission::create(['name' => 'admin.trabajador.edit', 'description' => 'Editar trabajadores'])->assignRole($role1);
        Permission::create(['name' => 'admin.trabajador.destroy', 'description' => 'Borrar trabajadores'])->assignRole($role1);

        Permission::create(['name' => 'admin.contrato.index', 'description' => 'Ver página de contratos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.contrato.create', 'description' => 'Crear contratos'])->assignRole($role1);
        Permission::create(['name' => 'admin.contrato.edit', 'description' => 'Editar contratos'])->assignRole($role1);
        Permission::create(['name' => 'admin.contrato.destroy', 'description' => 'Borrar contratos'])->assignRole($role1);

        Permission::create(['name' => 'admin.aporte.index', 'description' => 'Ver página de aportes'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.aporte.create', 'description' => 'Crear aportes'])->assignRole($role1);
        Permission::create(['name' => 'admin.aporte.edit', 'description' => 'Editar aportes'])->assignRole($role1);

        Permission::create(['name' => 'admin.proovedor.index', 'description' => 'Ver página de proovedores'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.proovedor.create', 'description' => 'Crear proovedores'])->assignRole($role1);
        Permission::create(['name' => 'admin.proovedor.edit', 'description' => 'Editar proovedores'])->assignRole($role1);
        Permission::create(['name' => 'admin.proovedor.destroy', 'description' => 'Borrar proovedores'])->assignRole($role1);

        Permission::create(['name' => 'admin.concepto.index', 'description' => 'Ver página de conceptos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.concepto.create', 'description' => 'Crear conceptos'])->assignRole($role1);
        Permission::create(['name' => 'admin.concepto.edit', 'description' => 'Editar conceptos'])->assignRole($role1);
        Permission::create(['name' => 'admin.concepto.destroy', 'description' => 'Borrar conceptos'])->assignRole($role1);

        Permission::create(['name' => 'admin.medida.index', 'description' => 'Ver página de medidas'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.medida.create', 'description' => 'Crear medidas'])->assignRole($role1);
        Permission::create(['name' => 'admin.medida.edit', 'description' => 'Editar medidas'])->assignRole($role1);
        Permission::create(['name' => 'admin.medida.destroy', 'description' => 'Borrar medidas'])->assignRole($role1);
    }
}
