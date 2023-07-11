<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateGeneralSettingRequest;
use App\Models\GeneralSetting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class GeneralSettingController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('general_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $generalSettings = GeneralSetting::with(['media'])->first();

        return view('admin.generalSettings.index', compact('generalSettings'));
    }

    public function edit(GeneralSetting $generalSetting)
    {
        abort_if(Gate::denies('general_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.generalSettings.edit', compact('generalSetting'));
    }
    // 
    public function update(UpdateGeneralSettingRequest $request)
    {
        dd('ok');
        $generalSetting = GeneralSetting::first();
        if ($generalSetting) {
            $generalSetting->update($request->all());
        } else {
            $generalSetting = new GeneralSetting();
            $generalSetting->company_name = $request->company_name;
            $generalSetting->company_address = $request->company_address;
            $generalSetting->contact_email = $request->contact_email;
            $generalSetting->contact_no = $request->contact_no;
            $generalSetting->currency_name = $request->currency_name;
            $generalSetting->currency_symbol = $request->currency_symbol;
            $generalSetting->save();
        }


        if ($request->input('logo', false)) {
            if (!$generalSetting->logo || $request->input('logo') !== $generalSetting->logo->file_name) {
                if ($generalSetting->logo) {
                    $generalSetting->logo->delete();
                }
                $generalSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($generalSetting->logo) {
            $generalSetting->logo->delete();
        }

        if ($request->input('favicon', false)) {
            if (!$generalSetting->favicon || $request->input('favicon') !== $generalSetting->favicon->file_name) {
                if ($generalSetting->favicon) {
                    $generalSetting->favicon->delete();
                }
                $generalSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('favicon'))))->toMediaCollection('favicon');
            }
        } elseif ($generalSetting->favicon) {
            $generalSetting->favicon->delete();
        }

        return redirect()->route('admin.general-settings.index');
    }

    public function show(GeneralSetting $generalSetting)
    {
        abort_if(Gate::denies('general_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.generalSettings.show', compact('generalSetting'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('general_setting_create') && Gate::denies('general_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new GeneralSetting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
