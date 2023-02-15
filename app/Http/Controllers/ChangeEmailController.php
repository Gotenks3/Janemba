<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\EmailReset;
use App\Models\User;
use Illuminate\Support\Carbon;

class ChangeEmailController extends Controller
{

    public function index() 
    {
        $user = User::findOrFail(Auth::id());
        // $user = User::select('id', 'email')->get();
        // dd($user);
        return view('email.index', compact('user'));
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

        return redirect()->route('mypage.email')
            ->with(['message' => '確認メールを送信しました。' , 'status' => 'info']);
    }

    /**
     * メールアドレスの再設定処理
     *
     * @param Request $request
     * @param [type] $token
     */
    public function reset(Request $request, $token)
    {
        $email_resets = DB::table('email_resets')
            ->where('token', $token)
            ->first();

        if ($email_resets && !$this->tokenExpired($email_resets->created_at)) {

            $user = User::find($email_resets->user_id);
            $user->email = $email_resets->new_email;
            $user->save();

            DB::table('email_resets')
                ->where('token', $token)
                ->delete();

            return redirect()->route('mypage.')
                ->with(['message' => 'メールアドレスを変更しました。' , 'status' => 'info']);
        } else {

            if ($email_resets) {
                DB::table('email_resets')
                    ->where('token', $token)
                    ->delete();
            }
            return redirect()->route('mypage.')
                ->with(['message' => 'メールアドレスの変更に失敗しました。' , 'status' => 'alert']);
        }
    }


    /**
     * トークンが有効期限切れかどうかチェック
     *
     * @param  string  $createdAt
     * @return bool
     */
    protected function tokenExpired($createdAt)
    {
        // トークンの有効期限は60分に設定
        $expires = 60 * 60;
        return Carbon::parse($createdAt)->addSeconds($expires)->isPast();
    }
}
