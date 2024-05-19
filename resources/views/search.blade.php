@extends('layouts.main')

@section('content')
    <div class="contact-us section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6  align-self-center">
                    <div class="section-heading">
                        <h6>Service</h6>
                        <h2>Domain</h2>
                        <div class="special-offer">
                            <span class="offer">off<br><em>50%</em></span>
                            <h6>Valide: <em>24 April 2036</em></h6>
                            <h4>Special Offer <em>50%</em> OFF!</h4>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-us-content">
                        <form id="contact-form" action="{{ route('search.domain') }}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input type="text" name="domain" id="domain" placeholder="Your Domain"
                                            autocomplete="on" required>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset class="d-flex justify-content-end">
                                        <button type="submit" id="form-submit" class="orange-button">Cari</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                        <div>
                            @if ($response['result'] == 'error')
                                <h2 class="text-center pt-5 text-white">Oopss... Domain Not Valid</h2>
                            @else
                                @if ($response['status'] == 'available')
                                    <h2 class="text-center pt-5 text-white">{{ $response['status'] }}</h2>
                                    <fieldset class="d-flex justify-content-center py-3">
                                        <a href="{{ url('/checkout') }}" class="btn btn-primary">Pesan</a>
                                    </fieldset>
                                @else
                                    <h2 class="text-center pt-5 text-white">Oopss... Domain is {{ $response['status'] }}
                                    </h2>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($response['status'] == 'available')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const domainResponse = {
                    domain: @json($domain),
                    userName: @json(auth()->check() ? auth()->user()->name : null)
                };

                // Simpan domainResponse ke local storage
                localStorage.setItem('domainResponse', JSON.stringify(domainResponse));
            });
        </script>
    @endif
@endsection
