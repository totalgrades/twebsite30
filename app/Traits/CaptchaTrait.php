<?php namespace App\Traits;


use ReCaptcha\ReCaptcha;
use Request;

trait CaptchaTrait {

    public function captchaCheck()
    {

        $response = Request::get('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = env('RE_CAPTCHA_SECRET');

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return 1;
        } else {
            return 0;
        }

    }

}