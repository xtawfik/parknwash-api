<?php

namespace App\Containers\Order\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Support\Facades\Http;
use App\Containers\Order\Tasks\FindOrderByIdTask;

class UpdateOrderAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $order = Apiato::call('Order@UpdateOrderTask', [$request->id, $data]);

        // Fetch the updated order
        $updatedOrder = app(FindOrderByIdTask::class)->run($request->id);

        $debug = [];
        // If status is 'finished', generate PDF and send WhatsApp
        if (isset($updatedOrder->status) && strtolower($updatedOrder->status) === 'finished') {
            try {
                // 1. Generate PDF
                $pdfApiUrl = 'https://screenshoter-9erk.onrender.com/forms/chromium/convert/url';
                $invoiceUrl = 'https://api.parknwash.com/invoice/' . $updatedOrder->id;
                $pdfResponse = Http::asMultipart()->post($pdfApiUrl, [
                    [
                        'name' => 'url',
                        'contents' => $invoiceUrl,
                    ],
                    [
                        'name' => 'waitDelay',
                        'contents' => '300ms',
                    ],
                    [
                        'name' => 'singlePage',
                        'contents' => 'true',
                    ],
                    [
                        'name' => 'marginTop',
                        'contents' => '0',
                    ],
                    [
                        'name' => 'marginBottom',
                        'contents' => '0',
                    ],
                ]);

                // Store PDF binary in a variable for later use
                $pdfBinary = $pdfResponse->body();

                $debug['pdf_response'] = [
                    'success' => $pdfResponse->successful(),
                    'raw_body' => '[binary omitted]',
                    'status' => $pdfResponse->status(),
                    'invoice_url' => $invoiceUrl,
                    'pdf_binary_length' => strlen($pdfBinary),
                ];

                if ($pdfResponse->successful()) {
                    // 2. Send to WhatsApp
                    $clientPhone = $updatedOrder->client_phone;
                    if ($clientPhone) {
                        $recipient = '965' . preg_replace('/^0+/', '', preg_replace('/\D/', '', $clientPhone));
                        if ($clientPhone == '55544433') {
                            $recipient = '201110228118';
                        }
                        $whatsappApiUrl = 'https://waplab-five.vercel.app/api/send-media';
                        $whatsappHeaders = [
                            'Authorization' => 'Bearer aca11411-df2f-4801-8d07-439b739517cf377d1ff9-ab52-4c72-b431-a868f553f64c',
                            'Accept' => 'application/json',
                        ];
                        $whatsappPayload = [
                            [
                                'name' => 'sender',
                                'contents' => '9c40018e-3366-438f-9b19-c1e93483ffe7',
                            ],
                            [
                                'name' => 'recipient',
                                'contents' => $recipient,
                            ],
                            [
                                'name' => 'caption',
                                'contents' => 'Thank you for choosing PARKNWASH Car Wash Service .Your order has been successfully completed. Please find your invoice attached.',
                            ],
                            [
                                'name' => 'media',
                                'contents' => $pdfBinary,
                                'filename' => 'invoice-' . $updatedOrder->id . '.pdf',
                            ],
                        ];
                        $whatsappResponse = Http::withHeaders($whatsappHeaders)
                            ->asMultipart()
                            ->post($whatsappApiUrl, $whatsappPayload);
                    }
                }
            } catch (\Exception $e) {
                $debug['exception'] = $e->getMessage();
            }
        }

        // Attach debug info to the returned order (as object property)
        // $order->debug = $debug;
        return $order;
    }
}
