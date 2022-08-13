<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9aacc24a56.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--my fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <!--my css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/logo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/sass/app.css') }}">
    <link rel="icon" href="{{ url('public/favicon.icon') }}">
    <title>Perwalian STMIK "AMIKBANDUNG"</title>
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                  
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        @else
                            <a class=" tombol" href="{{ route('login') }}" class=""></a>

                            @if (Route::has('register'))
                            @endif
                        @endauth
                    @endif
                    </a>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Perwalian Online<br>STMIK "AMIKBANDUNG" <br>
            </div>
            <div class="gambaramik">
                <img alt="STMIK AMIKBANDUNG" width="300px" height="280px" src="https://lms.stmik-amikbandung.ac.id/accounts/1/files/434/download?verifier=H3By4R7ivUgLr0LQZ7CayA9qhBJtnhCOfqnyI8Yl">
        </div>
    </div>
    {{-- akhir background --}}
    <!--container-->
    <div class="container">

        {{-- info panel --}}
        <div class="row justify-content-center">
            <div class="info-panel col-12 ">
                <div class="row">

                    <a class="col-lg btn btn-light mr-2 " href=" {{ route('login') }}" class="">
                        <img src="{{ asset('images/employee.png') }}" alt="mahasiswa" class="float-left">
                        <h4>Login Mahasiswa</h4>
                        <p>Khusus Mahasiswa</p>
                    </a>
                    <a class="col-lg btn btn-light mr-2 " href=" {{ route('login') }}" class="">
                        <img src="{{ asset('images/teacher.png') }}" alt="BAAK" class="float-left">
                        <h4>Login Dosen </h4>
                        <p>Khusus Dosen</p>
                    </a>
                    <a class="col-lg btn btn-light mr-2 " href=" {{ route('login') }}" class="">

                        <img src="{{ asset('images/keuangan.png') }}" alt="BAPSI" class="float-left">
                        <h4>login Admin</h4>
                        <p>Khusus Admin</p>
                    </a>

                </div>
            </div>
        </div>
        {{-- akhir info login --}}
        <div class="row workingspace">
         
            </div>
        </div>
    </div>
    {{-- bagian footer --}}
    <!-- Footer -->
    <footer>
        <div class="container-fluid mt-5">
            <div class=" bg-white mx-5">
                <div class="row mb-4">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="footer-text pull-left">
                            <div class="d-flex">
                                <h2 class="font-weight-lighter-bold mr-2 px-3" style="border-radius:10px; color:white; background-color:#5f94e4">STMIK "AMIKBANDUNG"</h1>
                                
                            </div>
                            <p style="padding-left: 5px;"><a href="https://g.page/AMIKBANDUNG?share" style="color:gray">Jl. Jakarta No.28 Bandung</p></a>
                            <div class="social mt-2 mb-3">
                                <i class="fa fa-instagram fa-lg"><a href="https://www.instagram.com/infostmik_amikbdg/" style="color: gray"> infostmik_amikbdg </i> </a>
                                <i class="fa fa-youtube fa-lg"> <a href="https://www.youtube.com/c/STMIKAMIKBANDUNG"style="color: gray"> STMIK AMIKBANDUNG </i></a> 
                                <i class="fa fa-whatsapp fa-lg"><a href="https://api.whatsapp.com/send/?phone=628112391136&text&type=phone_number&app_absent=0"style="color: gray"> 08112391136 </i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2"></div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <h5 class="heading"></h5>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <h5 class="heading"></h5>
                        <ul class="card-text">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <h5 class="heading">Link Terkait</h5>
                        <ul class="card-text">
                            <li>Website Kampus</li>
                            <li>Akademik</li>
                            <li>Kemahasiswaan</li>
                            <li>E-Learning</li>
                        </ul>
                    </div>
                </div>
                <div class="divider mb-4"> </div>
                <div class="row" style="font-size:10px;">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="pull-left">
                            <p><i class="fa fa-copyright"></i> 2022 STMIK "AMIKBANDUNG". All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="pull-right mr-4 d-flex policy">
                            <div>Terms of Use</div>
                            <div>Privacy Policy</div>
                            <div>Cookie Policy</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </footer>
    <!-- Footer -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src=" https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js "
        integrity=" sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin=" anonymous ">
    </script>
    <script src=" https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js "
        integrity=" sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/ " crossorigin=" anonymous ">
    </script>

</body>

</html>
