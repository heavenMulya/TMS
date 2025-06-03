<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rooms;
use App\Models\tenants;
use App\Models\payments;
use App\Models\expenses;
use App\Http\Resources\JSONResponseResource;
use Carbon\Carbon;

class dashboardReport extends Controller
{




   public function getRoomCounts()
   {
       $total = Rooms::count();
       $vacant = Rooms::where('status', 'vacant')->count();
       $occupied = Rooms::where('status', 'occupied')->count();
       $maintenance = Rooms::where('status', 'maintenance')->count();
   
       $data = [
           'total_rooms' => $total,
           'vacant_rooms' => $vacant,
           'occupied_rooms' => $occupied,
           'maintenance_rooms' => $maintenance,
       ];
   
       return (new JSONResponseResource(true, 200, 'Room counts retrieved successfully', $data))->response();
   }
   
   public function getUnpaidTenants()
{
    $thisMonth = Carbon::now()->format('Y-m');
    $lastMonth = Carbon::now()->subMonth()->format('Y-m');

    // Only check tenants who joined before or during the month
    $unpaidThisMonth = Tenants::whereDate('lease_start', '<=', Carbon::now()->endOfMonth())
        ->whereDoesntHave('payments', function ($query) use ($thisMonth) {
            $query->where('month_paid_for', $thisMonth);
        })->paginate(5);

    $unpaidLastMonth = Tenants::whereDate('lease_start', '<=', Carbon::now()->subMonth()->endOfMonth())
        ->whereDoesntHave('payments', function ($query) use ($lastMonth) {
            $query->where('month_paid_for', $lastMonth);
        })->get();

    $data = [
        'this_month' => $unpaidThisMonth,
        'last_month' => $unpaidLastMonth
    ];

    return (new JSONResponseResource(true, 200, 'Unpaid tenants fetched', $data))->response();
    return view('receipts.Unpaid_print', ['data' => $data]);
}


      public function generateReceiptExpense()
    {
         $thisMonth = Carbon::now()->format('Y-m');
    $lastMonth = Carbon::now()->subMonth()->format('Y-m');

    // Only check tenants who joined before or during the month
    $unpaidThisMonth = Tenants::whereDate('lease_start', '<=', Carbon::now()->endOfMonth())
        ->whereDoesntHave('payments', function ($query) use ($thisMonth) {
            $query->where('month_paid_for', $thisMonth);
        })->paginate(5);

    $unpaidLastMonth = Tenants::whereDate('lease_start', '<=', Carbon::now()->subMonth()->endOfMonth())
        ->whereDoesntHave('payments', function ($query) use ($lastMonth) {
            $query->where('month_paid_for', $lastMonth);
        })->get();

    $data = [
        'this_month' => $unpaidThisMonth,
        'last_month' => $unpaidLastMonth
    ];

    return view('receipts.Unpaid_print', ['data' => $data]);
    }

public function getTenantCounts()
   {
       $total = tenants::count();
 
       return (new JSONResponseResource(true, 200, 'Room counts retrieved successfully', $total))->response();
   }

   public function getTotalPaymentExpenses()
   {
       $thisMonth = Carbon::now()->format('Y-m');

       // Only check tenants who joined before or during the month
       $totalPaidThisMonth = payments::where('month_paid_for', $thisMonth)->sum('amount');
       $totalExpensesPaidThisMonth = expenses::whereRaw("DATE_FORMAT(expense_date, '%Y-%m') = ?", [$thisMonth])
       ->sum('amount');

       $profit =$totalPaidThisMonth-$totalExpensesPaidThisMonth;
       $isLoss = $profit < 0;
       $amount = abs($profit);
       $data = [
         'totalPaidThisMonth'=>$totalPaidThisMonth,
         'totalExpensesPaidThisMonth'=>$totalExpensesPaidThisMonth,
         'status'=>$isLoss ? 'Loss' :'Profit' ,
         'amount'=>$amount
       ];
   
       return (new JSONResponseResource(true, 200, '', $data))->response();
   }

}
