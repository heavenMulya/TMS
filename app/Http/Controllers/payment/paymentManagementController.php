<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\paymentRequest;
use App\Http\Resources\JSONResponseResource;
use App\Models\payments;

class paymentManagementController extends Controller
{
    public function Index()
    {
        try
        {
      $payments=Payments::with('tenant')->paginate(5);
      if(!$payments)
      {
        return (new JSONResponseResource(false,400,'payments Data Not Available',null))->response();

      }
      return (new JSONResponseResource(true,201,'payments Data Is  Available',$payments))->response();
        }
        catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error',null))->response();
    }
    }



    public function Store(paymentRequest $rq)
    {
        try
        {
     $receiptNumber = 'RCPT-' . date('Ymd') . '-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
      $payments= payments::create([
             'tenant_id'=>$rq->tenant_id,
             'amount'=>$rq->amount,
            'payment_date'=>$rq->payment_date,
            'month_paid_for'=>$rq->month_paid_for,
            'method'=>$rq->method,
            'receipt_number'=>$receiptNumber,
      ]);

      if(!$payments)
      {
        return ( new JSONResponseResource(false,400,'payments Data Not Saved Successfully',null))->response();
      }
     // return (new JSONResponseResource(true,200,'payments Data Saved Successfully',$payments))->response();
      return (new JSONResponseResource(true, 200, 'Payment saved successfully', [
        'payment' => $payments,
        'receipt_url' => route('payment.receipt', $payments->id)
    ]))->response();
    }
    catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error'.$e,null))->response();
    }
    }

    public function generateReceipt($id)
    {
        $payment = Payments::with('tenant')->findOrFail($id);
        
        return view('receipts.print', compact('payment'));
    }
    

    public function Show($id)
    {
        try
        {
      $paymentsExists=payments::find($id);

      if(!$paymentsExists)
      {
        return (new JSONResponseResource(false,400,'payments ID Not Available',null))->response();

      }

      return (new JSONResponseResource(true,201,'payments Data Is  Available',$paymentsExists))->response();

        }

        catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error',null))->response();
    }
    }


    public function Update(paymentRequest $rq,$id)
    {
        try
        {
            $paymentsExists=payments::find($id);
            if(!$paymentsExists)
            {
              return (new JSONResponseResource(false,400,'payments ID Not Available',null))->response();
      
            }

        $payments= $paymentsExists->update($rq->all());


      if(!$payments)
      {
        return ( new JSONResponseResource(false,400,'payments Data Not Updated Successfully',null))->response();
      }
      return (new JSONResponseResource(true,200,'payments Data Updated Successfully',$paymentsExists))->response();
    }
    catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error'.$e,null))->response();
    }
    }

    public function Destroy($id)
    {
        try
        {
      $paymentsExists=payments::find($id);
      if(!$paymentsExists)
      {
        return (new JSONResponseResource(false,400,'payments ID Not Available',null))->response();

      }
      $payments=$paymentsExists->delete();
      if(!$payments)
      {
        return (new JSONResponseResource(false,400,'payments ID Not Deleted Successfully',null))->response();
      }
      return (new JSONResponseResource(true,201,'payments Data Deleted Successfully',null))->response();
        }
        catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error',null))->response();
    }
    }


}
