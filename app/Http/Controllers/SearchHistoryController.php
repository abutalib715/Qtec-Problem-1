<?php

namespace App\Http\Controllers;

use App\Models\SearchHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchHistoryController extends Controller
{
    public function index(Request $request)
    {
    }

    function initializeFiltersData(){
        $keywords = SearchHistory::select('keyword',DB::raw('COUNT(keyword) as count'))->groupBy('keyword')->get();
        $users = User::all();
        $ip_addresses = SearchHistory::select('ip_address')->groupBy('ip_address')->get();


        return response()->json(['keywords' => $keywords, 'users' => $users, 'ip_addresses' => $ip_addresses]);
    }
}
