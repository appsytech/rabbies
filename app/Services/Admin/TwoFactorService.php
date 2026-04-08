<?php

namespace App\Services\Admin;

use App\Mail\SendAdmin2faMail;
use App\Repositories\Admin\Interfaces\AdminRepositoryInterface;
use App\Repositories\Admin\Interfaces\DoctorRepositoryInterface;
use App\Repositories\Admin\Interfaces\StaffRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected Google2FA $google2fa,
        protected AdminRepositoryInterface $adminRepo
    ) {}



    public function setup($request)
    {
        $id = (int) decrypt($request->id);

        $user = $this->adminRepo->find($id);

        if (isset($user->google2fa_secret)) {
            $secret = decrypt($user->google2fa_secret);
        } else {
            $secret = $this->generateSecret();

            $user->update([
                'google2fa_secret' => encrypt($secret),
                'google2fa_enabled' => false,
            ]);
        }

        $qrUrl = $this->getQrCodeUrl($user->email, $secret);

        Mail::to($user->email)->send(new SendAdmin2faMail([
            'qrUrl' => $qrUrl,
            'secret' => $secret,
        ]));


        return [
            // 'qrUrl' => $qrUrl,
            // 'secret' => $secret,
            'id' => $request->id,
            'user' => $user,
            'role' => $request->role ?? ''
        ];
    }




    public function enable($request)
    {
        $id = (int) decrypt($request->id);

        $user = $this->adminRepo->find($id);
        $redirectRoute = 'admin.index';

        $secret = decrypt($user->google2fa_secret);

        if ($this->verifyKey($secret, $request->otp)) {
            $user->update([
                'google2fa_enabled' => true
            ]);

            session(['2fa_passed' => true]);

            return [
                'status' => true,
                'message' => 'Two Factor Authentication Enabled',
                'redirectRoute' => $redirectRoute
            ];
        }

        return [
            'status' => false,
            'message' => 'Failed!.'
        ];
    }

    public function disable($request)
    {
        $id = (int) decrypt($request->id);

        $user = $this->adminRepo->find($id);
        $redirectRoute = 'admin.index';

        $secret = decrypt($user->google2fa_secret);

        if ($this->verifyKey($secret, $request->otp)) {
            $user->update([
                'google2fa_enabled' => false,
                'google2fa_secret' => null
            ]);

            return [
                'status' => true,
                'message' => 'Two Factor Authentication Disabled',
                'redirectRoute' => $redirectRoute
            ];
        }

        return [
            'status' => false,
            'message' => 'Failed!.'
        ];
    }


    public function verify($request)
    {
        $user = Auth::user();

        $secret = decrypt($user->google2fa_secret);

        if ($this->verifyKey($secret, $request->otp)) {
            session(['2fa_passed' => true]);
            return redirect()->route('dashboard')->with('success', 'Welcome To Dashboard');
        }

        return redirect()->back()->withErrors('failed!.');
    }

    public function generateSecret(): string
    {
        return $this->google2fa->generateSecretKey();
    }

    public function getQrCodeUrl($email, $secret): string
    {
        return $this->google2fa->getQRCodeUrl(
            config('app.name'),
            $email,
            $secret
        );
    }

    public function verifyKey(string $secret, string $otp): bool
    {
        return $this->google2fa->verifyKey($secret, $otp);
    }
}
