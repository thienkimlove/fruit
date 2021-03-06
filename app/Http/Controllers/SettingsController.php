<?php

namespace App\Http\Controllers;
use App\Http\Requests\SettingRequest;
use App\Setting;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $settings = Setting::paginate(10);

        return view('admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SettingRequest $request
     * @return Response
     */
    public function store(SettingRequest $request)
    {
        Setting::create($request->all());
        flash('Create settings success!', 'success');
        return redirect('settings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param SettingRequest $request
     * @return Response
     */
    public function update($id, SettingRequest $request)
    {
        $setting = Setting::findOrFail($id);
        $setting->update($request->all());
        flash('Update setting success!', 'success');
        return redirect('settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Setting::destroy($id);
        flash('Delete setting success!', 'success');
        return redirect('settings');
    }
}
