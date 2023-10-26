<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\AdminChangeStatusUserJob;
use App\Jobs\CustomMessageToUserJob;
use App\Models\MailMessages;
use App\Models\User;
use App\Models\UserMail;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index($type)
    {
        $this->type = $type;
        $user_status = UserStatus::where('title', $type)->pluck('id')->first();
        $users = User::where('status', $user_status)->paginate(100);
        return view('admin.users.index', compact('users', 'type'));
    }

    public function remove(Request $request)
    {
        try {
            $item = User::findOrFail($request->id);
            $item->delete();
            $message = 'The Item Has Been Deleted Successfully';
            session()->flash('success', $message);
            $type = 1;
        } catch (\Exception $exception) {
            session()->flash('failed', $exception->getMessage());
            $type = 0;
        }
        $alert = view('admin.sections.alert')->render();
        return response()->json([$type, $alert]);
    }

    public function edit($type, User $user)
    {
        $userStatus = UserStatus::all();
        $messages = MailMessages::whereIn('id', [3, 4])->get();
        return view('admin.users.edit', compact('user', 'type', 'userStatus', 'messages'));
    }

    public function mails($type, User $user)
    {
        $mails=$user->mails()->paginate(100);
        return view('admin.users.mails', compact('user', 'type','mails'));
    }
    public function mail($type, User $user,UserMail $mail)
    {
        return view('admin.users.mail', compact('user', 'type','mail'));
    }

    public function update(Request $request, $type, User $user)
    {
        try {
            $previous_status = $user->status;
            $new_status = $request->status;
            if ($previous_status != $new_status) {
                if ($new_status == 1) {
                    //accepted request
                    $message_id = 4;
                    $message = MailMessages::where('id', $message_id)->first();
                }
                if ($new_status == 2) {
                    //denied request
                    $message_id = 3;
                    $message = MailMessages::where('id', $message_id)->first();
                }
                $title = $message->title;
                $text = $message->text;
                if ($message_id == 4) {
                    $username = $user->email;
                    $password = $this->randomPassword();
                    $user->update([
                        'password' => Hash::make($password),
                        'status' => 1
                    ]);
                    $text = str_replace('{username}', $username, $text);
                    $text = str_replace('{password}', $password, $text);
                }
                $note = $request->note;
                $user_mail = UserMail::create([
                    'user_id' => $user->id,
                    'message' => $text . $note,
                ]);
                dispatch(new AdminChangeStatusUserJob($user, $title, $text, $note, $user_mail->id));
            }
            $user->update($request->all());
            $message = 'The Item Has Been Updated Successfully';
            session()->flash('success', $message);
        } catch (\Exception $exception) {
            session()->flash('failed', $exception->getMessage());
        }
        return redirect()->back();
    }

    public function reset_password(Request $request, User $user)
    {
        $request->validate([
            'new_password' => 'required'
        ]);
        try {
            $new_password = $request->new_password;
            $user->update([
                'password' => Hash::make($new_password)
            ]);
            $message = 'New Password Generated Successfully';
            session()->flash('success', $message);
        } catch (\Exception $exception) {
            session()->flash('failed', $exception->getMessage());
        }
        return redirect()->back();
    }

    public function sendMessage(Request $request, User $user)
    {
        $request->validate([
            'title'=>'required',
            'message'=>'required',
        ]);
        try {
            $message = $request->message;
            $title = $request->title;
            $user_mail = UserMail::create([
                'user_id' => $user->id,
                'message' => $title . $message,
            ]);
            dispatch(new CustomMessageToUserJob($message,$title,$user_mail->id,$user->email));
            $message = 'The Email Was Sent To User Successfully';
            session()->flash('success', $message);
        } catch (\Exception $exception) {
            session()->flash('failed', $exception->getMessage());
        }
        return redirect()->back();
    }

    private function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 20; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
