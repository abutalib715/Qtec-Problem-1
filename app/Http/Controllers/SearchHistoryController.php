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
        $search_histories = SearchHistory::with('user');

        if(!empty($request->keywords)){
            $search_histories = $search_histories->whereIn('keyword', $request->keywords);
        }
        if(!empty($request->users)){
            $search_histories = $search_histories->whereIn('user_id', $request->users);
        }
        if(!empty($request->ip_addresses)){
            $search_histories = $search_histories->whereIn('ip_address', $request->ip_addresses);
        }
        if($request->start_date != ''){
            $search_histories = $search_histories->whereDate('created_at','>=', $request->start_date);
        }
        if($request->end_date != ''){
            $search_histories = $search_histories->whereDate('created_at','<=', $request->end_date);
        }
        if($request->time_range != ''){
            if($request->time_range == 'yesterday') {
                $search_histories = $search_histories->whereDate('created_at', Carbon::yesterday()->toDateString());
            } elseif($request->time_range == 'last_week') {
                $search_histories = $search_histories
                    ->whereBetween('created_at', [
                        Carbon::now()->subWeek()->startOfWeek()->toDateTimeString(),
                        Carbon::now()->subWeek()->endOfWeek()->toDateTimeString()
                    ]);
            } elseif($request->time_range == 'last_month') {
                $search_histories = $search_histories
                    ->whereBetween('created_at', [
                        new Carbon('first day of last month'),
                        new Carbon('last day of last month')
                    ]);
            }
        }
        $search_histories = $search_histories->get();

        return response()->json(['data' => $search_histories]);
    }

    function initializeFiltersData(){
        $keywords = SearchHistory::select('keyword',DB::raw('COUNT(keyword) as count'))->groupBy('keyword')->get();
        $users = User::all();
        $ip_addresses = SearchHistory::select('ip_address')->groupBy('ip_address')->get();

        return response()->json(['keywords' => $keywords, 'users' => $users, 'ip_addresses' => $ip_addresses]);
    }
}
