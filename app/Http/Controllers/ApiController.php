<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
class ApiController extends Controller
{
    public function index(Request $request)
    {
    	return Order::all();
    }
}
