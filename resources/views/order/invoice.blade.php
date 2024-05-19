@extends('layouts.main')

@section('content')
    <div class="contact-us section" id="contact">
        <div class="container">
            <div class="contact-us-content">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="text-white mb-3">No Invoice : {{ $data->invoice }}</h6>
                        <h6 class="text-white">Nama : {{ $data->name }}</h6>
                        <h6 class="text-white mb-3">Email : {{ $data->email }}</h6>
                    </div>
                    <div>
                        <h3 class="text-white">{{ $data->status }}</h3>
                    </div>
                </div>
                <table class="table text-white">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Pembelian Domain {{ $data->domain }}</td>
                            <td>Rp.{{ $data->total }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2" style="text-align: right;">Total</th>
                            <th style="text-align: right;">{{ $data->total }}</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="text-center">
                    <h6 class="text-white mt-5 mb-2">Silahkan Bayar di no rekening berikut ini : </h6>
                    <h6 class="text-white my-2">123456789101112</h6>
                </div>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-primary mt-3" href="{{ route('pdf_invoice', $data->id) }}">Cetak</a>
                </div>
            </div>
        </div>
    </div>
@endsection
