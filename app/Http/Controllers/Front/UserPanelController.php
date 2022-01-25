<?php

namespace App\Http\Controllers\Front;

use App\Course;
use App\Http\Controllers\Controller;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SoapClient;
class UserPanelController extends Controller
{
    protected $MerchantID = '3992db31-9e0c-4b1d-b68d-6196c87d02de'; //Required
    public function index()
    {
        $payments=auth()->user()->payments()->latest()->paginate(20);

        return view('frontend.panel.index', compact('payments'));
    }




    public function history()
    {
        $payments=auth()->user()->payments()->latest()->paginate(20);

        return view('frontend.panel.history' , compact('payments'));
    }





    public function vip()
    {
        return view('frontend.panel.vip');
    }






    public function payment()
    {

        request()->validate([
            'plan'=>'required',
        ]);
        switch (\request('plan'))
        {
            case 3:
                $price=60000;
                break;
            case 12:
                $price=120000;
                break;
            default:
                $price=30000;


        }




        $Description = 'توضیحات تراکنش تستی'; // Required
        $Email = auth()->user()->email; // Optional
        $CallbackURL = route('panel.check'); // Required
        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $this->MerchantID,
                'Amount' => $price,
                'Description' => $Description,
                'Email' => $Email,
                'CallbackURL' => $CallbackURL,
            ]
        );


        //Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {

            auth()->user()->payments()->create([
                'resnumber' => $result->Authority,
                'price' => $price,
                'course_id' => 'vip'
            ]);

            return redirect('https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
        } else {
            echo 'ERR: ' . $result->Status;
        }



    }

    public function check()
    {

        $Authority = request('Authority');

        $payment = Payment::whereResnumber($Authority)->firstOrFail();



        if (request('Status') == 'OK') {
            $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $this->MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $payment->price,
                ]
            );

            if ($result->Status == 100) {
                if($this->checkpayment($payment)) {
                    alert()->success('عملیات مورد نظر با موفقیت انجام شد','با تشکر');
                    return redirect(route('panel.index'));
                }
            } else {
                echo 'Transaction failed. Status:'.$result->Status;
            }
        } else {
            echo 'Transaction canceled by user';
        }
    }

    public function checkpayment($payment)
    {
        $payment->update([
            'payment' => 1
        ]);


        switch ($payment)
        {
            case 30000:
                $time=1;
                break;
            case 60000:
                $time=3;
                break;
            case 120000:
                $time=6;
                break;

        }

        $user=$payment->user;
        $viptime=$user->isVip ? Carbon::parse($user->viptime) : Carbon::now();
        $user->update([
            'viptime'=>$viptime->addMonth($time)
        ]);

        return true;
    }





}
