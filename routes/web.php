<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/insertUser', function(Request $request){
   $first_name = $request->first_name;
    $last_name = $request->last_name ;
    $dob = $request->dob;
    $phone = $request->phone;
    $email = $request->email;
    $address = $request->address;

   $respuesta =DB::insert('call insertUser (?,?,?,?,?,?)',[$first_name,$last_name,$dob,$phone,$email,$address]);
   return $respuesta;
});

Route::post('/insertPayment', function(Request $request){
    $transaction_id = $request->transaction_id;
    $amount = $request->amount ;
    $date = $request->date;

   $respuesta= DB::insert('call insertPayments (?,?,?)',[$transaction_id,$amount,$date]);


});

Route::get('/view', function(){

  $respuesta=  DB::select('call viewInformation');
   return $respuesta;

});

Route::delete('/delete/{id}', function($id){

    DB::delete('call deleteUser(?)',[$id]);
   echo "se elimino correctamente";

});
