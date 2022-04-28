<?php

use App\Events\MessageCreated;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Xendit\Xendit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ",", ".");
    return $hasil_rupiah;
}

Route::get("/", function () {
    // dd(openssl_get_cert_locations());
    // MessageCreated::dispatch(["data" => "test"]);
    return view("index");
});
Route::get("/test", function () {
    // dd(openssl_get_cert_locations());
    // MessageCreated::dispatch(['data'=> 'test']);
    return view("index");
});

Route::middleware(["auth:sanctum", "verified"])
    ->get("/dashboard", function () {
        // MessageCreated::dispatch(['data' => 'test']);
        return view("dashboard");
    })
    ->name("dashboard");

Route::middleware(["auth:sanctum", "verified"])
    ->get("/management", function () {
        if (Auth::user()->isadmin == 1) {
            // MessageCreated::dispatch(['data' => 'test']);
            return view("management_admin");
        } else {
            return view("management");
        }
    })
    ->name("management");

Route::middleware(["auth:sanctum", "verified"])
    ->get("/history", function () {
        return view("history");
    })
    ->name("history");

Route::middleware(["auth:sanctum", "verified"])
    ->get("/message-admin", [
        App\Http\Controllers\HomeController::class,
        "message_admin",
    ])
    ->name("message-admin");

Route::middleware(["auth:sanctum", "verified"])
    ->get("/show_msg", [App\Http\Controllers\HomeController::class, "show_msg"])
    ->name("show_msg");

Route::middleware(["auth:sanctum", "verified"])
    ->post("/send_message", [
        App\Http\Controllers\HomeController::class,
        "send_message",
    ])
    ->name("send_message");

Route::post("/message_client", [
    App\Http\Controllers\HomeController::class,
    "message_client",
])->name("message_client");

// wicaksu
Auth::routes();

Route::get("/home", [
    App\Http\Controllers\HomeController::class,
    "index",
])->name("home");

Route::get("/chat_client", [
    App\Http\Controllers\HomeController::class,
    "chat_client",
])->name("chat_client");

Auth::routes();

Route::get("/home", [
    App\Http\Controllers\HomeController::class,
    "index",
])->name("home");
