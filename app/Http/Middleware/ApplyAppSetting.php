<?php

namespace App\Http\Middleware;

use App\Models\AppSetting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ApplyAppSetting
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $appSetting = AppSetting::first();

        $mailConfig = array(
            'driver' => 'SMTP',
            'host' => $appSetting->smtp_host ?? config('mail.mailers.smtp.host'),
            'port' => $appSetting->smtp_port ?? config('mail.mailers.smtp.port'),
            'from' => array('address' => $appSetting->smtp_username ?? config('mail.from.address'), 'name' => $appSetting->app_name ?? config('app.name')),
            'encryption' => $appSetting->smtp_encryption ?? config('mail.mailers.smtp.encryption'),
            'username' => $appSetting->smtp_username ?? config('mail.mailers.smtp.username'),
            'password' => $appSetting->smtp_password ?? config('mail.mailers.smtp.password'),
            'sendmail' => '/usr/sbin/sendmail -bs',
            'pretend' => false
        );

        Config::set('app.name', $appSetting->app_name ?? config('app.name'));
        Config::set('mail', $mailConfig);

        return $next($request);
    }
}
