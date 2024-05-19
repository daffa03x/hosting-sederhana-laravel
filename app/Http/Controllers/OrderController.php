<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Order;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function checkout()
    {
        return view('order.index');
    }

    public function order(Request $request)
    {
        try {
            // Cek apakah pengguna sudah login
            if (Auth::user()) {
                // Buat domain baru
                $domain = Domain::create([
                    'user_id' => Auth::user()->id,
                    'domain' => $request->domain
                ]);
                // Buat pesanan untuk pengguna yang sudah login
                $data = Order::create([
                    'user_id' => Auth::user()->id,
                    'domain_id' => $domain->id,
                    'invoice' => now()->format('YmdHis') . rand(100, 999) . Auth::user()->id,
                    'tahun' => $request->tahun,
                    'total' => $request->total,
                ]);
                // return dd($data);
    
                return redirect($data ? '/invoice/' . $data->id : '/checkout')
                    ->with($data ? 'success' : 'error', $data ? 'Order Berhasil' : 'Order Gagal');
            } else {
                // Buat user baru
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                // Buat domain baru
                $domain = Domain::create([
                    'user_id' => $user->id,
                    'domain' => $request->domain
                ]);
                // Buat pesanan untuk user baru
                $data = Order::create([
                    'user_id' => $user->id,
                    'domain_id' => $domain->id,
                    'invoice' => now()->format('YmdHis') . rand(100, 999) . $user->id,
                    'tahun' => $request->tahun,
                    'total' => $request->total,
                ]);
    
                return redirect($data ? '/invoice/' . $data->id : '/checkout')
                    ->with($data ? 'success' : 'error', $data ? 'Order Berhasil' : 'Order Gagal');
                return dd($data);
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
            // return dd('DIE');
        }
    }
    

    public function invoice($id)
    {
        try {
            $data = DB::table('orders')->select(
                'orders.id',
                'orders.user_id',
                'orders.domain_id',
                'orders.status',
                'orders.invoice',
                'orders.total',
                'users.name',
                'users.email',
                'domains.domain',
            )
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('domains', 'domains.id', '=', 'orders.domain_id')
            ->where('orders.id', $id)->first();
            return view('order.invoice',compact('data'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function pdf_invoice($id)
    {
        try {
            $data = DB::table('orders')->select(
                'orders.id',
                'orders.user_id',
                'orders.domain_id',
                'orders.status',
                'orders.invoice',
                'orders.total',
                'users.name',
                'users.email',
                'domains.domain',
            )
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('domains', 'domains.id', '=', 'orders.domain_id')
            ->where('orders.id', $id)->first();
            $pdf = FacadePdf::loadview('order/pdf_invoice',['data'=>$data]);
            return $pdf->download('invoice.pdf');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
