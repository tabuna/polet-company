<?php

namespace App\Http\Controllers\Payments;

use App\Core\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvisoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $configs = config('services.yandex.kassa');

        $hash = md5(
            $request->action . ';' .
            $request->orderSumAmount . ';' .
            $request->orderSumCurrencyPaycash . ';' .
            $request->orderSumBankPaycash . ';' .
            $request->shopId . ';' .
            $request->invoiceId . ';' .
            $request->customerNumber . ';' .
            $configs['ShopPassword']
        );

        if ($request->action == 'checkOrder') {
            if (strtolower($hash) != strtolower($request->md5)) {
                $code = 1;
            } else {
                $code = 0;

                // $order = Order::findOrFail($request->orderNumber);
                //$order->sold = 1;
                //$order->status = 'В работе';
                //$order->save();

                Payment::create([
                    'sum'      => $request->orderSumAmount,
                    'users_id' => $request->user_id,
                    'status'   => 1,
                ]);
            }

            $response = '<?xml version="1.0" encoding="UTF-8"?>';
            $response .= '<checkOrderResponse performedDatetime="' . $request->requestDatetime . '" code="' . $code . '"' . ' invoiceId="' . $request->invoiceId . '" shopId="' . $configs['shopId'] . '"/>';

            return response($response)->header('Content-Type', 'application/xml');
        } elseif ($request->action == 'paymentAviso') {


            if (strtolower($hash) != strtolower($request->md5)) {
                $code = 1; //vse plosho kak ya poonayl
            } else {
                $code = 0; // vse ok
            }

            $response = '<?xml version="1.0" encoding="UTF-8"?>';
            $response .= '<paymentAvisoResponse performedDatetime="' . $request->requestDatetime . '" code="' . $code . '" invoiceId="' . $request->invoiceId . '" shopId="' . $configs['shopId'] . '"/>';

            return response($response)->header('Content-Type', 'application/xml');
        }
    }

}
