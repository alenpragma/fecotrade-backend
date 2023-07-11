<?php

namespace App\Console\Commands;

use App\Models\BonusWallet;
use App\Models\MiningWallet;
use App\Models\User;
use App\Models\PackageSetting;
use App\Models\Purchase;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;
use function Sodium\add;
use Auth;

class DailyBonus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bonus:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily package bonus';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return Command::SUCCESS;


        $purchases= Purchase::all();



        foreach ($purchases as $row) {

                $date1 = new DateTime($row['created_at']);
                $date2 = new DateTime(Carbon::now()->addDay(1));
                $days  = $date2->diff($date1)->format('%a');
                $package= PackageSetting::where('id',$row->package_id)->first();
                $sponsor_id= User::where('id',$row->user_id)->first();

                if ($days <= $package->validity){


                     $bonus= new BonusWallet();
                    $bonus->user_id= $row->user_id;

                    $bonus->amount= $package->daily_roi;
                    $bonus->method= 'Daily Bonus';
                    $bonus->type= 'Credit';
                    $bonus->status = 'approved';
                    $bonus->description= $package->daily_roi. ' GALA Token ' . 'Daily Bonus for purchasing '. ' ' . $package->package_name;
                    $bonus->save();
                    $deduct= new MiningWallet();
                    $deduct->user_id= $row->user_id;

                    $deduct->amount= -($package->daily_roi);
                    $deduct->method= 'Daily Bonus';
                    $deduct->type= 'Credit';
                    $deduct->status = 'approved';
                    $deduct->description= $package->daily_roi. ' GALA Token settled into Bonus Wallet' . ' for purchasing '. ' ' . $package->package_name;
                    $deduct->save();



                    



        }else
        {
            if($row->status == 0)
            {
                   
                    $purchase_update= Purchase::where('id',$row->id)->first();
                    $purchase_up= Purchase::find($purchase_update->id);
                    $purchase_up->status= 1;
                    $purchase_up->save();
                    
            }
        }

        $this->info('Successfully added daily bonus.');

      //  $use=((($user['packages']['return_percentage']*$user['packages']['price'])/100)*$sponsor_bonus['royality_bonus']/100)*$income[$i]/100;
    }
  }

}
