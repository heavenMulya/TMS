<?php

namespace App\Http\Controllers\tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\tenantRequest;
use App\Http\Resources\JSONResponseResource;
use App\Models\tenants;

class tenantManagementController extends Controller
{
    public function Index()
    {
        try
        {
      $tenants=tenants::with('room')->paginate(5);
      if(!$tenants)
      {
        return (new JSONResponseResource(false,400,'tenants Data Not Available',null))->response();

      }
      return (new JSONResponseResource(true,201,'tenants Data Is  Available',$tenants))->response();
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
      $tenants=tenants::all();
      if(!$tenants)
      {
        return (new JSONResponseResource(false,400,'tenants Data Not Available',null))->response();

      }
      return (new JSONResponseResource(true,201,'tenants Data Is  Available',$tenants))->response();
        }
        catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error',null))->response();
    }
    }


    public function Store(tenantRequest $rq)
    {
        try
        {
          
      $tenants= tenants::create([
        'full_name'=>$rq->full_name,
        'phone'=>$rq->phone,
        'email'=>$rq->email,
        'id_number'=>$rq->id_number,
        'room_id'=>$rq->room_id,
        'lease_start'=>$rq->lease_start,
        'lease_end'=>$rq->lease_end,
      ]);

      if(!$tenants)
      {
        return ( new JSONResponseResource(false,400,'tenants Data Not Saved Successfully',null))->response();
      }
      return (new JSONResponseResource(true,200,'tenants Data Saved Successfully',$tenants))->response();
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
      $tenantsExists = Tenants::with('room')->find($id);


      if(!$tenantsExists)
      {
        return (new JSONResponseResource(false,400,'tenants ID Not Available',null))->response();

      }

      return (new JSONResponseResource(true,201,'tenants Data Is  Available',$tenantsExists))->response();

        }

        catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error',null))->response();
    }
    }


    public function Update(tenantRequest $rq,$id)
    {
        try
        {
            $tenantsExists=tenants::find($id);
            if(!$tenantsExists)
            {
              return (new JSONResponseResource(false,400,'tenants ID Not Available',null))->response();
      
            }

        $tenants= $tenantsExists->update($rq->all());
     // $tenantsExists=tenants::find($id);

      if(!$tenants)
      {
        return ( new JSONResponseResource(false,400,'tenants Data Not Updated Successfully',null))->response();
      }
      return (new JSONResponseResource(true,200,'tenants Data Updated Successfully',$tenantsExists))->response();
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
      $tenantsExists=tenants::find($id);
      if(!$tenantsExists)
      {
        return (new JSONResponseResource(false,400,'tenants ID Not Available',null))->response();

      }
      $tenants=$tenantsExists->delete();
      if(!$tenants)
      {
        return (new JSONResponseResource(false,400,'tenants ID Not Deleted Successfully',null))->response();
      }
      return (new JSONResponseResource(true,201,'tenants Data Deleted Successfully',null))->response();
        }
        catch(\Exception $e)
    {
        return (new JSONResponseResource(false,500,'Internal Server Error',null))->response();
    }
    }


}
