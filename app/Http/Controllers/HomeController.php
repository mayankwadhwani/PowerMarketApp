<?php

namespace App\Http\Controllers;

use App\Region;
use App\Account;
use App\Geopoint;
use App\Cluster;
use App\Helpers\pro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function saveindex()
    {
        $gloucester = Region::where('name', 'Gloucester')->first();
        return view('pages.dashboard', ['geodata' => optional($gloucester)->geopoints]);
    }

    public function index()
    {
        $user = auth()->user();
        if (!$user->hasOrganization()) {
            return redirect('dashboard/Gloucestershire');
        }
        $org = $user->organization;
        $my_clusters = DB::table('clusters')
                    ->where('user_id', $user->id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('pages.organization', [
            'org_name' => $org->name,
            'members' => $user->isMember() ? [] : $org->members,
            'accounts' => $user->isMember() ? $user->accounts->load('regions') : $org->accounts->load('regions'),
            'my_clusters' => $user->isMember() ? null : $my_clusters,
            'clusters' => $user->isMember() ? null : $user->clusters
        ]);
    }
    public function account($account_name)
    {
        $account = Account::where('name', $account_name)->first();
        $user = auth()->user();
        if ($account == null) {
            return abort(404);
        }

        $org = $user->organization;
        if ($user->isOrgAdmin() && $account_name != Controller::DEFAULT_ACCOUNT) {
            if ($org == null) return abort(404);
            $account = $org->accounts()->where('name', $account_name)->first();
            if ($account == null) return abort(404);
        }
        if ($user->isMember() && $account_name != Controller::DEFAULT_ACCOUNT) {
            $account = $user->accounts()->where('name', $account_name)->first();
            if ($account == null) return abort(404);
        }

        $region_ids = $account->regions()->pluck('id')->toArray();

        if (($key = array_search(30, $region_ids)) !== false) {
            unset($region_ids[$key]);
        }

        /*$geopoints = Geopoint::whereIn('geopoints.region_id', $region_ids)->whereIn('geopoints.id', [37530, 35445, 35446])
            ->leftJoin('geopoint_organization_vendors', 'geopoint_organization_vendors.geopoint_id', '=', 'geopoints.id')
            ->leftJoin('organization_vendors', function($q) use ($user) {
                $q->on('organization_vendors.id', '=', 'geopoint_organization_vendors.organization_vendor_id')
                    ->on('organization_vendors.organisation_id', '=', DB::raw($user->organization_id));
            })
            ->leftJoin('vendors', 'organization_vendors.vendor_id', '=', 'vendors.id')
            ->select(['geopoints.*', 'organization_vendors.id as organization_vendors_id', 'vendors.id as vendor_id', 'vendors.name as vendor_name'])
            ->groupBy('geopoints.id')
            ->get();*/
        $geopoints = Geopoint::whereIn('region_id', $region_ids)
            ->with(['geopoint_organization_vendor' => function($q) use ($user) {
                $q->whereHas('organization_vendor', function($q) use ($user) {
                    $q->where('organisation_id', '=', $user->organization_id);
                })
                    ->with(['organization_vendor' => function($q) use ($user) {
                        $q->with('vendor');
                    }]);
            }])
            ->get();

        $pro_geopoints = pro_params($org['captiveuse'], $org['exporttariff'], $org['residentialtariff'], $org['nonresidentialtariff'], 6000, 5 , $geopoints);

        return view('pages.dashboard', [
            'geodata' => $pro_geopoints,
            'account' => $account_name,
            'orgdata' => $user->organization->toArray()
        ]);
    }
    public function region($account_name, $region_name)
    {
        $account = Account::where('name', $account_name)->first();
        $user = auth()->user();
        if ($account == null) {
            return abort(404);
        }
        $org = $user->organization;
        if ($user->isOrgAdmin() && $account_name != Controller::DEFAULT_ACCOUNT) {
            if ($org == null) return abort(404);
            $account = $org->accounts()->where('name', $account_name)->first();
            if ($account == null) return abort(404);
        }
        if ($user->isMember() && $account_name != Controller::DEFAULT_ACCOUNT) {
            $account = $user->accounts()->where('name', $account_name)->first();
            if ($account == null) return abort(404);
        }
        $region = $account->regions()->where('name', $region_name)->first();
        if ($region == null) return abort(404);
        $geopoints = Geopoint::where('region_id', $region->id)->get();
        return view('pages.dashboard', [
            'geodata' => $geopoints,
            'orgdata' => $user->organization->toArray(),
            'account' => $account_name,
            'region' => $region_name
        ]);
    }

    public function region_pro(Request $request){
        $account_name = $request->account;
        $user = auth()->user();

        $orgmaindata = $user->organization->toArray();

        $account = Account::where('name', $account_name)->first();
        $region_name = $request->region;
        //region may or may not be passed through the request:
        if ($region_name) {
            $region = $account->regions()->where('name', $region_name)->first();
            $geopoints = Geopoint::where('region_id', $region->id)->get();
            //dd("with region name", $geopoints);
        } else{
            $region_ids = $account->regions()->pluck('id')->toArray();
            $geopoints = Geopoint::whereIn('region_id', $region_ids)->get();
            //dd("without region name", $geopoints);
        };
        //dd($geopoints);
        if($geopoints == null) return abort(404);
        //-----------user input params-------------
        //----laravel blade input seems unable to pass input of type "number" as numeric values----
        //----so manually converting input fields from string to floats in controller, for now-----
        $captive_use = floatval($orgmaindata['captiveuse']);
        if(!empty($request->captive_use)){
            $captive_use = floatval($request->captive_use);
        }
        $export_tariff_tmp = 0;
        //if(!empty($orgmaindata['export_tariff'])){
        //    $export_tariff_tmp = $orgmaindata['export_tariff'];
        //}
        if(!empty($orgmaindata['exporttariff'])){
            //$export_tariff_tmp = $orgmaindata['exporttariff'];
        }
        $export_tariff = $request->export_tariff ? floatval($request->export_tariff) : $export_tariff_tmp;

        //$domestic_tariff may have a different value if account is "PPS"
        if($request->domestic_tariff){
            $domestic_tariff = floatval($request->domestic_tariff);
        } else{
            $domestic_tariff = $orgmaindata['residentialtariff'];
        }

        $commercial_tariff_tmp = 0;
        if(!empty($orgmaindata['nonresidentialtariff'])){
            $commercial_tariff_tmp = $orgmaindata['nonresidentialtariff'];
        }
        //if(!empty($orgmaindata['commercial_tariff'])){
        //    $commercial_tariff_tmp = $orgmaindata['commercial_tariff'];
        //}


        $commercial_tariff = $request->commercial_tariff ? floatval($request->commercial_tariff) : $commercial_tariff_tmp;
        $cost_of_small_system = $request->cost_of_small_system ? floatval($request->cost_of_small_system) : $orgmaindata['system_cost'];
        $system_size_kwp = $request->system_size_kwp ? floatval($request->system_size_kwp) : $orgmaindata['system_size'];
        $test_geopoint = $geopoints->where("id", 19483);
        $pro_geopoints = pro_params($captive_use, $export_tariff, $domestic_tariff, $commercial_tariff, $cost_of_small_system, $system_size_kwp , $geopoints);
        //dd($geopoints->where('id', 17499));
        $prev_inputs = [
            "captive_use" => $captive_use,
            "export_tariff" => $export_tariff,
            "domestic_tariff" => $domestic_tariff,
            "commercial_tariff" => $commercial_tariff,
            "cost_of_small_system" => $cost_of_small_system,
            "system_size_kwp" => $system_size_kwp
        ];
        $orgData = $user->organization->toArray();
         if (empty($orgData['currencysymbol'])) {
             $orgData['currencysymbol'] = "??";
         }

//    dd('View: ', [
//        'geodata' => $pro_geopoints,
//        'account' => $account_name,
//        'orgdata' => $user->organization->toArray(),
//        'region' => $region_name,
//        'cluster' => "",
//        "captive_use" => $captive_use,
//        "export_tariff" => $export_tariff,
//        "prev_inputs" => $prev_inputs,
//        "test_geopoint" => $test_geopoint
//    ], 'Prev input: ', $prev_inputs, 'Org: ', $orgmaindata);
        return view('pages.dashboard-pro', [
            'geodata' => $pro_geopoints,
            'account' => $account_name,
            'orgdata' => $orgData,
            'region' => $region_name,
            'cluster' => "",
            "captive_use" => $captive_use,
            "export_tariff" => $export_tariff,
            "prev_inputs" => $prev_inputs,
            "test_geopoint" => $test_geopoint
        ]);
    }

    public function cluster_pro(Request $request){
        //dd($request);
        $user = auth()->user();
        $cluster_name = $request->cluster;
        $cluster = Cluster::where('user_id', $user->id)->where('name', $cluster_name)->first();
        //temporary fix until cluster-user relationship updated properly
        if ($cluster == null){
            $cluster = $user->clusters->where('name', $cluster_name)->first();
            if($cluster == null) {
                return abort(404);
            }
        }
        $orgData = $user->organization->toArray();
        $currentDBParams = $this->getClusterParams($cluster);

        $geopoints = $cluster->geopoints;
        if($geopoints == null) return abort(404);
        //-----------user input params-------------
        //----laravel blade input seems unable to pass input of type "number" as numeric values----
        //----so manually converting input fields from string to floats in controller, for now-----
        $captive_use = floatval($currentDBParams['captive_use']);
        if(!empty($request->captive_use)){
            $captive_use = floatval($request->captive_use);
        }

        $export_tariff_tmp = 0;
        if(!empty($currentDBParams['export_tariff'])){
            $export_tariff_tmp = $currentDBParams['export_tariff'];
        }
        $export_tariff = $request->export_tariff ? floatval($request->export_tariff) : $export_tariff_tmp;

        //$domestic_tariff may have a different value if account is "PPS"
        if($request->domestic_tariff){
            $domestic_tariff = floatval($request->domestic_tariff);
        } else{
            $domestic_tariff = $currentDBParams['domestic_tariff'];
        }

        $commercial_tariff_tmp = $orgData['nonresidentialtariff'];
        if ($currentDBParams['commercial_tariff'] != '') {
            $commercial_tariff_tmp = $currentDBParams['commercial_tariff'];
        }

        $cost_of_small_system_tmp = $orgData['system_cost'];
        if ($currentDBParams['cost_of_small_system'] != '') {
            $cost_of_small_system_tmp = $currentDBParams['cost_of_small_system'];
        }

        $system_size_kwp_tmp = $orgData['system_size'];
        if ($currentDBParams['system_size_kwp'] != '') {
            $system_size_kwp_tmp = $currentDBParams['system_size_kwp'];
        }

        $commercial_tariff = $request->commercial_tariff ? floatval($request->commercial_tariff) : $commercial_tariff_tmp;
        $cost_of_small_system = $request->cost_of_small_system ? floatval($request->cost_of_small_system) : $cost_of_small_system_tmp;
        $system_size_kwp = $request->system_size_kwp ? floatval($request->system_size_kwp) : $system_size_kwp_tmp;
        $test_geopoint = $geopoints->where("id", 19483);
        $pro_geopoints = pro_params($captive_use, $export_tariff, $domestic_tariff, $commercial_tariff, $cost_of_small_system, $system_size_kwp, $geopoints);

        $prev_inputs = [
            "captive_use" => $captive_use,
            "export_tariff" => $export_tariff,
            "domestic_tariff" => $domestic_tariff,
            "commercial_tariff" => $commercial_tariff,
            "cost_of_small_system" => $cost_of_small_system,
            "system_size_kwp" => $system_size_kwp
        ];
        return view('pages.dashboard-pro', [
            'geodata' => $pro_geopoints,
            'cluster' => $cluster->name,
            'region' => '',
            'account' => '',
            'orgdata' => $orgData,
            "captive_use" => $captive_use,
            "export_tariff" => $export_tariff,
            "prev_inputs" => $prev_inputs,
            "test_geopoint" => $test_geopoint
        ]);
    }

    private function getClusterParams($cluster){
        $firstPoint = $cluster->geopoints->first();

        $currentParams = [
            "captive_use" => $firstPoint->pivot->captive_use,
            "export_tariff" => $firstPoint->pivot->export_tariff,
            "domestic_tariff" => $firstPoint->pivot->domestic_tariff,
            "commercial_tariff" => $firstPoint -> pivot -> commercial_tariff,
            "cost_of_small_system" => $firstPoint->pivot -> system_cost,
            "system_size_kwp" => $firstPoint->pivot->system_size
        ];

        return $currentParams;
    }

    public function cluster($cluster_name) {
        $user = auth()->user();
        $cluster = Cluster::where('user_id', $user->id)->where('name', $cluster_name)->first();
        if ($cluster == null){
            $cluster = $user->clusters->where('name', $cluster_name)->first();
            if($cluster == null) {
                return abort(404);
            }
        }

        $currentDBParams = $this->getClusterParams($cluster);
        $geopoints = pro_params($currentDBParams['captive_use'], $currentDBParams['export_tariff'], $currentDBParams['domestic_tariff'], $currentDBParams['commercial_tariff'], $currentDBParams['cost_of_small_system'], $currentDBParams['system_size_kwp'], $cluster->geopoints);

        return view('pages.dashboard', [
            'geodata' => $geopoints,
            'cluster' => $cluster->name,
            'orgdata' => $user->organization->toArray(),
            'currentDBParams' => $currentDBParams
        ]);
    }

}
