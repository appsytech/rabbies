<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\TwoFactorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function __construct(
        protected TwoFactorService $twoFactorService
    ) {}


    public function setup(Request $request)
    {
        $data = $this->twoFactorService->setup($request);

        return view('admin.pages.2fa.setup', compact('data'));
    }

    public function showDisbaleSetup(Request $request)
    {
        $data = [
            'id' => $request->id,
            'role' => $request->role ?? ''
        ];

        return view('admin.pages.2fa.disable', compact('data'));
    }

    public function enableTwoFactor(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);

        $response =  $this->twoFactorService->enable($request);

        if ($response['status']) {
            return redirect()->route($response['redirectRoute'])->with('success', $response['message']);
        }

        return redirect()->back()->withErrors($response['message']);
    }

    public function disableTwoFactor(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);

        $response =  $this->twoFactorService->disable($request);

        if ($response['status']) {
            return redirect()->route($response['redirectRoute'])->with('success', $response['message']);
        }

        return redirect()->back()->withErrors($response['message']);
    }

    public function showVerifyForm(Request $request)
    {


        $data = [
            'role' => $request->role,
            'user' => Auth::user()
        ];

        return view('admin.pages.2fa.verify', compact('data'));
    }


    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);

        return $this->twoFactorService->verify($request);
    }
}
