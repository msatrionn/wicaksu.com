<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VcGamers extends Controller
{

    public function VcGamers(Request $request)
    {

        if (!isset($request->operation)) {
            return response()->json(["message" => "Operation missing"], 400);
        }

        switch ($request->operation) {

            case 'login':
                if (isset($request->email) && isset($request->password)) {
                    $url  = 'https://vcgamers.com/api/main';
                    $data = json_encode([
                        'email' => $request->email,
                        'password' => $request->password,
                        'loading' => true,
                        'error' => false,
                        'show_password' => false,
                        'error_msg' => '',
                    ]);

                    $headers[]          = "Content-Type: application/json";
                    $respons['login']   = json_decode(WicakRequest($url, $data, $headers), true);

                    if (isset($respons['login']['status'])) {
                        if ($respons['login']['status']) {
                            $url                = 'https://vcgamers.com/api/profile';
                            $headers            = ["Authorization: " . $respons['login']['data']['token']];
                            $back_data['auth']  = "Authorization: " . $respons['login']['data']['token'];
                            $respons['profile'] = json_decode(WicakRequest($url, null, $headers), true);

                            return response()->json($back_data, 200);
                        }
                    }
                }
                return response()->json(["message" => "Eror Auth"], 400);
                break;


            case 'ShopInformation':
                if (isset($request->auth)) {
                    $url        = 'https://vcgamers.com/api/store/dashboard/transaction';
                    $headers[]  = $request->auth;
                    $headers[]  = "Content-Type: application/json";
                    $respons    = json_decode(WicakRequest($url, null, $headers), true);
                    if (isset($respons['status'])) {
                        if ($respons['status'] == 1) {
                            return response()->json($respons['data'], 200);
                        }
                    }
                }
                return response()->json(["message" => "Error Get Data"], 400);
                break;

            case 'SendPacket':
                if (isset($request->auth) && isset($request->transactionid)) {
                    $url        = "https://vcgamers.com/api/store/dashboard/update";
                    $headers[]  = $request->auth;
                    $headers[]  = "Content-Type: application/json";
                    $data = json_encode([
                        "transactionid" => $request->transactionid,
                        "status" => 3
                    ]);
                    $respons    = json_decode(WicakRequest($url, $data, $headers), true);
                    if (isset($respons['status'])) {
                        if ($respons['status'] == 1) {
                            return response()->json($respons['data'], 200);
                        }
                    }
                }
                return response()->json(["message" => "Error Get Data"], 400);
                break;

            case 'Transaction':
                if (isset($request->status) && isset($request->auth)) {
                    $status     = $request->status;
                    $url        = "https://vcgamers.com/api/store/dashboard/transactionlist?page=1&limit=10&status=$status";
                    $headers[]  = $request->auth;
                    $headers[]  = "Content-Type: application/json";
                    $respons    = json_decode(WicakRequest($url, null, $headers), true);
                    if (isset($respons['status'])) {
                        if ($respons['status'] == 1) {
                            if (count($respons['data']) > 0) {
                                foreach ($respons['data'] as $value) {
                                    $odr['id_pesanan']                  = $value['id_pesanan'];
                                    $odr['nama_buyyer']                 = $value['member_name'];
                                    $odr['harga']                       = rupiah($value['price']);
                                    $odr['tgl']                         = $value['created'];
                                    $req['url']                         = "https://vcgamers.com/api/member/transactiondetailstore?id=" . $odr['id_pesanan'];
                                    $req['mode']                        = "get";
                                    $req['headers']                     = $headers;
                                    $req['data']                        = '';
                                    $prepare_req[$odr['id_pesanan']]    = $req;
                                }
                                $multi_respons = WicakMultiCurl($prepare_req);
                                foreach ($multi_respons as $key => $value) {
                                    $back[] = json_decode($value['value'])->data;
                                }
                                return response()->json($back, 200);
                            } else {
                                return response()->json($respons['data'], 200);
                            }
                        }
                    }
                }
                return response()->json(["message" => "Error Get Data"], 400);
                break;



            default:
                return response()->json(["message" => "Operation null"], 400);
                break;
        }
    }
}
