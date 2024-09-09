<?php

use App\Models\Branch;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Machine;
use App\Models\Role;
use App\Models\Style;
use Magarrent\LaravelCurrencyFormatter\Facades\Currency;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

function formatCurrency($amount){
    $user = User::find(auth()->user()->user_account_id);
    $business_currency = $user->app_settings->business_currency ?: "NGN";
    
    if($business_currency == 'GHS'){
        return 'GHc '.number_format($amount,2,".",",");
    }
    return Currency::currency($business_currency)->format($amount);
}

function getModelList($model){
    $model_list = null;
    if($model == 'roles'){
        $model_list = Role::all();
    }
    if($model == 'branches'){
        $model_list = Branch::all();
    }
    if($model == 'customers'){
        $model_list = Customer::all();
    }
    if($model == 'styles'){
        $model_list = Style::all();
    }
    if($model == 'machines'){
        $model_list = Machine::where('branch_id',auth()->user()->branch_id)->get();
    }
    
    return $model_list;
}

if (! function_exists('divnum')) {

    function divnum($numerator, $denominator)
    {
        return $denominator == 0 ? 0 : ($numerator / $denominator);
    }

}

function paginate($items, $perPage = 5, $page = null, $options = [])
{
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
}

function removeSpaces($inputString) {
    return str_replace(' ', '', $inputString);
}

