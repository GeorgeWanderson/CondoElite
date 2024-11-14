<?php

session_start();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


define('BASE_URL', '/');


require_once '../config/database.php';


require_once '../controllers/AluguelController.php';
require_once '../controllers/GastosController.php';
require_once '../controllers/VeiculosController.php';
require_once '../controllers/FluxoCaixaController.php';
require_once '../controllers/SalaoFestasController.php';
require_once '../controllers/FuncionariosController.php';


require_once '../models/Aluguel.php';
require_once '../models/Gasto.php';
require_once '../models/Veiculo.php';
require_once '../models/FluxoCaixa.php';
require_once '../models/ReservaSalao.php';
require_once '../models/Funcionario.php';


$request = $_SERVER['REQUEST_URI'];


switch ($request) {
    case '/':
    case '/aluguel':
        $controller = new AluguelController();
        $controller->index();
        break;
    
    case '/gastos':
        $controller = new GastosController();
        $controller->index();
        break;
        
    case '/veiculos':
        $controller = new VeiculosController();
        $controller->index();
        break;
        
    case '/fluxo-caixa':
        $controller = new FluxoCaixaController();
        $controller->index();
        break;
        
    case '/salao-festas':
        $controller = new SalaoFestasController();
        $controller->index();
        break;
    
    case '/funcionarios':
        $controller = new FuncionariosController();
        $controller->index();
        break;

  
    case (preg_match('/^\/aluguel\/editar\/(\d+)$/', $request, $matches) ? true : false):
        $controller = new AluguelController();
        $controller->editar($matches[1]);
        break;


    case (preg_match('/^\/aluguel\/detalhes\/(\d+)$/', $request, $matches) ? true : false):
        $controller = new AluguelController();
        $controller->detalhes($matches[1]);
        break;


    case '/gastos/adicionar':
        $controller = new GastosController();
        $controller->adicionar();
        break;


    case (preg_match('/^\/gastos\/editar\/(\d+)$/', $request, $matches) ? true : false):
        $controller = new GastosController();
        $controller->editar($matches[1]);
        break;


    case '/veiculos/entrada':
        $controller = new VeiculosController();
        $controller->entrada();
        break;


    case '/veiculos/saida':
        $controller = new VeiculosController();
        $controller->saida();
        break;


    case '/salao-festas/reservar':
        $controller = new SalaoFestasController();
        $controller->reservar();
        break;
    

    case '/funcionarios/adicionar':
        $controller = new FuncionariosController();
        $controller->adicionar();
        break;


    case (preg_match('/^\/funcionarios\/editar\/(\d+)$/', $request, $matches) ? true : false):
        $controller = new FuncionariosController();
        $controller->editar($matches[1]);
        break;


    case (preg_match('/^\/funcionarios\/excluir\/(\d+)$/', $request, $matches) ? true : false):
        $controller = new FuncionariosController();
        $controller->excluir($matches[1]);
        break;
    
    default:
        echo "Página não encontrada!";
        break;
}
