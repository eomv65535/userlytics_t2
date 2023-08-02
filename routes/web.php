<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// web.php
Route::get('/', [TicketController::class, 'createForm'])->name('crear.boleto.formulario');
Route::post('/enviar-boleto', [TicketController::class, 'submitForm'])->name('enviar.boleto.formulario')->middleware("check.ticket.availability");
