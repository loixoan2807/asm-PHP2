<?php

use Phroute\Phroute\RouteCollector;
use App\Controllers\ProductController;
use App\Controllers\CateproductController;
use App\Controllers\CommentController;
use App\Models\CommentModel;
use App\Controllers\CartController;
use App\Controllers\UserController;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function () {
    if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
        header('location: ' . BASE_URL . 'login');
        die;
    }
});
$router->get('/log-out', function () {
    $_SESSION["login"] = false;
    setcookie("email",$_POST["email"],time()-86401,'/');
    setcookie("pass",$_POST["password"],time()-86401,'/');
    header("location:./");
});
$router->get('/', [ProductController::class, 'index']);
$router->post('/', [ProductController::class, 'index']);
//Chúc Hoa ngủ ngonn
//Hoa hành Lợi nhiu qué
//mình bị ốm rùi hiu hiu
//route bắt url ->phương thức get
$router->get('/sign-up',[ProductController::class,'signup']);
//route post sẽ xử lý form và gửi lên class signup bên productController để xử lý hỉu hông ?
$router->post('/sign-up',[ProductController::class,'signup']);
$router->get('/delete-cate-product-{id}', [CateproductController::class, 'deleteCateProduct']);
$router->get('/dashboard', [ProductController::class, 'dashboard']);
$router->get('/product', [ProductController::class, 'showProduct']);
$router->get('/add-product', [ProductController::class, 'addProduct']);
$router->get('/delete-product-{id}', [ProductController::class, 'deleteProduct']);
$router->get('/cate-product', [CateproductController::class, 'showCateProduct']);
$router->get('/add-cate-product', [CateproductController::class, 'addCateProduct']);
$router->get('/update-product-{id}', [ProductController::class, 'updateProduct']);
$router->get('/update-cate-product-{id}', [CateproductController::class, 'updateCateProduct']);
$router->get('/comment', [CommentController::class, 'showComemnt']);
$router->get('/add-comment', [CommentController::class, 'addcomment']);
$router->get('/delete-comment-{id}', [CommentController::class, 'deleteComment']);
$router->get('/update-comment-{id}', [CommentController::class, 'updateComment']);
$router->get('/cart', [CartController::class, 'showCart']);
$router->get('/delete-cart-{id}', [CartController::class, 'deleteCart']);
$router->get('/update-cart-{id}', [CartController::class, 'updateCart']);
$router->get('/add-cart', [CartController::class, 'addCart']);
$router->get('/user', [UserController::class, 'showUser']);
$router->get('/add-user', [UserController::class, 'addUser']);
$router->get('/delete-user-{id}', [UserController::class, 'deleteUser']);
$router->get('/update-user-{id}', [UserController::class, 'updateUser']);
$router->post('/update-user-{id}', [UserController::class, 'updateUser']);
$router->post('/product',[ProductController::class,'showProduct']);
$router->post('/add-user', [UserController::class, 'addUser']);
$router->post('/add-cart', [CartController::class, 'addCart']);
$router->post('/update-cart-{id}', [CartController::class, 'updateCart']);
$router->post('/update-comment-{id}', [CommentController::class, 'updateComment']);
$router->post('/add-product', [ProductController::class, 'addProduct']);
$router->post('/update-product-{id}', [ProductController::class, 'updateProduct']);
$router->post('/add-comment', [CommentController::class, 'addcomment']);
$router->post('/add-cate-product', [CateproductController::class, 'addCateProduct']);
$router->post('/update-cate-product-{id}', [CateproductController::class, 'updateCateProduct']);
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
