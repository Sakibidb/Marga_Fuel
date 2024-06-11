<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\SmsApi;

class SmsController extends Controller
{

    public function index()
    {
        $smsapi = SmsApi::first();
        return view('backend.page.sms.index', compact('smsapi'));
    }

    public function sendOtpToPhone(Request $request)
    {

        $request->validate([
            'phone' => 'required|numeric|digits:11',
        ]);


        // $user   = User::query()
        //         ->where(function ($query) use ($request) {
        //             $query->where('phone', $request->phone);
        //         })
        //         ->with(['customer' => function ($query) {
        //             $query->with('district:id,name')
        //                 ->with('area:id,name');
        //         }])
        //         ->first();

        // if ($user) {

        //     if ($request->reset == 'true') {

        //         $this->smsOtp($request);
        //         session()->put('reset_customer', $user->id);

        //         return response()->json([
        //             'status'  => 1,
        //             'message' => 'Success',
        //             'smsOTP'  => session()->get('smsOTP')
        //         ]);
        //     }

        //     $this->smsOtp($request);

        //     return response()->json([
        //         'data'    => $user ?? '',
        //         'status'  => 0,
        //         'message' => "Already Registered",
        //         'smsOTP'  => session()->get('smsOTP')
        //     ]);

        // }
        // else{

        // }
        try {

            $this->smsOtp($request);

            return response()->json([
                'data'    => '',
                'status'  => 0,
                'message' => $request->phone ? 'Phone not found!' : 'Something wrong!',
                'smsOTP'  => session()->get('smsOTP')
            ]);

        } catch(\Exception $ex) {
            return $ex->getMessage();
        }


    }

    public function smsOtp($request)
    {
        $phone = $request->phone;

        $smsOTP = random_int(1000, 9999);
        session()->put('smsOTP', $smsOTP);
        session()->put('customerPhone', $phone);

        $this->sendSmsNotificationBearer("Your 4-Digit Verification OTP is ". $smsOTP, $phone);
    }

    public function sendSmsNotificationBearer($message, $phone)
    {
        $SmsApiSetting = SmsApi::first();
        // dd($SmsApiSetting);
        $url         = 'https://sms.smartsoftwarebd.com/api/v3/sms/send';
        $senderId    = optional($SmsApiSetting)->senderId;
        $bearerToken = optional($SmsApiSetting)->bearerToken;


        // $url         = optional($SmsApiSetting)->base_url;
        // $senderId    = env('SENDER_ID');
        // $bearerToken = env('BEARER_TOKEN');

        if (substr($phone, 0, 4) !== "+880") {
            $phone = "+880" . $phone;
        }

        $data = array(
            "recipient" => $phone,
            "sender_id" => $senderId,
            "type"      => 'plain',
            "message"   => $message
        );

        $headers = array(
            "Authorization: Bearer ".$bearerToken,
            "Content-Type: application/json",
            "Accept: application/json"
        );

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false
        );

        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $resp = curl_exec($curl);

        // Log the response and any errors
        $logMessage = 0;

        // if ($resp === false) {
        //     $logMessage = 'Curl error: ' . curl_error($curl) . "\n";
        // }

        curl_close($curl);

        return array('resp' => $resp, 'logMessage' => $logMessage);
    }

    public function store(Request $request)
    {
        $smsapi = SmsApi::first();

        if ($smsapi) {
            // If the record exists, update it
            $smsapi->senderId = $request->input('senderId');
            $smsapi->bearerToken = $request->input('bearerToken');
            $smsapi->save();
            $message = 'SMS API data updated successfully!';
        } else {
            // If the record doesn't exist, create a new one
            $smsapi = new SmsApi();
            $smsapi->senderId = $request->input('senderId');
            $smsapi->bearerToken = $request->input('bearerToken');
            $smsapi->save();
            $message = 'SMS API data saved successfully!';
        }

        return redirect()->route('sms.index')->with('success', $message);
    }


}
