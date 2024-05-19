@extends('Layouts.auth')
@section('content')
    <div class="contact-us section" id="contact">
        <div class="container">
            <div class="contact-us-content">
                <h1 class="text-white mb-5 text-center">Register</h1>
                <form id="contact-form" action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="text" name="name" id="name" placeholder="Your Name..."
                                    required="">
                            </fieldset>
                            <fieldset>
                                <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                    placeholder="Your E-mail..." required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="password" name="password" id="password" placeholder="Your Password..."
                                    autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset class="d-flex justify-content-between">
                                <p class="text-white ms-2">Have Account ? <a href="{{ route('login.index') }}"
                                        class="mt-2 text-white">Login</a>
                                </p>
                                <button type="submit" id="form-submit" class="orange-button">Register</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
