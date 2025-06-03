<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\roomsRequest;
use App\Http\Resources\JSONResponseResource;
use App\Models\rooms;

class roomManagementController extends Controller
{
    public function Index()
    {
        try
        {
      $rooms=rooms::paginate(5);
      if(!$rooms)
      {
        return (new JSONResponseResource(false,400,'Rooms Data Not Available',null))->response();

      }
      return (new JSONResponseResource(true,201,'Rooms Data Is  Available',$rooms))->response();
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
      $rooms=rooms::where('status','vacant')->get();
      if(!$rooms)
      {
        return (new JSONResponseResource(false,400,'Rooms Data Not Available',null))->response();

      }
      return (new JSONResponseResource(true,201,'Rooms Data Is  Available',$rooms))->response();
        }
        catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error',null))->response();
    }
    }



    public function Store(roomsRequest $rq)
    {
        try
        {
          
      $rooms= rooms::create([
        'room_number'=>$rq->room_number,
        'type'=>$rq->type,
        'status'=>$rq->status,
        'rent_amount'=>$rq->rent_amount,
      ]);

      if(!$rooms)
      {
        return ( new JSONResponseResource(false,400,'Rooms Data Not Saved Successfully',null))->response();
      }
      return (new JSONResponseResource(true,200,'Rooms Data Saved Successfully',$rooms))->response();
    }
    catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error'.$e,null))->response();
    }
    }



    public function Show($id)
    {
        try
        {
      $roomsExists=rooms::find($id);

      if(!$roomsExists)
      {
        return (new JSONResponseResource(false,400,'Rooms ID Not Available',null))->response();

      }

      return (new JSONResponseResource(true,201,'Rooms Data Is  Available',$roomsExists))->response();

        }

        catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error',null))->response();
    }
    }


    public function Update(Request $rq,$id)
    {
        try
        {
            $roomsExists=rooms::find($id);
            if(!$roomsExists)
            {
              return (new JSONResponseResource(false,400,'Rooms ID Not Available',null))->response();
      
            }

        $rooms= $roomsExists->update([
        'type'=>$rq->type,
        'status'=>$rq->status,
        'rent_amount'=>$rq->rent_amount,
      ]);
     // $roomsExists=rooms::find($id);

      if(!$rooms)
      {
        return ( new JSONResponseResource(false,400,'Rooms Data Not Updated Successfully',null))->response();
      }
      return (new JSONResponseResource(true,200,'Rooms Data Updated Successfully',$roomsExists))->response();
    }
    catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error'.$e,null))->response();
    }
    }

    
    public function updateStatus(Request $rq,$id)
    {
        try
        {
            $roomsExists=rooms::find($id);
            if(!$roomsExists)
            {
              return (new JSONResponseResource(false,400,'Rooms ID Not Available',null))->response();
      
            }

        $rooms= $roomsExists->update([
        'status'=>'occupied'
      ]);
     // $roomsExists=rooms::find($id);

      if(!$rooms)
      {
        return ( new JSONResponseResource(false,400,'Rooms Data Not Updated Successfully',null))->response();
      }
      return (new JSONResponseResource(true,200,'Rooms Data Updated Successfully',$roomsExists))->response();
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
      $roomsExists=rooms::find($id);
      if(!$roomsExists)
      {
        return (new JSONResponseResource(false,400,'Rooms ID Not Available',null))->response();

      }
      $rooms=$roomsExists->delete();
      if(!$rooms)
      {
        return (new JSONResponseResource(false,400,'Rooms ID Not Deleted Successfully',null))->response();
      }
      return (new JSONResponseResource(true,201,'Rooms Data Deleted Successfully',null))->response();
        }
        catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error',null))->response();
    }
    }


}
