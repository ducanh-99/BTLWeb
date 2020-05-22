<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function accessQuantity()
    {
        if (Session::get('id_admin')) {
        } else {
            return redirect('login');
        }
    }

    public function revenue()
    {
        if (Session::get('id_admin')) {
        } else {
            return redirect('login');
        }
    }
}
