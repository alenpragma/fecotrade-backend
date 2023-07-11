<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLevelSettingRequest;
use App\Models\LevelSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LevelSettingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('level_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $levelSettings = LevelSetting::all();

        return view('admin.levelSettings.index', compact('levelSettings'));
    }

    public function edit(LevelSetting $levelSetting)
    {
        abort_if(Gate::denies('level_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.levelSettings.edit', compact('levelSetting'));
    }

    public function update(UpdateLevelSettingRequest $request, LevelSetting $levelSetting)
    {
        $levelSetting->update($request->all());

        return redirect()->route('admin.level-settings.index');
    }

    public function show(LevelSetting $levelSetting)
    {
        abort_if(Gate::denies('level_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.levelSettings.show', compact('levelSetting'));
    }
}
