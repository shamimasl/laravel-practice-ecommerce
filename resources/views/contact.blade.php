@extends('layouts.tohoney')

@section('content1')
    <div class="contact-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <div class="contact-form form-style">
                        <div class="cf-msg"></div>
                        <form action="{{ url('/send/message') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <input type="text" placeholder="Name" id="name" name="name">
                                    @error('name')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12  col-sm-6">
                                    <input type="text" placeholder="Email" id="email" name="email">
                                    @error('email')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="text" placeholder="Subject" id="subject" name="subject">
                                    @error('subject')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <textarea class="contact-textarea" placeholder="Message" id="message" name="message"></textarea>
                                    @error('message')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submit">SEND MESSAGE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="contact-wrap">
                        <ul>
                            <li>
                                <i class="fa fa-home"></i> Address:
                                <p>{{ $info->address }}</p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i> Email address:
                                <p>
                                    <span>{{ $info->email }}</span>

                                </p>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> phone number:
                                <p>
                                    <span>{{ $info->tel }}</span>

                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
