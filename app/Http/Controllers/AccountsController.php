<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\guestBrand;
use App\account;
use App\penalty;
use App\Mail\RegistrationRejected;
use App\Mail\RegistrationApproved;
use App\Mail\BannedAccountReport;
use App\Mail\RestoreAccount;
use App\Notifications\WarningsNotification;
use Validator;
use Response;
use Session;

class AccountsController extends Controller
{
  protected $rules =
 [
   'name' => 'required|unique:accounts,Account_UserName|max:255',
   'password' => 'required|max:255',
 ];
 protected $rules2 =
[
  'name' => 'required|max:255',
  'password' => 'required|max:255',
  'status' => 'required',
  'rating' => 'required',
  'accesslevel' => 'required',
];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accounts = account::where('Account_Status','=','Activated')->orderBy('created_at','DESC')->get();
        $ForApprovalaccounts = DB::table('accounts')
        ->join('guest_brands','accounts.FK_GuestBrandID', '=', 'guest_brands.PK_GuestBrandID')
        ->where('Account_Status','=','ForApproval')
        ->orderBy('PK_AccountID','DESC')
        ->get();
        $Penalties = penalty::all();
        $PenaltiesCount = penalty::count();
        $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();
        return view('navigation/admin/accounts', ['accounts' => $accounts,'ForApprovalaccounts'=> $ForApprovalaccounts, 'currentAccount' => $currentAccount,'Penalties'=>$Penalties,'PenaltiesCount'=>$PenaltiesCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        else{
        $Account = new account;
        $Account->Account_UserName = $request->name;
        $Account->Account_Status = "Activated";
        $Account->Account_Password = $request->password;
        $Account->Account_Rating = "Normal";
        $Account->Account_AccessLevel = "Admin";
        $Account->save();
        return response()->json($Account);
      }
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
        //
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
        //
        $validator = Validator::make(Input::all(), $this->rules2);
          if ($validator->fails()) {
              return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          else{
        $Account = account::find($id);
        $Account->Account_UserName = $request->name;
        $Account->Account_Status = $request->status;
        $Account->Account_Password = $request->password;
        $Account->Account_Rating = $request->rating;
        $Account->Account_AccessLevel = $request->accesslevel;
        $Account->save();

        return response()->json($Account);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Account = account::findorfail($id);
        $Account->delete();

        return response()->json($Account);
    }

    public function search(Request $request){
      $Accounts = account::where([['Account_UserName', 'like', '%'.$request->word.'%'], ['Account_Status','=','ForApproval']])->get();
      $output = "<table class='table table-striped' id ='AccountTable'><thead><tr><th>Account ID</th><th>Account Username</th><th>Account Password</th><th>Account Status</th><th>Account Rating</th><th>Account Access Level</th></tr></thead><tbody>";

      foreach($Accounts as $Account){
        $output .= "<tr id = 'Account".$Account->PK_AccountID."'>".
                  "<td>".$Account->PK_AccountID."</td>".
                  "<td>".$Account->Account_UserName."</td>".
                  "<td>".$Account->Account_Password."</td>".
                  "<td>".$Account->Account_Status."</td>".
                  "<td>".$Account->Account_Rating."</td>".
                  "<td>".$Account->Account_AccessLevel."</td>".
                  "<td><button style = 'background-color:green;float:left;'  class='btn btn-primary' data-id = '".$Account->PK_AccountID."' data-name ='".$Account->Account_UserName."' data-password = '".$Account->Account_Password."' data-status='".$Account->Account_Status."' data-rating = '".$Account->Account_Rating."' data-accesslevel = '".$Account->Account_AccessLevel."' id='btnEdit'>Edit</button></td>".
                  "<td><button style = 'background-color:red;float:right;' class='btn btn-primary' data-id = '".$Account->PK_AccountID."' data-name ='".$Account->Account_UserName."' data-password = '".$Account->Account_Password."' data-status='".$Account->Account_Status."' data-rating = '".$Account->Account_Rating."' data-accesslevel = '".$Account->Account_AccessLevel."' id='btnDelete'>Delete</button></td></tr>";
      }

      $output .= "  </tbody></table>";
      return response()->json($output);

    //  return view('navigation/admin/accounts', ['accounts' => $Accounts]);
    }

    public function approveAccount(Request $request, $id)
    {
        //
        $validator = Validator::make(Input::all(), $this->rules2);
          if ($validator->fails()) {
              return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          else{
        $Account = account::find($id);
        $Account->Account_UserName = $request->name;
        $Account->Account_Status = "Activated";
        $Account->Account_Password = $request->password;
        $Account->Account_Rating = $request->rating;
        $Account->Account_AccessLevel = $request->accesslevel;

        $Account->save();
        Mail::to($request->email)->send(new RegistrationApproved($Account));
        return response()->json($Account);
      }
    }

    public function markAsRead(){
          $currentAccount->unreadNotifications->markAsRead();
    }

    public function rejectAccount(Request $request, $id){
      $validator = Validator::make(Input::all(), $this->rules2);
          if ($validator->fails()) {
              return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          else{
        $Account = account::find($id);
        $Account->Account_UserName = $request->name;
        $Account->Account_Status = "Rejected";
        $Account->Account_Password = $request->password;
        $Account->Account_Rating = $request->rating;
        $Account->Account_AccessLevel = $request->accesslevel;
        $Account->save();
        Mail::to($request->email)->send(new RegistrationRejected($Account));
        return response()->json($Account);

    }
  }

  public function updateStatus(Request $request, $id)
  {
      //
      $validator = Validator::make(Input::all(), $this->rules2);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        else{
      $Account = account::find($id);
      $Account->Account_UserName = $request->name;
      $Account->Account_Status = $request->status;
      $Account->Account_Password = $request->password;
      $Account->Account_Rating = $request->rating;
      $Account->Account_AccessLevel = $request->accesslevel;
      $Account->save();

      $penalty = penalty::find($request->penaltyID);

      if($Account->Account_Rating == "Warning"){
        $Account->notify(new WarningsNotification($penalty));
      }
      elseif ($Account->Account_Rating == "Banned") {
        $guestBrand = guestBrand::find($Account->FK_GuestBrandID);
        Mail::to($guestBrand->GuestBrand_EmailAddress)->send(new BannedAccountReport($penalty));
      }
      else{

      }

      return response()->json($Account);
    }
  }


  public function updateStatusRestore(Request $request, $id)
  {
      //
      $validator = Validator::make(Input::all(), $this->rules2);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        else{
      $Account = account::find($id);
      $Account->Account_UserName = $request->name;
      $Account->Account_Status = $request->status;
      $Account->Account_Password = $request->password;
      $Account->Account_Rating = $request->rating;
      $Account->Account_AccessLevel = $request->accesslevel;
      $Account->save();

      $penalty = penalty::find($request->penaltyID);

      if($Account->Account_Rating == "Normal"){
        $guestBrand = guestBrand::find($Account->FK_GuestBrandID);
        Mail::to($guestBrand->GuestBrand_EmailAddress)->send(new RestoreAccount());
      }

      return response()->json($Account);
    }
  }
    // public function brandprofile()
    // {
    //     //
    //   $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();
    //   return view('navigation/admin/brandprofile', ['currentAccount' => $currentAccount]);



    // } this is no more needed, transferred to brandprofilecontroller

}
