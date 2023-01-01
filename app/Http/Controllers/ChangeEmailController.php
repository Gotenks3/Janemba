<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\EmailReset;

class ChangeEmailController extends Controller
{

    public function index() 
    {
        return view('emails.index');
    }

    public function sendChangeEmailLink(Request $request)
    {
        // dd($request);
        $new_email = $request->new_email;

        // トークン生成
        $token = hash_hmac(
            'sha256',
            Str::random(40) . $new_email,
            config('app.key')
        );

        $email_reset = EmailReset::create([
            'user_id' => Auth::id(),
            'new_email' => $new_email,
            'token' => $token,
        ]);

        $email_reset->sendEmailResetNotification($token);

        return redirect()->route('home')
            ->with(['message' => '確認メールを送信しました。' , 'status' => 'info']);
    }
}
