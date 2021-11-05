<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style2.css') }}" />
    <title>Document</title>

</head>
<style>
</style>

<body>


    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="shadow-sm">
            <div class="header">
                <!-- <p>HCD Application</p> -->
                <p class=" profile-header shadow">
                    <!-- i class="fa fa-user-circle" aria-hidden="true"></i> -->
                    <!-- {{Auth::user()->first_name}} {{Auth::user()->last_name}} -->
                    HCD Application
                </p>
            </div>




            <div class="list-group">

                <a href="/profile" class="list-rute "> <i class="fa fa-user fas" aria-hidden="true"></i>
                    Profile</a>
                <a href="/ask_leave_page" class="list-rute "> <i class="fa fa-tasks fas" aria-hidden="true"></i>
                    Ask Leave</a>
                <a href="#about" class="list-rute "><i class="fa fa-cog fas" aria-hidden="true"></i>
                    Setelan</a>

            </div>




        </nav>

        <!-- Page Content  -->
        <div id="content">


            @if ($message = Session::get('success_login'))
            <div class="alert alert-primary alert-block text-center">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif


            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <button type="button" id="sidebarCollapse" class="btn btn-outline-primary shadow-none">
                        <i class="fa fa-align-left" aria-hidden="true"></i>
                        <h5 class="d-inline"> @yield('title')</h5>
                    </button>
                    <ul class="nav navbar-nav ml-auto" style="align-items: center;color:#2B4F5F">
                        <li class="mr-2"><i class="fa fa-user-circle fa-lg d-inline" aria-hidden="true"></i>
                            {{Auth::user()->first_name}} {{Auth::user()->last_name}}</li>
                        <li> <a href="{{ route('logout') }}" class="btn btn-danger  "><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>

                    </ul>
                </div>

            </nav>

            <div class="div">
                @yield('content')
            </div>

        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });

        $(function() {
            $("#fileupload").change(function(event) {
                var x = URL.createObjectURL(event.target.files[0]);
                $("#upload-img").attr("src", x);
                // console.log(event);
            })
        })

        $(document).ready(function() {
            $("#myModal").modal('show');
        });
    </script>

</body>

</html>