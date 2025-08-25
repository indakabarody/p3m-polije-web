<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use Illuminate\Http\Request;

class AppSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appSetting = AppSetting::first();
        return view('admin.pages.app-settings.index', compact('appSetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'app_name' => 'required|string|max:255',
            'highlight_text' => 'nullable|string|max:255',
            'header_text' => 'required|string|max:255',
            'subheader_text' => 'required|string|max:255',
            'about' => 'required|string|max:65535',
            'vision_mission' => 'nullable|string|max:65535',
            'why_choose_us' => 'nullable|string|max:65535',
            'date_founded' => 'nullable|date',
            'clients_count' => 'nullable|numeric|min:0',
            'company_name' => 'required|string|max:255',
            'company_website_url' => 'required|string|url|max:255',
            'company_address' => 'required|string|max:65535',
            'company_email' => 'required|string|email|max:255',
            'company_phone' => 'required|string|max:20',
            'company_google_maps_iframe' => 'nullable|string|max:65535',
        ]);

        AppSetting::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'app_name' => $request->app_name,
            'highlight_text' => $request->highlight_text,
            'header_text' => $request->header_text,
            'subheader_text' => $request->subheader_text,
            'about' => $request->about,
            'vision_mission' => $request->vision_mission,
            'why_choose_us' => $request->why_choose_us,
            'date_founded' => $request->date_founded,
            'clients_count' => $request->clients_count,
            'company_name' => $request->company_name,
            'company_website_url' => $request->company_website_url,
            'company_address' => $request->company_address,
            'company_email' => $request->company_email,
            'company_phone' => $request->company_phone,
            'company_google_maps_iframe' => $request->company_google_maps_iframe,
        ]);

        return back()->with('toast_success', 'Berhasil menyimpan pengaturan umum aplikasi');
    }
}
