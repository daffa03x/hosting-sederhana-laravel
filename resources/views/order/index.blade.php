@extends('layouts.main')

@section('content')
    <div class="contact-us section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 align-self-center">
                </div>
                <div class="col-lg-11">
                    <div class="contact-us-content">
                        <h1 class="text-white mb-5 text-center">Order</h1>
                        <form action="{{ route('order.post') }}" method="POST">
                            @csrf
                            <input type="hidden" id="domainInfo" name="domain">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div id="domainInfoText"></div>
                                </div>
                                <div class="col-lg-9">
                                    <select class="form-select" aria-label="Default select example" id="duration"
                                        name="tahun">
                                        <option value="1" selected>1 Tahun</option>
                                        <option value="2">2 Tahun</option>
                                        <option value="3">3 Tahun</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="d-flex justify-content-end">
                                    <h4 class="text-white mr-2">Total : </h4>
                                    <h4 class="text-white" id="total">Rp.100.000</h4>
                                    <input type="hidden" id="totalVal" name="total" value="100000">
                                </div>
                            </div>
                            @if (auth()->user())
                                <h4 class="text-white">Nama : {{ auth()->user()->name }}</h4>
                                <h4 class="text-white">Email : {{ auth()->user()->email }}</h4>
                            @else
                                <div class="mb-3">
                                    <label for="name" class="form-label text-white">Nama</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                        name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label text-white">Email address</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                        name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label text-white">Password</label>
                                    <input type="password" class="form-control" id="password" aria-describedby="emailHelp"
                                        name="password" required>
                                </div>
                                <p class="text-white">Atau Login <a href="{{ route('login.index') }}">Disini</a></p>
                            @endif
                            <div class="d-flex justify-content-start mt-5">
                                <button type="submit" class="btn btn-light">Checkout</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil data domainResponse dari local storage
            const domainResponse = JSON.parse(localStorage.getItem('domainResponse'));

            // Cek apakah data tersedia di local storage
            if (domainResponse) {
                // Menampilkan informasi domain
                document.getElementById('domainInfo').value = domainResponse.domain;
                document.getElementById('domainInfoText').innerHTML =
                    `<h4 class="text-white">${domainResponse.domain}</h4>`;
            } else {
                // Jika data tidak tersedia di local storage
                document.getElementById('domainInfo').value = 'Data not available';
                document.getElementById('domainInfoText').innerHTML =
                    '<p class="text-white">Data not available</p>';
            }

            // Event listener untuk menghitung total saat opsi tahun berubah
            document.getElementById('duration').addEventListener('change', function() {
                const selectedDuration = parseInt(this.value);
                let total = 100000; // Total default

                // Hitung total berdasarkan opsi yang dipilih
                if (selectedDuration === 1) {
                    total = 100000; // Total jika opsi 1 tahun
                } else if (selectedDuration === 2) {
                    total = 200000; // Total jika opsi 2 tahun
                } else if (selectedDuration === 3) {
                    total = 300000; // Total jika opsi 3 tahun
                }

                // Update tampilan total
                document.getElementById('total').innerText = 'Rp.' + total.toLocaleString(
                    'id-ID'); // Format angka ke dalam string dengan pemisah ribuan
                document.getElementById('totalVal').value = total;
            });
        });
    </script>
@endsection
