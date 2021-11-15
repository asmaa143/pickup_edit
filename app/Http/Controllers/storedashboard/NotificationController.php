<?php

namespace App\Http\Controllers\storedashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\NotificationCustomer;
use App\Models\Customer;
use App\DataTables\NotificationDataTable;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NotificationDataTable $dataTable)
    {
     return $dataTable->render("storedashboard.notifications.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("storedashboard.notifications.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'title' => 'required',
           'text' => 'required'
       ]);
  $customers = Customer::whereStoreId(auth()->user()->store_id)->get();
  $notification = new Notification;
  $notification->store_id = auth()->user()->store_id;
  $notification->employee_id = auth()->id();
  $notification->title = $request->title;
  $notification->text = $request->text;
  $notification->save();
  $notification->customers()->attach($customers);
  foreach($customers as $customer){
       //     $to = $customer->device_token;
      //    $data = [
      //       "to" =>$to,
      //        "notification" =>[
      //               "title" => $notification->title,
      //               'body' => $notification->text,
      //           ],
      //       "data" =>[
      //               "title" => $notification->title,
      //               'body' => $notification->text,
      //               "click_action" => "FLUTTER_NOTIFICATION_CLICK",
      //               'type' => 'public'
      //           ], 
      //   ];
      //   $dataString = json_encode($data);
      //   $headers = [
      //       'Authorization: key=AAAAE3EEmLc:APA91bEEpryorVGIXqqOjJ6GEoH00ugWI1fpqmgUM7BXZljNRoKIybgaey6c5JI4XMz8rRxHBhLTo0xP_id8GVik8utMGTLB9ULaQG5oLU9vYgBT4YqB5xFLHHqQzxjlUiVRcIrW83ky',
      //       'Content-Type: application/json'
      //   ];
      //   $ch = curl_init();
      //   curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
      //   curl_setopt($ch, CURLOPT_POST, true);
      //   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      //   curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
      // $result=curl_exec($ch);
  }
  return redirect()->route("notifications.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = Notification::whereId($id)->first();
        return view("storedashboard.notifications.edit",compact("notification"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);
   $notification = Notification::whereId($id)->first();
   $notification->store_id = auth()->user()->store_id;
   $notification->employee_id = auth()->id();
   $notification->title = $request->title;
   $notification->text = $request->text;
   $notification->save();
  // $notification->customers()->attach($customers);
 
   return redirect()->route("notifications.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = Notification::whereId($id)->first();
        $notification->delete();
        return response()->json(['status' => true]);
    }
}
