<?php

namespace App\Http\Controllers\Admin;

use App\Models\Boxmail;
use App\Models\Role;
use App\Mail\MailMarkdown;
use App\Mail\AdminMarkdown;
use App\Mail\ReceptMarkdown;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailboxController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()   //elle presente la liste des mails recu
    {
        $mailboxs = Boxmail::orderBy('id', 'desc')->get();
        $new = Boxmail::where('read', '0')->count();

        return view('admin.mailbox.mailbox', compact('mailboxs', 'new'));
    }

    public function compose()
    {
        $new = Boxmail::where('read', '0')->count();
        return view('admin.mailbox.compose', compact('new'));
    }

    public function replyMail($id)  //function qui permet de repondre à mail
    {
        $new = Boxmail::where('read', '0')->count();
        $mailbox = Boxmail::findOrFail($id);

        return view('admin.mailbox.reply_mail', compact('mailbox', 'new'));
    }

    public function show()
    {
        sdckld;
    }

    public function send()
    {
        $mailboxs = Boxmail::where('send', '1')->orderBy('id', 'desc')->get();
        $new = Boxmail::where('read', '0')->count();

        return view('admin.mailbox.send', compact('mailboxs', 'new'));
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
            'name'      => ['required', 'string', 'max:120'],
            'email'     => ['required', 'email'],
            'subject'   => ['required', 'string', 'max:120'],
            'message'   => ['required', 'string'],
        ]);

        if($request->role =="admin")
        {
            // dd('admin');
            $mailbox = [
                'sender'        => 'E_learning',
                'senderEmail'   => 'e_learning@example.com',
                'receiver'      => $request->name,
                'receiverEmail' => $request->email,
                'subject'       => $request->subject,
                'message'       => $request->message,
            ];

            // Mail::to($mailbox['receiverEmail'])->send(new AdminMarkdown($mailbox));

            Boxmail::create([
                'sender'        => $mailbox['sender'],
                'senderEmail'   => $mailbox['senderEmail'],
                'receiver'      => $mailbox['receiver'],
                'receiverEmail' => $mailbox['receiverEmail'],
                'subject'       => $mailbox['subject'],
                'message'       => $mailbox['message'],
                'send'          => 1,
                'read'          => 1,
                'admin_id'      => Auth::user()->id
            ]);
            return redirect()->route('admin.mailbox.index');
        }
        else
        {
            // dd('dsmml');
            $mailbox = [
                'sender' => $request->name,
                'senderEmail' => $request->email,
                'receiver' => 'E_learning',
                'receiverEmail' => 'e_learning@example.com',
                'subject' => $request->subject,
                'message' => $request->message,
            ];
            // Mail::to($mailbox['receiverEmail'])->send(new ReceptMarkdown($mailbox));

            // Mail::to($mailbox['senderEmail'])->send(new MailMarkdown($mailbox));

            Boxmail::create([
                'sender'        => $mailbox['sender'],
                'senderEmail'   => $mailbox['senderEmail'],
                'receiver'      => $mailbox['receiver'],
                'receiverEmail' => $mailbox['receiverEmail'],
                'subject'       => $mailbox['subject'],
                'message'       => $mailbox['message']
            ]);
            return view('contact');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Boxmail  $mailbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boxmail $mailbox)
    {
        // dd($mailbox);
        $mailbox->read = $request->read;
        $mailbox->save();
        $new = Boxmail::where('read', '0')->count();

        return view('admin.mailbox.read-mail', compact('mailbox', 'new'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mailbox  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boxmail $mailbox)
    {
        $mailbox->delete();

        return redirect()->route('admin.mailbox.index');
    }

    public function trash ()
    {
        $new = Boxmail::where('read', '0')->count();
        $mails = Boxmail::onlyTrashed()->orderBy('deleted_at', 'desc')->get();

        return view('admin.mailbox.trash', compact('mails', 'new'));
    }

    public function showTrash ($id)
    {
        $mailbox = Boxmail::withTrashed()->where('id', $id)->get();

        // dd($mailbox);
        $new = Boxmail::where('read', '0')->count();

        return view('admin.mailbox.read-mail', compact('mailbox', 'new'));
    }

    public function force_delete($id)
    {
        Boxmail::where('id', $id)->withTrashed()->forceDelete();

        return redirect()->route('admin.mailbox.trash');
    }
}
