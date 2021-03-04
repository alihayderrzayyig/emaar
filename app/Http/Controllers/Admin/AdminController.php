<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\District;
use App\Gift;
use App\Governorate;
use App\Http\Controllers\Controller;
use App\JoinUs;
use App\Message;
use App\Project;
use App\Responsible;
use App\Situation;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'checkIsAdmin']);
    }

    public function index()
    {
        $situationAccept = Situation::where('status', 0)->get()->count();
        $messagesCount = Message::get()->count();
        $joinUsCount = JoinUs::get()->count();
        $giftCount = Gift::get()->count();
        $responsibles = Responsible::all();
        return view('admin.index', [
            'responsibles' => $responsibles,
        ])
            ->with('situationAccept', $situationAccept)
            ->with('joinUsCount', $joinUsCount)
            ->with('giftCount', $giftCount)
            ->with('messagesCount', $messagesCount);
    }

    public function achievments()
    {
        $branches = Branch::where('show', true)->get();
        $projects = Project::where('show', true)->get();
        return view('admin.achievments', [
            'branches'  => $branches,
            'projects'  => $projects,
        ]);
    }

    public function editImage(Request $request)
    {

        $request->validate([
            'image' => 'required|image',
        ]);

        if (\File::exists(public_path('img/' . $request->query('image')))) {
            \file::delete(public_path('img/' . $request->query('image')));
        } else {
            // dd('File does not exists.');
        }

        $img = Image::make($request->image);

        switch ($request->query('image')) {
            case 'achievements01.jpg':
                $img->resize(550, 480);
                break;

            case 'achievements02.jpg':
                $img->resize(270, 320);
                break;

            case 'achievements03.jpg':
                $img->resize(270, 320);
                break;

            case 'achievements04.jpg':
                $img->resize(265, 480);
                break;

            case 'achievements05.jpg':
                $img->resize(265, 240);
                break;

            case 'achievements06.jpg':
                $img->resize(265, 240);
                break;
        }

        // finally we save the image as a new file
        $img->save('img/' . $request->query('image'));

        session()->flash('success', 'تمة عملة التحديت بنجاح');

        return \redirect()->back();
    }




    public function notifications()
    {
        $users = User::where('isAdmin', 1)->get();

        foreach ($users as $user) {
            foreach ($user->unreadNotifications as $notification) {
                // dd($notification);
                $notification->markAsRead();
            }
        }


        // dd(auth()->user()->notifications[0]->data['message']['id']);
        return view('admin.notifications', [
            'notifications' => auth()->user()->notifications,
        ]);
    }

    public function showMessageNotifications($id)
    {
        $message = DB::table('messages')->where('id', $id)->first();
        $messageData = DB::table('notifications')->where('id', $id)->first();
        $message = json_decode($messageData->data);
        $message = $message->message;
        // dd($message);
        return view('admin.message.show', [
            'message' => $message,
        ]);



        // $message = DB::table('messages')->where('id', $id)->first();
        // return view('admin.message.show',[
        //     'message' => $message,
        // ]);
    }
    public function showJoinUsNotifications($id)
    {
        $governorates = Governorate::all();
        $districts = District::all();
        $joinUsData = DB::table('notifications')->where('id', $id)->first();
        $joinUs = json_decode($joinUsData->data);
        $joinUs = $joinUs->joinUs;
        return view('admin.joinUs.show', [
            'joinUs' => $joinUs,
            'governorates' => $governorates,
            'districts' => $districts,
        ]);

        // $governorates = Governorate::all();
        // $districts = District::all();
        // $joinUs = DB::table('join_us')->where('id', $id)->first();
        // return view('admin.joinUs.show',[
        //     'joinUs' => $joinUs,
        //     'governorates'=>$governorates,
        //     'districts'=>$districts,
        // ]);
    }

    public function showGiftNotifications($id){
        $governorates = Governorate::all();
        $districts = District::all();
        $gift = DB::table('notifications')->where('id', $id)->first();
        $gift = json_decode($gift->data);
        $gift = $gift->gift;
        // dd($gift);
        return view('admin.gift.show', [
            'gift' => $gift,
            'governorates' => $governorates,
            'districts' => $districts,
        ]);

    }
}
