<?php

namespace App\Http\Controllers\Front;

use App\Course;
use App\Http\Controllers\Controller;
use App\Learn;
use App\Payment;
use Illuminate\Http\Request;
use SoapClient;

class PaymentController extends Controller
{
    protected $MerchantID = '3992db31-9e0c-4b1d-b68d-6196c87d02de'; //Required

    public function peyment()
    {

        request()->validate([
            'course_id'=>'required',
        ]);

        $course=Course::findOrfail(request('course_id'));


        if(auth()->user()->checkLearn($course)) {
            alert()->error('شما قبلا در این دوره ثبت نام کرده اید','دقت کنید')->persistent('خیلی خوب');
            return back();
        }
        if($course->price==0 && $course->type=='vip')
        {
            alert()->error('this course can not buy for you');
            return  back();
        }

        $price=$course->price;
        $Description = 'توضیحات تراکنش تستی'; // Required
        $Email = auth()->user()->email; // Optional
        $CallbackURL = 'http://localhost:8000/course/Payment/check'; // Required
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
                'course_id' => $course->id
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
        $course = Course::findOrFail($payment->course_id);


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
                if($this->AddUserForLearning($payment, $course)) {
                    alert()->success('عملیات مورد نظر با موفقیت انجام شد','با تشکر');
                    return redirect($course->path());
                }
            } else {
                echo 'Transaction failed. Status:'.$result->Status;
            }
        } else {
            echo 'Transaction canceled by user';
        }
    }



    protected function AddUserForLearning($payment , $course)
    {
        $payment->update([
            'payment' => 1
        ]);

        Learn::create([
            'user_id' => auth()->user()->id,
            'course_id' => $course->id
        ]);

        return true;
    }
}
