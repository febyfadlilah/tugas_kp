<?php
require('./componen/header.php');
?>

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/LOGO.png" alt="Almaas">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Almaas</b> Berlian Hati</h1>
                                <h3 class="h2">Almaas Griya Insani Muslim</h3>
                                <p>
                                    "Hai orang-orang beriman, janganlah hartamu dan anak-anakmu melalaikan kamu dari mengingat Allah, barangsiapa yang berbuat demikian maka mereka itulah orang-orang yang merugi" (QS. Al-Munafiqun : 9) 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/tauhid.png" alt="Tauhid">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Almaas Bertauhid</h1>
                                <h3 class="h2">Tiada Tuhan Selain Allah</h3>
                                <p>
                                "Maka barangsiapa yang mengharapkan perjumpaan dengan Rabbnya hendaklah dia beramal shalih dan tidak mempersekutukan sesuatu apapun dengan-Nya dalam beribadah kepada-Nya” (QS. Al Kahfi: 110)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/mengaji.jpg" alt="Ngaji">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Griya Insani Muslim</h1>
                                <h3 class="h2">Sinergi Bersama Umat</h3>
                                <p>
                                    “Siapa saja membaca satu huruf dari Kitabullah (Alquran) maka dia akan mendapat satu kebaikan. Sedangkan satu kebaikan dilipatkan kepada sepuluh semisalnya. Aku tidak mengatakan alif lâm mîm satu huruf. Akan tetapi, alif satu huruf, lâm satu huruf, dan mîm satu huruf.” (HR At-Tirmidzi)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <div class="navbarbaru">
    <section class="container py-5">
        <div class="row text-center pt-3 text-white">
            <div class="col-lg-6 m-auto">
                <h1 class="heading h1">Program Almaas</h1>
                <p class="isi">
                    Berbagi dan Belajar
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/sosial.png" class="icon rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3 text-white">Sosial</h5>
                <p class="text-center"><a class="btn btn-warning">Next</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/daftar.png" class="icon rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3 text-white">Pendaftaran</h2>
                <p class="text-center"><div class="text-center">
                    <a class="btn btn-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Daftar
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="pendaftaran_tamu.php">Tamu</a></li>
                        <li><a class="dropdown-item" href="new_jamaah.php">Jamaah</a></li>
                    </ul></p>
                </div>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/login.png" class="icon rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3 text-white">Log In Akun</h2>
                <p class="text-center"><div class="text-center">
                    <a class="btn btn-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Log In
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="login_jamaah.php">Jamaah</a></li>
                        <li><a class="dropdown-item" href="login_pengajar.php">Pengajar</a></li>
                        <li><a class="dropdown-item" href="login.php">Admin</a></li>
                    </ul></p>
                </div>
            </div>
            </div>
        </div>
    </section>
    </div>
    <!-- End Categories of The Month -->
    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="heading h1">Syarat Pendaftaran Bimbingan Mengaji Privat</h1>
                </div>
            </div>
            <div class="isi row">
            <h5>Berikut adalah syarat pendaftaran jamaah baru yang harus dipenuhi :</h5>
                <ol>
                    <li  class="isi">Mengisi form pendaftaran</li>
                    <li  class="isi">Menyerahkan dokumen berupa :</li>
                        <ol>
                            <li class="isi">Fotocopy KTP 1 Lembar</li>
                            <li class="isi">Fotocopy KK 1 Lembar</li>
                            <li class="isi">Pas foto background biru ukuran 3x4 1 Lembar</li>
                            <li class="isi">Soft file foto (jpg/jpeg)</li>
                        </ol>
                    <li class="isi">Membayar biaya pendaftaran sebesar Rp 150.000</li>
                    <li class="isi">Infaq per periode (3 bulan)</li>
                        <ol>
                            <li class="isi">Rp 300.000</li>
                            <li class="isi">Rp 400.000</li>
                            Pilih salah satu infaq terbaikmu
                        </ol>
                    <li class="isi">Infaq periode dibayar diawal pendaftaran atau boleh dibayar 2x pembayaran</li>
                    <li class="isi">Pembayaran bisa tunai (datang ke kantor) atau transfer ke rekening BCA 1014433433 a.n. Antok Koesharjanto (direktur ALMAAS)</li>
                </ol>

            </div>
        </div>
    </section>
    <!-- End Featured Product -->


<?php
require('./componen/footer.php')
?>