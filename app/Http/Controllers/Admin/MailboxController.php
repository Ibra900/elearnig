<?php

namespace App\Http\Controllers\Admin;

use App\Models\Boxmail;
use App\Mail\MailMarkdown;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mailboxs = Boxmail::orderBy('id', 'desc')->get();
        $nbre = Boxmail::where('read', '0')->count();
        return view('admin.mailbox.mailbox', compact('mailboxs', 'nbre'));
    }

    public function compose()
    {
        return view('admin.mailbox.compose');
    }

    public function replyMail($id)
    {
        $mailbox = Boxmail::find($id);
        return view('admin.mailbox.reply_mail', compact('mailbox'));
    }

    public function show()
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
        $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string', 'max:120'],
            'message' => ['required', 'string'],
        ]);

        $mailbox = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        // $user = ['email' => 'user@test.com', 'name' => 'toto sango'];
        // Mail::to($user['email'])->send(new EnvoiMail($user));

        Mail::to($mailbox['email'])->send(new MailMarkdown($mailbox));

        Boxmail::create($request->all());
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function replyStore(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'email'],
        ]);
        dd($request);

        $ma = [
            'name' => $request->user,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,

        ];


        $mail = [
            'name' => Auth::user()->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'sent' => 0
        ];

        Mail::to($ma['email'])->send(new EmailMarkdown($ma));

        Boxmail::create($mail->all());
        return redirect()->route('index');
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
        $nbre = Boxmail::where('read', '0')->count();
        return view('admin.mailbox.read-mail', compact('mailbox', 'nbre'));
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
        $nbre = Boxmail::where('read', '0')->count();

        $mails = Boxmail::onlyTrashed()->get();
        // dd($mails);
        return view('admin.mailbox.trash', compact('mails', 'nbre'));
    }

    public function showTrash ($id)
    {
        $mailbox = Boxmail::withTrashed()->where('id', $id)->get();

        // dd($mailbox);
        $nbre = Boxmail::where('read', '0')->count();
        return view('admin.mailbox.read-mail', [
            'mailbox' => $mailbox,
            'nbre' => $nbre
        ]);
    }

    public function force_delete($id)
    {
        Boxmail::where('id', $id)->withTrashed()->forceDelete();

        return redirect()->route('admin.mailbox.trash');
    }
}
