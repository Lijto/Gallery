<?php

namespace App\api\Http\Controllers;

use Illuminate\Routing\Controller;

class StaticPageController extends Controller
{
        public function documentation()
        {
            return view('documentation');
        }
}
