<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        try {
            return view('index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function searchDomain(Request $request)
    {
        try {
            $domain = $request->domain;
            $response = Http::get('https://portal.qwords.com/apitest/whois.php?domain='.$domain);
            return view('search', compact('response','domain'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
