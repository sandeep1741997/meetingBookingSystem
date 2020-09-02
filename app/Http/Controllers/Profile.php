<?php

namespace App\Http\Controllers;
use App\ModelProfile;
use App\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\RouteCollection;
use Crypt;

class Profile extends Controller
{
    public function Signup()
    {
    	return view('Signup');
    }

    public function registered(Request $req)
    {
        $req->validate([
            'name'=>"required",
            'email'=>"required",
            'password'=>"required"]);

    	$temp = new ModelProfile;
    	$temp->name = $req->name;
    	$temp->email = $req->email;
    	$temp->password = Crypt::encrypt($req->password);

        $check=$temp->save();
        $data=ModelProfile::where('email',$req->email)->get();
        $req->session()->put('tt',$data[0]->id);
        if($check)
        {
            return redirect('/Meeting');
        }
    }

    public function login()
    {
        return view('login');
    }
    public function logedin(Request $req)
    {
        $email = $req->email;
        $password = $req->password;
        $data=ModelProfile::where('email',$email)->get();
        $test = DB::select('select email from profiles where email = ?', [$email]);
   
        $req->session()->put('tt',$data[0]->id);
        $val=$req->session()->get('tt');
        if(collect($test)->first()){
        if(Crypt::decrypt($data[0]->password)== $password){
            return redirect('/Meeting');
        }
        else{
            echo "You have entered wrong password!";
        }
        }
       else {
           echo "You have entered worng Email!";
       }
        
    }

    public function meeting(Request $req ){

        $meetings = Meeting::sortable()->paginate(5);
        $host_id=$req->session()->get('tt');
        $temp =DB::table('profiles')->get();
        //$meet= DB::table('meetings')->get();
        $meet = DB::table('meetings')
->orderBy('meetingdate','desc')->orderBy('meetingtime','desc')   // You can pass as many columns as you required
->get();
        // $meet = DB::table('profiles')
        //     ->join('meetings', 'id', '=', 'user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();
        // return ModelProfile::find(1)->meetings;
        // $comments = $post->meetings;
        // return $comments;
        return view('Meeting',compact('host_id','temp','meet','meetings'));
        
    }

    public function createmeeting(Request $req){
        $host_id=$req->session()->get('tt');
        $user_id = $req->user_id;
        $meetingdate = $req->meetingdate;
        $meetingtime = $req->meetingtime;
        $str=":00";
        $meetingtime = $meetingtime.$str;
        $cond = false;
        $cond1 = false;
        $cond2 = false;
        $cond3 = false;
        
        $test = DB::select('select user_id from meetings where user_id = ?', [$user_id]);
        
        $data=DB::table('meetings')->where('host_id',$host_id)->get();
        
        foreach($data as $detail){
                $dbtime = strtotime($detail->meetingtime);
                $rqtime = strtotime($meetingtime) ;
                if(($detail->meetingdate == $meetingdate) && ($dbtime > ($rqtime-3600))&& ($dbtime<($rqtime+3600))){
                    $cond=true;
                    
                }
        }
        $data1=DB::table('meetings')->where('user_id',$host_id)->get();
        
        foreach($data1 as $detail){
                $dbtime = strtotime($detail->meetingtime);
                $rqtime = strtotime($meetingtime) ;
                if(($detail->meetingdate == $meetingdate) && ($dbtime > ($rqtime-3600))&& ($dbtime<($rqtime+3600))){
                    $cond1=true;
                    
                }
        }
        $data2=DB::table('meetings')->where('host_id',$user_id)->get();
        foreach($data2 as $detail){
            $dbtime = strtotime($detail->meetingtime);
            $rqtime = strtotime($meetingtime) ;
            if(($detail->meetingdate == $meetingdate) && ($dbtime > ($rqtime-3600))&& ($dbtime<($rqtime+3600))){
                $cond2=true;
                
            }
    }
    $data3=DB::table('meetings')->where('user_id',$user_id)->get();
    
    foreach($data3 as $detail){
            $dbtime = strtotime($detail->meetingtime);
            $rqtime = strtotime($meetingtime) ;
            if(($detail->meetingdate == $meetingdate) && ($dbtime > ($rqtime-3600))&& ($dbtime<($rqtime+3600))){
                $cond3=true;
                
            }
    }
    // $obj=array($data0,$data1,$data2,$data3);
    // return $obj; die;
    if($cond||$cond1 || $cond2 || $cond3){
        return "Slot has Booked for this user!";
    }
    else{
        $temp=new Meeting;
        $temp->host_id= $req->host_id;
        $temp->user_id = $req->user_id;
        $temp->meetingtitle = $req->meetingtitle;
        $temp->meetingdate = $req->meetingdate;
        $temp->meetingtime = $req->meetingtime;
        $temp->save();
        return redirect('/Meeting');
    }
         
    
    }

    public function edit(Request $req,$id){
        $host_id=$req->session()->get('tt');
        $prof =DB::table('profiles')->get();
        $meet = Meeting::find($id);
        return view('Meetingedit',compact('meet','prof','host_id'));
        
    }

    public function edited(Request $req){
        $req->validate([
            'user_id'=>"required",
            'meetingtitle'=>"required",
            'meetingdate'=>"required",
            'meetingtime'=>"required"]);
        $id = $req->id;
        $temp =  Meeting::find($id);
        $temp->user_id = $req->user_id;
        $temp->meetingtitle = $req->meetingtitle;
        $temp->meetingdate = $req->meetingdate;
        $temp->meetingtime = $req->meetingtime;
        $temp->update();
        return redirect('/Meeting');
    }
    public function delete($id)
    {

        Meeting::find($id)->delete();

        return Redirect('/Meeting');

    }
}
