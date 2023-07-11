<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPackageSettingRequest;
use App\Http\Requests\StorePackageSettingRequest;
use App\Http\Requests\UpdatePackageSettingRequest;
use App\Models\PackageSetting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use App\Models\CashWallet;
use Auth;
use App\Models\Purchase;
use App\Models\MiningWallet;
use Carbon\Carbon;
use App\Models\BonusWallet;
use App\Models\LevelSetting;
use App\Models\User;


class PackageSettingController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('package_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packageSettings = PackageSetting::with(['media'])->get();

        return view('admin.packageSettings.index', compact('packageSettings'));
    }

    public function create()
    {
        abort_if(Gate::denies('package_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.packageSettings.create');
    }

    public function store(StorePackageSettingRequest $request)
    {
       // dd($request);
        $packageSetting = PackageSetting::create($request->all());

        if ($request->input('image', false)) {
            $packageSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $packageSetting->id]);
        }

        return redirect()->route('admin.package-settings.index');
    }

    public function edit(PackageSetting $packageSetting)
    {
        abort_if(Gate::denies('package_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.packageSettings.edit', compact('packageSetting'));
    }

    public function update(UpdatePackageSettingRequest $request, PackageSetting $packageSetting)
    {
        $packageSetting->update($request->all());

        if ($request->input('image', false)) {
            if (! $packageSetting->image || $request->input('image') !== $packageSetting->image->file_name) {
                if ($packageSetting->image) {
                    $packageSetting->image->delete();
                }
                $packageSetting->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($packageSetting->image) {
            $packageSetting->image->delete();
        }

        return redirect()->route('admin.package-settings.index');
    }

    public function show(PackageSetting $packageSetting)
    {
        abort_if(Gate::denies('package_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.packageSettings.show', compact('packageSetting'));
    }

    public function destroy(PackageSetting $packageSetting)
    {
        abort_if(Gate::denies('package_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packageSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroyPackageSettingRequest $request)
    {
        $packageSettings = PackageSetting::find(request('ids'));

        foreach ($packageSettings as $packageSetting) {
            $packageSetting->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('package_setting_create') && Gate::denies('package_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PackageSetting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
    public function user_package()
    {
        $data['cash_wallet']= CashWallet::where('user_id',Auth::id())->where('status','approved')->sum('amount');
        $packages= PackageSetting::where('status',1)->get();
        return view('users.packages',compact('packages','data'));
    }
    public function buyPackage(Request $request)
    {
         $data['cash_wallet']=CashWallet::where('user_id',Auth::id())->where('status','approved')->sum('amount');
         $package= PackageSetting::where('id',$request->package_id)->first();
          if($data['cash_wallet'] < $package->price)
    {
        return back()->with('purchase_error', 'Insufficent Balance');
    };
    
    $purchase= new Purchase();
    $purchase->user_id= $request->user_id;
    $purchase->package_id= $request->package_id;
    $purchase->date= Carbon::now();
    $purchase->save();   
      $deduct= new CashWallet();
      $deduct->user_id = $request->user_id;
      $deduct->amount = -($package->price);
      //$deduct->method=$method;

      $deduct->method = 'Purchased Package ' . $package->package_name;
      $deduct->type = 'Debit';
      $deduct->status = 'approved';
      $deduct->description = 'Purchased Package ' . $package->package_name . ' for Gala' . $package->price;
      $deduct->save();
      $bonus= new MiningWallet();
      $bonus->user_id = $request->user_id;
      $bonus->amount = ($package->total_roi);
      //$deduct->method=$method;

      $bonus->method = 'Purchased Package ' . $package->package_name;
      $bonus->type = 'Credit';
      $bonus->status = 'approved';
      $bonus->description = $package->total_roi .' added for Purchasing Package ' . $package->package_name . ' for Gala' . $package->price;
      $bonus->save();
        $g_set = LevelSetting::first();
        
             $received_user= User::where('id',$request->user_id)->first();
                $lvl_1=User::where('id',$request->user_id)->first();
                //dd($lvl_1->placement_id);
                $lvl_1_placement= User::where('id',$lvl_1->sponsor)->first();


                //dd($lvl_1_placement);
                if($package->no_of_levels > 0)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_1_placement->id;
                                $bonus_amount_l->received_from = $lvl_1->id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_1/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->type = 'Credit';
                                $bonus_amount_l->status = 'approved';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_1/100).' GALA'. ' Level 1 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                $lvl_2= User::where('id',$lvl_1_placement->sponsor)->first();
                //dd($lvl_2);
                 
                if($package->no_of_levels > 1 && $lvl_2 != null)
                {
                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_2->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_2/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->type = 'Credit';
                                $bonus_amount_l->status = 'approved';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_2/100).' GALA'. ' Level 2 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                
                }
                $lvl_3= User::where('id',$lvl_2->id)->first();

                $lvl_3_placement= User::where('id',$lvl_3->sponsor)->first();
               // dd($lvl_3_placement);
                if($package->no_of_levels > 2 && $lvl_3_placement != null) 
                {

                     $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_3_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_3/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->type = 'Credit';
                                $bonus_amount_l->status = 'approved';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_3/100).' GALA'. ' Level 3 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }


                $lvl_4= User::where('id',$lvl_3_placement->id)->first();
                 $lvl_4_placement= User::where('id',$lvl_4->sponsor)->first();
                  if($package->no_of_levels > 3 && $lvl_4_placement != null)
                {

                     $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_4_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_4/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->type = 'Credit';
                                $bonus_amount_l->status = 'approved';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_4/100).' GALA'. ' Level 4 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }

                 $lvl_5= User::where('id',$lvl_4_placement->id)->first();
                 $lvl_5_placement= User::where('id',$lvl_5->sponsor)->first();
                  if($package->no_of_levels > 4 && $lvl_5_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_5_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_5/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_5/100).' GALA'. ' Level 5 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                
                $lvl_6= User::where('id',$lvl_5_placement->id)->first();
                 $lvl_6_placement= User::where('id',$lvl_6->sponsor)->first();
                  if($package->no_of_levels > 5 && $lvl_6_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_6_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_6/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_6/100).' GALA'. ' Level 6 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                
                $lvl_7= User::where('id',$lvl_6_placement->id)->first();
                 $lvl_7_placement= User::where('id',$lvl_7->sponsor)->first();
                  if($package->no_of_levels > 6 && $lvl_7_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_7_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_7/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_7/100).' GALA'. ' Level 7 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                $lvl_8= User::where('id',$lvl_7_placement->id)->first();
                 $lvl_8_placement= User::where('id',$lvl_8->sponsor)->first();
                  if($package->no_of_levels > 7 && $lvl_8_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_8_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_8/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_8/100).' GALA'. ' Level 8 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                 $lvl_9= User::where('id',$lvl_8_placement->id)->first();
                 $lvl_9_placement= User::where('id',$lvl_9->sponsor)->first();
                  if($package->no_of_levels > 8 && $lvl_9_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_9_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_9/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_9/100).' GALA'. ' Level 9 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                 $lvl_10= User::where('id',$lvl_9_placement->id)->first();
                 $lvl_10_placement= User::where('id',$lvl_10->sponsor)->first();
                  if($package->no_of_levels > 9 && $lvl_10_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_10_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_10/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_10/100).' GALA'. ' Level 10 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                $lvl_11= User::where('id',$lvl_10_placement->id)->first();
                 $lvl_11_placement= User::where('id',$lvl_11->sponsor)->first();
                  if($package->no_of_levels > 10 && $lvl_11_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_11_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_11/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_11/100).' GALA'. ' Level 11 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                $lvl_12= User::where('id',$lvl_11_placement->id)->first();
                 $lvl_12_placement= User::where('id',$lvl_12->sponsor)->first();
                  if($package->no_of_levels > 11 && $lvl_12_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_12_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_12/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_12/100).' GALA'. ' Level 12 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                
                 $lvl_13= User::where('id',$lvl_12_placement->id)->first();
                 $lvl_13_placement= User::where('id',$lvl_13->sponsor)->first();
                  if($package->no_of_levels > 12 && $lvl_13_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_13_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_13/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_13/100).' GALA'. ' Level 13 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                 $lvl_14= User::where('id',$lvl_13_placement->id)->first();
                 $lvl_14_placement= User::where('id',$lvl_14->sponsor)->first();
                  if($package->no_of_levels > 13 && $lvl_14_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_14_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_14/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_14/100).' GALA'. ' Level 14 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                 $lvl_15= User::where('id',$lvl_14_placement->id)->first();
                 $lvl_15_placement= User::where('id',$lvl_15->sponsor)->first();
                  if($package->no_of_levels > 14 && $lvl_15_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_15_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_15/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_15/100).' GALA'. ' Level 15 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                $lvl_16= User::where('id',$lvl_15_placement->id)->first();
                 $lvl_16_placement= User::where('id',$lvl_16->sponsor)->first();
                  if($package->no_of_levels > 15 && $lvl_16_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_16_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_16/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_16/100).' GALA'. ' Level 16 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                $lvl_17= User::where('id',$lvl_16_placement->id)->first();
                 $lvl_17_placement= User::where('id',$lvl_17->sponsor)->first();
                  if($package->no_of_levels > 16 && $lvl_17_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_17_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_17/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_17/100).' GALA'. ' Level 17 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                $lvl_18= User::where('id',$lvl_17_placement->id)->first();
                 $lvl_18_placement= User::where('id',$lvl_18->sponsor)->first();
                  if($package->no_of_levels > 17 && $lvl_18_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_18_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_18/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_18/100).' GALA'. ' Level 18 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                $lvl_19= User::where('id',$lvl_18_placement->id)->first();
                 $lvl_19_placement= User::where('id',$lvl_19->sponsor)->first();
                  if($package->no_of_levels > 18 && $lvl_19_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_19_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_19/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_19/100).' GALA'. ' Level 19 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
                 $lvl_20= User::where('id',$lvl_19_placement->id)->first();
                 $lvl_20_placement= User::where('id',$lvl_20->sponsor)->first();
                  if($package->no_of_levels > 19 && $lvl_20_placement != null)
                {

                                $bonus_amount_l = new BonusWallet();
                                $bonus_amount_l->user_id = $lvl_20_placement->id;
                                $bonus_amount_l->received_from = $request->user_id;
                                $bonus_amount_l->amount = $package->total_roi * ($g_set->level_20/100);
                                $bonus_amount_l->method = 'Level Bonus';
                                $bonus_amount_l->status = 'approved';
                                $bonus_amount_l->type = 'Credit';

                                $bonus_amount_l->description= $package->total_roi * ($g_set->level_20/100).' GALA'. ' Level 20 Bonus Credited from '. $received_user->user_name;

                                $bonus_amount_l->save();
                }
         
         
      return back()->with('purchase_successful', 'Successfully Purchased Package');
    }
}
