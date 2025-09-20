<?php

namespace App\Http\Controllers\Api\superAdmin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Store;
use App\Models\User;
use App\Models\Client;
use App\Models\Plan;

class DashboardController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $stores = Store::all();
        $stores_count = Store::count();
        $users_count = User::where('email', '!=', 'Support@gmail.com')->count();
        $clients_count = Client::count();
        $user = auth()->user();
        $userRole = $user->getRoleNames()->first();
        $plans_count = Plan::count();

        return response()->json([
            'message' => 'Dashboard Super Admin',
            'user_role' => $userRole,
            'categories' => $categories,
            'stores' => $stores,
            'stores_count' => $stores_count,
            'users_count' => $users_count,
            'clients_count' => $clients_count,
            'plans_count' => $plans_count,
        ]);
    }
}
