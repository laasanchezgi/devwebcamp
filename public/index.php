<?php



    require_once __DIR__ . '/../includes/app.php';

    use Controllers\RegistroController;
    use Controllers\PaginasController;
    use Controllers\APIEventos;
    use Controllers\APIPonentes;
    use Controllers\APIRegalos;
    use MVC\Router;
    use Controllers\AuthController;
    use Controllers\DashboardController;
    use Controllers\PonentesController;
    use Controllers\EventosController;
    use Controllers\RegistradosController;
    use Controllers\RegalosController;

    $router = new Router();

    // Login
    $router->get('/login', [AuthController::class, 'login']);
    $router->post('/login', [AuthController::class, 'login']);
    // Logout
    $router->post('/logout', [AuthController::class, 'logout']);

    // Registro - Crear cuenta
    $router->get('/registro', [AuthController::class, 'registro']);
    $router->post('/registro', [AuthController::class, 'registro']);

    // Olvide - Olvidar contraseña
    $router->get('/olvide', [AuthController::class, 'olvide']);
    $router->post('/olvide', [AuthController::class, 'olvide']);

    // Restablecer - Restablecer contraseña
    $router->get('/restablecer', [AuthController::class, 'restablecer']);
    $router->post('/restablecer', [AuthController::class, 'restablecer']);

    // Confirmar cuenta
    $router->get('/mensaje', [AuthController::class, 'mensaje']);
    $router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

    // ÁREA DE ADMINISTRACIÓN
    // Dashboard
    $router->get('/admin/dashboard', [DashboardController::class, 'index']);


    // Ponentes
    $router->get('/admin/ponentes', [PonentesController::class, 'index']);
    // Ponentes - crear
    $router->get('/admin/ponentes/crear', [PonentesController::class, 'crear']);
    $router->post('/admin/ponentes/crear', [PonentesController::class, 'crear']);
    // Ponentes - editar
    $router->get('/admin/ponentes/editar', [PonentesController::class, 'editar']);
    $router->post('/admin/ponentes/editar', [PonentesController::class, 'editar']);
    // Ponentes - eliminar
    $router->post('/admin/ponentes/eliminar', [PonentesController::class, 'eliminar']);


    // Eventos
    $router->get('/admin/eventos', [EventosController::class, 'index']);
    // Eventos - crear
    $router->get('/admin/eventos/crear', [EventosController::class, 'crear']);
    $router->post('/admin/eventos/crear', [EventosController::class, 'crear']);
    // Eventos - editar
    $router->get('/admin/eventos/editar', [EventosController::class, 'editar']);
    $router->post('/admin/eventos/editar', [EventosController::class, 'editar']);
    // Eventos - eliminar
    $router->post('/admin/eventos/eliminar', [EventosController::class, 'eliminar']);

    // API's
    // Eventos
    $router->get('/api/eventos-horario', [APIEventos::class, 'index']);
    $router->get('/api/ponentes', [APIPonentes::class, 'index']);
    // Ponentes
    $router->get('/api/ponente', [APIPonentes::class, 'ponente']);
    // Regalos
    $router->get('/api/regalos', [APIRegalos::class, 'index']);
    
    // Registrados
    $router->get('/admin/registrados', [RegistradosController::class, 'index']);

    // Regalos
    $router->get('/admin/regalos', [RegalosController::class, 'index']);

    // Registro de USUARIOS
    $router->get('/finalizar-registro', [RegistroController::class, 'crear']);
    $router->post('/finalizar-registro/gratis', [RegistroController::class, 'gratis']);
    $router->post('/finalizar-registro/pagar', [RegistroController::class, 'pagar']);
    $router->get('/finalizar-registro/conferencias', [RegistroController::class, 'conferencias']);
    $router->post('/finalizar-registro/conferencias', [RegistroController::class, 'conferencias']);

    // Boleto virtual
    $router->get('/boleto', [RegistroController::class, 'boleto']);

    // ÁREA PÚBLICA
    $router->get('/', [PaginasController::class, 'index']);
    $router->get('/devwebcamp', [PaginasController::class, 'evento']);
    $router->get('/paquetes', [PaginasController::class, 'paquetes']);
    $router->get('/workshops-conferencias', [PaginasController::class, 'conferencias']);
    $router->get('/404', [PaginasController::class, 'error']);

    $router->comprobarRutas();