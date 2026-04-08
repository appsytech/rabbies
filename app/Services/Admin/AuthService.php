<?php

namespace App\Services\Admin;

use App\Repositories\Admin\Interfaces\AdminRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected AdminRepositoryInterface $adminRepo
    ) {
        //
    }

    public function authenticate($request)
    {
        $credential = $request->credential;

        $admin = $this->adminRepo->findByCredential($credential, ['id', 'email', 'admin_role', 'google2fa_secret', 'google2fa_enabled']);

        if (! $admin || $admin->admin_role === 4 || $admin->admin_role === 5) {

            return redirect()->back()->withErrors('You are not admin');
        }

        if (!$admin->google2fa_enabled) {
            return redirect()->back()->withErrors('Administrator account is not available. Please contact the system owner or manager');
        }

        if (Auth::attempt(['email' => $admin->email, 'password' => $request->password])) {
            $admin->update([
                'last_login_at' => Carbon::now(),
            ]);

            return redirect()->route('google.2fa.verify.form');
        }


        return redirect()->back()->withErrors('Please recheck your credentials');
    }
}
