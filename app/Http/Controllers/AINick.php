<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AINick extends Controller
{
    //
    public function AINick(Request $request)
    {
        $word = ['~', '!', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '/', '?', '"', ';', ':', "'", '>', '<', ',', '.', '|', '-', '=', ' ', '`'];

        if (!isset($request->operation)) {
            return response()->json(["message" => "Operation missing"], 400);
        }
        switch ($request->operation) {

            case 'MobileLegends':
                foreach ($word as $dps) {
                    $data_smt = explode($dps, $request->key);
                    if (isset($evals)) {
                        unset($evals);
                    }
                    foreach ($data_smt as $eval) {
                        if (preg_replace('/[^0-9]/', '', $eval) != '') {
                            $evals[] = preg_replace('/[^0-9]/', '', $eval);
                        }
                    }
                    if (isset($evals)) {
                        if (count($evals) > 1) {
                            $data_col[$dps] = $evals;
                        }
                    }
                }
                if (!isset($data_col)) {
                    return response()->json(["message" => "Value null"], 400);
                }
                foreach ($data_col as $key => $value) {
                    $req['url']                         = "https://www.smile.one/merchant/mobilelegends/checkrole/";
                    $req['mode']                        = "post";
                    $req['headers']                     = ["Content-Type: application/x-www-form-urlencoded"];
                    $req['data']                        = "user_id=" . $value[0] . "&zone_id=" . $value[1] . "&pid=26&checkrole=1&pay_methond=";
                    $prepare_req[$key]    = $req;
                }
                $multi_respons = WicakMultiCurl($prepare_req);
                foreach ($multi_respons as $key => $value) {
                    $back[$key] = json_decode($value['value']);
                }
                foreach ($back as  $key => $value) {
                    if ($value->code == 200) {
                        $res["nick"] = $value->username;
                        $res["id"] = $data_col[$key][0];
                        $res["server"] = $data_col[$key][1];
                    }
                }
                if (!isset($res)) {
                    return response()->json(["message" => "Value null"], 400);
                }
                return response()->json($res, 200);
                break;

            default:
                return response()->json(["message" => "Operation null"], 400);
                break;
        }
    }
}
