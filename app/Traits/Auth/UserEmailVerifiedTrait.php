<?php

namespace App\Traits\Auth;

use App\Jobs\MailJob;
use App\ORM\User\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

trait UserEmailVerifiedTrait {

    /**
     * Validate confirmation e-mail
     * @param User $user
     * @return bool
     */
    public function validateConfirmEmail(User $user)
    {
        if (is_null($user->userEmailVerify)) {

            $token = Str::random(40);

            $user->userEmailVerify()->create([
                'ip'            => request()->ip(),
                'token'         => $token,
                'token_expires' => Carbon::now()->addHours(2),
            ]);

            return $this->sendEmailVerification($user->email, $user->name, $token);

        } elseif (Carbon::createFromFormat('Y-m-d H:i:s', $user->userEmailVerify->token_expires) < Carbon::now()) {

            $token = Str::random(40);

            $user->userEmailVerify()->update([
                'ip'            => request()->ip(),
                'token'         => $token,
                'token_expires' => Carbon::now()->addHours(2),
            ]);

            return $this->sendEmailVerification($user->email, $user->name, $token);
        }

        return true;
    }


    /**
     * Send the email verification notification.
     * @param string $email
     * @param string $name
     * @param string $token
     * @throws
     * @return boolean
     */
    public function sendEmailVerification(string $email, string $name, string $token)
    {
        try {

            MailJob::dispatch(array(
                'from' => config('mail.from'),
                'to'   => [
                    'email' => $email ?? '',
                    'name'  => $name ?? '',
                ],
                'subject'  => config('app.name') . ' - confirmação de cadastro',
                'html'     => view('emails.auth.email-verify')->with([
                    'url'  => route('site.auth.confirm', $token),
                    'name' => firstName($name)
                ])->render(),
            ));

            return true;

        } catch (\Exception $e) {

            Log::error(__FUNCTION__ . " - " . exceptionString($e));

            return false;
        }
    }
}
