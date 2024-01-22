<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menejement data carfix</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('Limitless_2_3/Documentation/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('Limitless_2_3/Documentation/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('Limitless_2_3/Documentation/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('Limitless_2_3/Documentation/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('Limitless_2_3/Documentation/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('Limitless_2_3/Documentation/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('Limitless_2_3/Documentation/assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('Limitless_2_3/Documentation/assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('Limitless_2_3/Documentation/assets/js/plugins/prism.min.js')}}"></script>
    <script src="{{asset('Limitless_2_3/Documentation/assets/js/plugins/sticky.min.js')}}"></script>

    <script src="{{asset('Limitless_2_3/Documentation/assets/js/main/app.js')}}"></script>
    <script src="{{asset('Limitless_2_3/Documentation/assets/js/pages/components_scrollspy.js')}}"></script>
      <link rel="shortcut icon" href="{{ asset('favicon.ico ') }}" type="image/x-icon">

</head>

<body data-spy="scroll" data-target=".sidebar-component-right" style="background-color: rgb(0, 5, 31)">
    @include('layout.navbar')
    @include('layout.sidebar')
    <div class="content-wrapper">
        @include('layout.header')
        <div class="content pt-0">

            <div class="d-flex align-items-start flex-column flex-md-row">

                <div class="order-2 order-md-1">


                    @include('layout.content')
                    @yield('index')



                    <div class="navbar navbar-expand-lg navbar-light">
                        <div class="text-center d-lg-none w-100">
                            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                                <i class="icon-unfold mr-2"></i>
                                Footer
                            </button>
                        </div>

                        <div class="navbar-collapse collapse" id="navbar-footer">
                            <span class="navbar-text">
                                &copy;2024. <a href="#">Mohon maaf ini sekarang sudah punya @mycodingan</a>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
            <script>
                jQuery.ajax({
                    url: "{{ url('/submit_prescription') }}"
                    , type: 'GET'
                    , data: {
                        name: name
                        , age: age
                        , mobile_no: mobile_no
                    }
                    , success: function(msg) {

                        if (msg > 0) {

                            window.location.href = "{ url('/show-all-prescription') }";

                            {
                                {
                                    route('/show-all-prescription')
                                }
                            }

                        }
                    }
                });

            </script>
</body>
</html>
