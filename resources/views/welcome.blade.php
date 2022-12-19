<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="/js/sweetalert.min.js"></script>
        <!-- Styles -->



    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if(count($errors)>0)
                <div  class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="content">
                <form action="/getrecap" method="POST">
                    <div class="g-recaptcha" data-sitekey="6LdyHrMdAAAAAK5U2jKzq7E6ze6fNicoOK6DQgXg"></div>
                    @csrf
                    <input type="text" name="tx1">
                    <br/>
                    <input type="submit" value="Submit">
                </form>

            </div>
        </div>
        @include('sweet::alert')
    </body>
</html>
