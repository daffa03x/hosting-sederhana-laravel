@extends('Layouts.auth')
@section('content')
    <div class="contact-us section" id="contact">
        <div class="container">
            <div class="contact-us-content">
                <h1 class="text-white mb-5 text-center">Login</h1>
                <form id="contact-form" action="{{ route('login.post') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
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
                                <p class="text-white ms-2">Dont Have Account ? <a href="{{ route('register.index') }}"
                                        class="mt-2 text-white">Register</a>
                                </p>
                                <button type="submit" id="form-submit" class="orange-button">Login</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
