<?php
// routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Audit;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use App\Models\Cliente;
use App\Models\Etiqueta;
use App\Models\Habilidad;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

//Dashboard
Breadcrumbs::for('dashboard', fn(BreadcrumbTrail $trail) => $trail
    ->push('Dashboard', route('home'))
);

//Sistema
Breadcrumbs::for('sistema', fn(BreadcrumbTrail $trail) => $trail
    ->push('Sistema')
);

//Sistema/Usuarios
Breadcrumbs::for('users.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('sistema')
    ->push('Usuarios', route('usuarios.index'))
);

Breadcrumbs::for('users.update', fn(BreadcrumbTrail $trail, User $user) => $trail
    ->parent('users.index')
    ->push($user->name, route('usuarios.update', $user))
);

//Sistema/Roles
Breadcrumbs::for('roles.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('sistema')
    ->push('Roles', route('roles.index'))
);

Breadcrumbs::for('roles.update', fn(BreadcrumbTrail $trail, Role $role) => $trail
    ->parent('roles.index')
    ->push($role->name, route('roles.update', $role))
);

//Sistema/Auditorias
Breadcrumbs::for('auditorias.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('sistema')
    ->push('Auditorias', route('auditorias.index'))
);

Breadcrumbs::for('auditorias.show', fn(BreadcrumbTrail $trail, Audit $audit) => $trail
    ->parent('roles.index')
    ->push($audit->auditable_id, route('auditorias.show', $audit))
);

//Catalogos
Breadcrumbs::for('catalogo', fn(BreadcrumbTrail $trail) => $trail
    ->push('Catalogo')
);

//Catalogos/Permisos
Breadcrumbs::for('permiso.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('catalogo')
    ->push('Permisos', route('permisos.index'))
);

Breadcrumbs::for('permiso.store', fn(BreadcrumbTrail $trail) => $trail
    ->parent('permiso.index')
    ->push('Agregar Permiso')
);

Breadcrumbs::for('permiso.show', fn(BreadcrumbTrail $trail, Permission $permiso) => $trail
    ->parent('permiso.index')
    ->push($permiso->name, route('permisos.show', $permiso))
);

Breadcrumbs::for('permiso.update', fn(BreadcrumbTrail $trail, Permission $permiso) => $trail
    ->parent('permiso.index')
    ->push($permiso->name, route('permisos.update', $permiso))
);

//Catalogos/Cliente
Breadcrumbs::for('cliente.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('catalogo')
    ->push('Clientes', route('clientes.index'))
);

Breadcrumbs::for('cliente.store', fn(BreadcrumbTrail $trail) => $trail
    ->parent('cliente.index')
    ->push('Agregar Cliente')
);

Breadcrumbs::for('cliente.show', fn(BreadcrumbTrail $trail, Cliente $cliente) => $trail
    ->parent('cliente.index')
    ->push($cliente->nombre, route('clientes.show', $cliente))
);

Breadcrumbs::for('cliente.update', fn(BreadcrumbTrail $trail, Cliente $cliente) => $trail
    ->parent('cliente.index')
    ->push($cliente->nombre, route('clientes.update', $cliente))
);

//Catalogos/Etiqueta
Breadcrumbs::for('etiqueta.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('catalogo')
    ->push('Etiqueta', route('etiquetas.index'))
);

Breadcrumbs::for('etiqueta.store', fn(BreadcrumbTrail $trail) => $trail
    ->parent('etiqueta.index')
    ->push('Agregar Etiqueta')
);

Breadcrumbs::for('etiqueta.show', fn(BreadcrumbTrail $trail, Etiqueta $etiqueta) => $trail
    ->parent('etiqueta.index')
    ->push($etiqueta->id, route('etiquetas.show', $etiqueta))
);

Breadcrumbs::for('etiqueta.update', fn(BreadcrumbTrail $trail, Etiqueta $etiqueta) => $trail
    ->parent('etiqueta.index')
    ->push($etiqueta->id, route('etiquetas.update', $etiqueta))
);

//Catalogos/Habilidad
Breadcrumbs::for('habilidad.index', fn(BreadcrumbTrail $trail) => $trail
    ->parent('catalogo')
    ->push('Habilidad', route('habilidades.index'))
);

Breadcrumbs::for('habilidad.store', fn(BreadcrumbTrail $trail) => $trail
    ->parent('catalogo')
    ->push('Agregar Habilidad')
);

Breadcrumbs::for('habilidad.show', fn(BreadcrumbTrail $trail, Habilidad $habilidade) => $trail
    ->parent('habilidad.index')
    ->push($habilidade->nombre, route('etiquetas.show', $habilidade))
);

Breadcrumbs::for('habilidad.update', fn(BreadcrumbTrail $trail, Habilidad $habilidade) => $trail
    ->parent('habilidad.index')
    ->push($habilidade->nombre, route('etiquetas.update', $habilidade))
);

//Procesos
Breadcrumbs::for('proceso', fn(BreadcrumbTrail $trail) => $trail
    ->push('Proceso')
);
