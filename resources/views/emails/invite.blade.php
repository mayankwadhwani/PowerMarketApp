<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: Open Sans, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;

            margin: 0;

            text-align: left;

            color: #525f7f;
            background-color: #f8f9fe;
        }

        .container {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            padding-right: 15px;
            padding-left: 15px;
        }

        @media (min-width: 576px) {
            .container {
                max-width: 540px;
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 720px;
            }
        }

        @media (min-width: 992px) {
            .container {
                max-width: 960px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }

        .bg-default {
            background-color: #172b4d !important;
        }

        .header {
            min-height: 50vh;
        }

        body {
            min-height: 100vh;
        }

        img {
            height: 10vh;
        }

        .invitation {
            line-height: 2
        }

        .company-info {
            padding-top: 200px;
        }

        .main-card {
            max-width: 60%;
            margin-top: -20rem;
        }

        .header {
            position: relative;
        }

        .bg-gradient-primary {
            background: linear-gradient(87deg, #00021E 0, #191B2E 100%) !important;
        }

        .pt-5,
        .py-5 {
            padding-top: 3rem !important;
        }

        .pb-5,
        .py-5 {
            padding-bottom: 3rem !important;
        }

        .pl-3,
        .px-3 {
            padding-left: 1rem !important;
        }

        .pr-3,
        .px-3 {
            padding-right: 1rem !important;
        }

        .row {
            display: flex;

            margin-right: -15px;
            margin-left: -15px;

            flex-wrap: wrap;
        }

        .justify-content-center {
            justify-content: center !important;
        }

        .rounded-circle,
        .avatar.rounded-circle img {
            border-radius: 50% !important;
        }

        .border-secondary {
            border-color: #f7fafc !important;
        }

        .mt--8,
        .my--8 {
            margin-top: -8rem !important;
        }

        .mb-0,
        .my-0 {
            margin-bottom: 0 !important;
        }

        .col-12 {
            max-width: 100%;

            flex: 0 0 100%;
        }

        .col-12 {
            position: relative;

            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .card {
            position: relative;

            display: flex;
            flex-direction: column;

            min-width: 0;

            word-wrap: break-word;

            border: 1px solid rgba(0, 0, 0, .05);
            border-radius: .375rem;
            background-color: #fff;
            background-clip: border-box;
        }

        .card-header:first-child {
            border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;
        }

        .card-header {
            margin-bottom: 0;
            padding: 1.25rem 1.5rem;

            border-bottom: 1px solid rgba(0, 0, 0, .05);
            background-color: #fff;
        }

        .bg-transparent {
            background-color: transparent !important;
        }

        .card-body {
            padding: 1.5rem;

            flex: 1 1 auto;
        }

        .text-dark {
            color: #212529 !important;
        }

        .text-white {
            color: #fff !important;
        }

        .text-center {
            text-align: center !important;
        }

        .btn {
            font-size: .875rem;

            position: relative;

            transition: all .15s ease;
            letter-spacing: .025em;
            text-transform: none;

            will-change: transform;
        }

        .btn {
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.5;

            display: inline-block;

            padding: .625rem 1.25rem;

            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;

            border: 1px solid transparent;
            border-radius: .25rem;
        }

        a {
            text-decoration: none;

            color: #5e72e4;
            background-color: transparent;

            -webkit-text-decoration-skip: objects;
        }

        a:hover {
            text-decoration: none;

            color: #233dd2;
        }

        .btn-lg,
        .btn-group-lg>.btn {
            font-size: 1.25rem;
            line-height: 1.5;

            padding: .875rem 1rem;

            border-radius: .4375rem;
        }

        .btn:hover {
            transform: translateY(-1px);

            box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
        }

        .btn-primary {
            color: #fff;
            border-color: #5e72e4;
            background-color: #5e72e4;
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
        }

        .btn-primary:hover {
            color: #fff;
            border-color: #5e72e4;
            background-color: #5e72e4;
        }


        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6 {
            font-family: inherit;
            font-weight: 600;
            line-height: 1.5;

            margin-bottom: .5rem;

            color: #32325d;
        }

        h1,
        .h1 {
            font-size: 1.625rem;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
            margin-bottom: .5rem;
        }

        b,
        strong {
            font-weight: bolder;
        }
    </style>
</head>

<body class="bg-default">
    <div class="header bg-gradient-primary py-5">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <a href="{{ route('register') }}">
                    <img src="{{ asset('argon') }}/img/theme/powermarket-logo.png" class="rounded-circle border-secondary">
                </a>
            </div>
        </div>
    </div>

    <div class="container mt--8 pb-5">
        <div class="container pb-5 main-card">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card mb-5">
                        <div class="card-header bg-transparent">
                            <h1 class="text-dark text-center mb-0">Hey there!</h1>
                        </div>
                        <div class="card-body pt-5">
                            <div class="row justify-content-center">
                                <h1 class="invitation text-dark text-center">
                                    <b>{{$user_name ?? 'Someone'}}</b> has invited you to his<br>
                                    organization <b>{{$organization ?? 'Powermarket'}}</b> on<br>
                                    PowerMarket.
                                </h1>
                            </div>
                            <div class="row justify-content-center pt-5">
                                <a href="{{$link}}" class="btn btn-primary btn-lg">
                                    <h1 class="text-white mb-0 pr-3 pl-3"><b>Accept Invite</b></h1>
                                </a>
                            </div>
                            <div class="row justify-content-center company-info">
                                <h1 class="text-dark text-center">
                                    PowerMarket<br>
                                    Software for Solar Analytics<br>
                                    2021 &#169; PowerMarket
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>