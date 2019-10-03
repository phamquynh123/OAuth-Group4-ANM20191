<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Faceboook as Faceboook;

use App\Http\Requests;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use Socialite;

class FacebookController extends Controller
{
    public function redirectToProvider()
    {
        $abc=  Socialite::driver('facebook')->redirect();
        return $abc;
    }
 
    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
 
        $authUser = $this->findOrCreateUser($user);
        
        // Chỗ này để check xem nó có chạy hay không
        dd($user);
 
        Auth::login($authUser, true);
 
        return redirect()->route('home');
    }
 
    private function findOrCreateUser($facebookUser){
        // $authUser = Faceboook::where('provider_id', $facebookUser->id)->first();
        // dd($authUser);
        // if($authUser){
        //     return $authUser;
        // }
 
        // return Faceboook::create([
        //     'name' => $facebookUser->name,
        //     'password' => $facebookUser->token,
        //     'email' => $facebookUser->email,
        //     'provider_id' => $facebookUser->id,
        //     'provider' => $facebookUser->id,
        // ]);
    }
}
