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
    <!--my fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <!--my css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/logo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/sass/app.css') }}">
    <title>stmik-amikbandung</title>
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="#"><img class="logo2" src="{{ asset('images/download.png') }}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="row workspace">about</a>
                    <a class="nav-item nav-link" href="#">project</a>

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
            <h1 class="display-4">STMIK AMIK BANDUNG<br> <img class="logo"
                    src="{{ asset('images/download.png') }}">
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
                        <h4>login mahasiswa</h4>
                        <p>khusus mahasiswa</p>
                    </a>
                    <a class="col-lg btn btn-light mr-2 " href=" {{ route('login') }}" class="">
                        <img src="{{ asset('images/teacher.png') }}" alt="BAAK" class="float-left">
                        <h4>login pembimbing</h4>
                        <p>khusus mahasiswa</p>
                    </a>
                    <a class="col-lg btn btn-light mr-2 " href=" {{ route('login') }}" class="">

                        <img src="{{ asset('images/bapsi.png') }}" alt="BAPSI" class="float-left">
                        <h4>login BAPSI</h4>
                        <p>khusus mahasiswa</p </div>
                    </a>
                    <a class="col-lg btn btn-light mr-2 " href=" {{ route('login') }}" class="">

                        <img src="{{ asset('images/keuangan.png') }}" alt="BAPSI" class="float-left">
                        <h4>login BAAK</h4>
                        <p>khusus mahasiswa</p </div>
                    </a>

                </div>
            </div>
        </div>
        {{-- akhir info login --}}
        <div class="row workingspace">
            <div class="col-lg-6">
                <img src="{{ asset('images/stmikamik2.jpg') }}" alt="Workingspace">
            </div>
            <div class="col-lg-5">
                <h3>STMIK <br><span>“AMIK BANDUNG”</h3>
                <p> merupakan perguruan tinggi swasta di bidang ICT yang terus mengikuti
                    perkembangan teknologi terkini dan senantiasa menjaga mutu kompetensi lulusan. Dalam rangka
                    mewujudkan kompetensi lulusan, STMIK “AMIKBANDUNG” mendukung program pemerintah untuk kemandirian di
                    bidang maritim, khususnya sistem navigasi dan teknologi pertahanan. Berkaitan dengan sertifikasi
                    kompetensi, kampus melakukan kerja sama dengan perusahaan-perusahaan atau industri yang
                    menyelenggarakan sertifikasi nasional maupun internasional, antara lain : CISCO, ORACLE, Mikrotik,
                    Seagate, Adobem Intel dan LS Cable.

                    Kampus melakukan kerjasama dengan Telimek LIPI dalam hal penelitian di bidang mekatronika dan IoT,
                    Cyber Security and Defence. Kampus juga bekerja sama dalam bidang teknologi sistem navigasi dan
                    pertahanan dengan PT. Cipta Teknologi Persada. </p>
            </div>
        </div>
    </div>
    {{-- bagian footer --}}
    <!-- Footer -->
    <footer class="page-footer font-small mdb-color lighten-3 pt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-2 col-lg-1 mr-auto my-md-4 my-0 mt-4 mb-1">

                    <!-- Content -->


                    <img class="logo4" src="{{ asset('images/STMIK-AMIKBANDUNG.png') }}">

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">


                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

                    <!-- Contact details -->
                    <h5 class="font-weight-bold text-uppercase mb-4">Address</h5>

                    <ul class="list-unstyled">
                        <li>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                </svg> <a> @stmik-amikbandung.ac.id</a>

                            </p>
                        </li>
                        <li>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-telephone-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                    <path fill-rule="evenodd"
                                        d="M12.5 1a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z" />
                                </svg> <a>0811-2391-136</a>
                            </p>
                        </li>

                        <li>
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                    <path fill-rule="evenodd"
                                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                </svg> <a>jalan jakarta no.29, Bandung</a>
                            </p>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 text-center mx-auto my-4">

                    <!-- Social buttons -->
                    <h5 class="font-weight-bold text-uppercase mb-4">Follow Us</h5>

                    <!-- Facebook -->
                    <a type="button" class="btn-floating btn-tw">
                        <i class="fab fa-facebook-square"> stmikamikbandung</i>
                    </a>
                    <!-- Twitter -->
                    <a type="button" class="btn-floating btn-tw">
                        <i class="fab fa-twitter"> stmikamikbandung</i>
                    </a>
                    <!-- Google +-->
                    <a type="button" class="btn-floating btn-gplus">
                        <i class="fab fa-google-plus-g"> stmikamikbandung</i>
                    </a>
                    <!-- Dribbble -->
                    <a type="button" class="btn-floating btn-dribbble">
                        <i class="fab fa-dribbble"> stmikamikbandung</i>
                    </a>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->

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
