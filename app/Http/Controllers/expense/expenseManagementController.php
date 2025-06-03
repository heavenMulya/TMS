<?php

namespace App\Http\Controllers\expense;

use App\Http\Controllers\Controller;
use App\Http\Requests\expenseRequest;
use App\Http\Resources\JSONResponseResource;
use App\Models\expenses;
use App\Models\expenseslist;

class expenseManagementController extends Controller
{
    public function Index()
    {
        try
        {
      $expenses=expenses::paginate(5);
      if(!$expenses)
      {
        return (new JSONResponseResource(false,400,'expenses Data Not Available',null))->response();

      }
      return (new JSONResponseResource(true,201,'expenses Data Is  Available',$expenses))->response();
        }
        catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error',null))->response();
    }
    }
    public function IndexAll()
    {
        try
        {
      $expenses=expenseslist::all();
      if(!$expenses)
      {
        return (new JSONResponseResource(false,400,'expenses Data Not Available',null))->response();

      }
      return (new JSONResponseResource(true,201,'expenses Data Is  Available',$expenses))->response();
        }
        catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error',null))->response();
    }
    }



    public function Store(expenseRequest $rq)
    {
        try
        {
     $receiptNumber = 'RCPT-' . date('Ymd') . '-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
      $expenses= expenses::create($rq->all());

      if(!$expenses)
      {
        return ( new JSONResponseResource(false,400,'expenses Data Not Saved Successfully',null))->response();
      }
      return (new JSONResponseResource(true,200,'expenses Data Saved Successfully',$expenses))->response();
    }
    catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error'.$e,null))->response();
    }
    }

    public function generateReceiptExpense($id = null)
    {
        //$expenses = expenses::findOrFail($id);
        
      //  return view('receipts.expensePrint', compact('expenses'));

        if ($id) {
          $expense = expenses::findOrFail($id);
          return view('receipts.expense_print_single', ['expenses' => $expense]);
      } else {
          $expenses = expenses::all();
          return view('receipts.expense_print_all', ['expenses' => $expenses]);
      }
    }

  
    public function Show($id)
    {
        try
        {
      $expensesExists=expenses::find($id);

      if(!$expensesExists)
      {
        return (new JSONResponseResource(false,400,'expenses ID Not Available',null))->response();

      }

      return (new JSONResponseResource(true,201,'expenses Data Is  Available',$expensesExists))->response();

        }

        catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error',null))->response();
    }
    }


    public function Update(expenseRequest $rq,$id)
    {
        try
        {
            $expensesExists=expenses::find($id);
            if(!$expensesExists)
            {
              return (new JSONResponseResource(false,400,'expenses ID Not Available',null))->response();
      
            }

        $expenses= $expensesExists->update($rq->all());


      if(!$expenses)
      {
        return ( new JSONResponseResource(false,400,'expenses Data Not Updated Successfully',null))->response();
      }
      return (new JSONResponseResource(true,200,'expenses Data Updated Successfully',$expensesExists))->response();
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
      $expensesExists=expenses::find($id);
      if(!$expensesExists)
      {
        return (new JSONResponseResource(false,400,'expenses ID Not Available',null))->response();

      }
      $expenses=$expensesExists->delete();
      if(!$expenses)
      {
        return (new JSONResponseResource(false,400,'expenses ID Not Deleted Successfully',null))->response();
      }
      return (new JSONResponseResource(true,201,'expenses Data Deleted Successfully',null))->response();
        }
        catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error',null))->response();
    }
    }


}

