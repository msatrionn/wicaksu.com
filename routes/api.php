<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VcGamers;
use App\Http\Controllers\AINick;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

function WicakRequest($url, $data_post = null, $headers = [])
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    if ($data_post != '') {
        curl_setopt($curl, CURLOPT_POST, true);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    if ($data_post != '') {
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_post);
    }
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $resp = curl_exec($curl);
    curl_close($curl);
    return $resp;
}

function WicakMultiCurl($data)
{
    $chs = array();
    $mh = curl_multi_init();
    foreach ($data as $gen => $dat) {

        $url        = $dat['url'];
        $data_post  = $dat['data'];
        $mode       = $dat['mode'];
        $headers    = $dat['headers'];
        $chs[$gen]  = curl_init($url);

        curl_setopt($chs[$gen], CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chs[$gen], CURLOPT_HTTPHEADER, $headers);
        if ($mode == 'post') {
            curl_setopt($chs[$gen], CURLOPT_POST, true);
            curl_setopt($chs[$gen], CURLOPT_POSTFIELDS, $data_post);
        }
        curl_multi_add_handle($mh, $chs[$gen]);
    }

    $running = null;
    do {
        curl_multi_exec($mh, $running);
    } while ($running);

    foreach (array_keys($chs) as $key) {
        $error = curl_error($chs[$key]);
        $last_effective_URL = curl_getinfo($chs[$key], CURLINFO_EFFECTIVE_URL);
        $time = curl_getinfo($chs[$key], CURLINFO_TOTAL_TIME);
        $response = curl_multi_getcontent($chs[$key]);
        if (!empty($error)) {
            $dps_data['status'] = "The request $key return a error: $error";
            $dps_data['respons'] = 400;
        } else {
            $dps_data['status'] = "The request to '$last_effective_URL' in $time seconds.";
            $dps_data['respons'] = 200;
        }
        $dps_data['value'] = $response;
        $data_dump[$key] = $dps_data;

        curl_multi_remove_handle($mh, $chs[$key]);
    }
    curl_multi_close($mh);
    return $data_dump;
}


// 8LC27FqnXSLjBImrPUgzwAYlgP08dzeTuUhULBpw api key

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // MessageCreated::dispatch('oke');
    return $request->user();
});


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/vc-gamers', [VcGamers::class, 'VcGamers']);
    Route::post('/ai-nick', [AINick::class, 'AINick']);
});
