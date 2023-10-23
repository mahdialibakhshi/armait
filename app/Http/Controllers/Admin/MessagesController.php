<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MailMessages;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function emails()
    {
        $emails = MailMessages::paginate(50);
        return view('admin.messages.mails.index', compact('emails'));
    }

    public function email_edit(MailMessages $mail)
    {
        return view('admin.messages.mails.edit', compact('mail'));
    }

    public function email_update(Request $request, MailMessages $mail)
    {
        try {
            $mail->update($request->all());
            $type = 'success';
            $msg = 'The Item Has Been Updated Successfully';
        } catch (\Exception $exception) {
            $type = 'failed';
            $msg = $exception->getMessage();
        }
        session()->flash($type, $msg);
        return redirect()->back();
    }

    public function alerts()
    {
        $alerts = Message::paginate(50);
        return view('admin.messages.alerts.index', compact('alerts'));
    }

    public function alert_edit(Message $alert)
    {
        return view('admin.messages.alerts.edit', compact('alert'));
    }

    public function alert_update(Request $request, Message $alert)
    {
        try {
            $alert->update($request->all());
            $type = 'success';
            $msg = 'The Item Has Been Updated Successfully';

        } catch (\Exception $exception) {
            $type = 'failed';
            $msg = $exception->getMessage();
        }
        session()->flash($type, $msg);
        return redirect()->back();
    }
}
