<?php


define('ROUTES', [
    '' => ['controller' => 'Pagina', 'action' => 'inicio' ],
    'nosotros' => ['controller' => 'Pagina', 'action' => 'nosotros' ],
    'noticias' => ['controller' => 'Pagina', 'action' => 'noticias' ],
    'contactanos' => ['controller' => 'Pagina', 'action' => 'contactanos' ],
    'verNoticia' => ['controller' => 'Pagina', 'action' => 'verNoticia' ],
    'login' => ['controller' => 'Admin', 'action' => 'sesion' ],
    'cerrar' => ['controller' => 'Accion', 'action' => 'cerrar' ],
    'consultar' => ['controller' => 'Admin', 'action' => 'consultar'],
    'cuotas' => ['controller' => 'Admin', 'action' => 'consultarCuotas'],
    'pagar' => ['controller' => 'Admin', 'action' => 'pagarCuotas'],
    'pagos' => ['controller' => 'Admin', 'action' => 'consultarPago'],
    'registrar' => ['controller' => 'Admin', 'action' => 'registrar'],
    'setFamiliares' => ['controller' => 'Admin', 'action' => 'setFamiliares'],
    'setCuotas' => ['controller' => 'Admin', 'action' => 'setCuotas'],
    'actualizar' => ['controller' => 'Admin', 'action' => 'actualizar'],
    'actualizarFamiliares' => ['controller' => 'Admin', 'action' => 'actualizarFamiliares'],
    'actualizarCuota' => ['controller' => 'Admin', 'action' => 'actualizarCuota'],
    'consultarFamiliares' => ['controller' => 'Admin', 'action' => 'consultarFamiliares'],
    'eliminar' => ['controller' => 'Admin', 'action' => 'eliminar'],
    'listas' => ['controller' => 'Admin', 'action' => 'listas'],
    'publicar' => ['controller' => 'Admin', 'action' => 'publicar'],
    'eliminarPublicacion' => ['controller' => 'Admin', 'action' => 'eliminarPublicacion'],
    'editarPublicacion' => ['controller' => 'Admin', 'action' => 'editarPublicacion'],
    'varificarAbogado'  => ['controller' => 'Pagina', 'action' => 'varificarAbogado']

]);
