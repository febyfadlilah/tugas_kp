<?php
require('./componen/header_user.php');
?>
<section style="background-image : url(assets/img/bg\ tanpa\ kop.jpg) ;">
    <div class="container px-4 py-5">
        <div class="row py-5">
                <form class="col-md-9 m-auto" method="post" role="form">
                    <div class="row">
                        <div class="mb-3">
                            <label class="control-label text-white"><b>Nama</b></label>
                            <select name="gender" class="form-control">
                                <option value="" disabled selected>-- Pilih Jenis Kehadiran --</option>
                                <option value="L">Hadir</option>
                                <option value="P" >Izin</option>
                                <option value="P" >Sakit</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                                <label for="inputname" class="text-white">Kritik</label>
                                <input type="text" class="form-control mt-1" id="name" name="namE" placeholder="Kritik">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="inputemail" class="text-white">Saran</label>
                                <input type="text" class="form-control mt-1" id="email" name="email" placeholder="Saran">
                            </div>
                        <div class="col text-end mt-2">
                            <button type="submit" class="btn btn-outline-light btn-lg px-3">Kumpulkan</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</section>

<?php
require('./componen/footer.php');
?>