<?php  
/**
 * Front Controller
 * 
 * PHP version 8.1
 */

// Require the controller class
// require "../app/Controller/Posts.php";

/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
  $root = dirname(__DIR__); // get the parent directory
  $file = $root . "/" . str_replace("\\", "/", $class) . ".php";

  if (is_readable($file)) {
    require $root . "/" . str_replace("\\", "/", $class) . ".php";
  }
});

//  echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"';
/**
 * Routing
 */
require "../core/Router.php";
$router = new Core\Router();

// echo get_class($router);

// Add the routes
//USERS ROUTES
$router->add('', ['controller' => 'Route', 'action' => 'home']);
$router->add('about', ['controller' => 'Route', 'action' => 'about']);
$router->add('shop', ['controller' => 'Route', 'action' => 'shop']);
$router->add('orders', ['controller' => 'Route', 'action' => 'orders']);
$router->add('about', ['controller' => 'Route', 'action' => 'about']);
$router->add('category', ['controller' => 'Route', 'action' => 'category']);
$router->add('contact', ['controller' => 'Route', 'action' => 'contact']);
$router->add('search', ['controller' => 'Route', 'action' => 'search']);
$router->add('wishlist', ['controller' => 'Route', 'action' => 'wishlist']);
$router->add('card', ['controller' => 'Route', 'action' => 'card']);
$router->add('checkout', ['controller' => 'Route', 'action' => 'checkout']);
$router->add('login', ['controller' => 'Route', 'action' => 'login']);
$router->add('register', ['controller' => 'Route', 'action' => 'register']);
$router->add('logout', ['controller' => 'Route', 'action' => 'logout']);
$router->add('update', ['controller' => 'Route', 'action' => 'update']);
$router->add('views', ['controller' => 'Route', 'action' => 'views']);

// ADMIN ROUTES
$router->add('admin_home', ['controller' => 'AdminRoute', 'action' => 'admin_home']);
$router->add('admin_products', ['controller' => 'AdminRoute', 'action' => 'admin_products']);
$router->add('admin_orders', ['controller' => 'AdminRoute', 'action' => 'admin_orders']);
$router->add('admin_users', ['controller' => 'AdminRoute', 'action' => 'admin_users']);
$router->add('admin_contacts', ['controller' => 'AdminRoute', 'action' => 'admin_contacts']);
$router->add('update_product', ['controller' => 'AdminRoute', 'action' => 'update_product']);
$router->add('update_profile', ['controller' => 'AdminRoute', 'action' => 'update_profile']);

$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add("{controller}/{id:\d+}/{action}");
$router->add("admin/{controller}/{action}", ["namespace" => "Admin"]);


// Match the requested route
$url = $_SERVER['QUERY_STRING'];


$router->dispatch($_SERVER["QUERY_STRING"]);




***********************************
  
  <script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"
    >
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="text-sm text-gray-700 dark:text-gray-500 underline"
                >Dashboard</Link
            >

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"
                    >Register</Link
                >
            </template>
        </div>


    </div>
</template>

