@extends('layouts.mhsapp')

@section('isi')



<section class="content">
   <div class="container center">
      <!-- Default box -->
      <div class="card">
         <div class="card-header">
            @include('sweetalert::alert')
            <h3 class="card-title text-center" style="font-family: Verdana"> Selamat Datang Di Halaman Sistem Informasi
               Akademik STMIK "AMIKBANDUNG" </h3>
         </div>
      </div>


      <div class="tab-content" id="nav-tabContent">
         <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="card card-primary card-outline">
               <div class="card-body box-profile">
                  <div class="text-left">
                     <div class="card mb-3" style="max-width: 1200px;">
                        <div class="row no-gutters">
                           <div class="col-md-4">
                              <img src="{{URL::asset('/images/info2.png')}}" class="ml-5 mt-2" alt="profile Pic" style="max-width: 250px">
                           </div>
                           <div class="col-md-8">
                              <div class="card-body">
                                 <h5 class="card-title">Langkah-langkah Perwalian : </h5>
                                 <p class="card-text">
                                 <ol>
                                    <li> Klik Pada Halam Pengisian Rencana Studi </li>
                                    <li> Pilih Mata Kuliah Yang Hendak Di Kontrak </li>
                                    <li> Upload Bukti Pembayaran / Transfer Pada Kolom Yang Tersedia, Jika Dirasa Sudah Benar Klik Submit </li>
                                    <li> Tunggu sampai Bagian Keuangan Memverifikasi Bukti Pembayaran Anda </li>
                                    <li> Selanjutnya Dosen Wali Akan Menyetuji Kontrak Mata Kuliah Anda </li>
                                    <li> Selesai.</li>
                                    <small class="text-muted">*Anda Dapat Melihat Status Kontrak Mata Kuliah Pada Halaman Hasil Input Perwalian</small>
                                 </ol>
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div><br>
                     <div class="card mb-3" style="max-width: 1200px;">
                        <div class="row no-gutters">
                           <div class="col-md-4">
                              <img src="{{URL::asset('/images/info2.png')}}" class="ml-5 mt-2" alt="profile Pic" style="max-width: 250px">
                           </div>
                           <div class="col-md-8">
                              <div class="card-body">
                                 <h5 class="card-title"> Segera Lengkapi Biodata ! </h5>
                                 <p class="card-text">
                                 <ol>
                                    <li> Masuk ke halaman Profile lalu klik Biodata   </li>
                                    <li> Isi data sesuai pada kolom yang tersedia <small class="text-muted">*Kosongkan yang tidak perlu </small> </li>
                                    <li> Setelah data yang di-input dirasa sudah benar </li>
                                    <li> Langkah selanjutnya klik button simpan pada bagian bawah form </li>
                                    <li> Apabila muncul notifikasi "Biodata Berhasil Diupdate" Maka data berhasil disimpan </li>
                                    <li> Jika ada perubahan data, Anda bisa klik button update untuk mengganti data yang salah</li>
                                    <small class="text-muted">*Data yang diisi harus merupakan data yang valid !</small>
                                 </ol>
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


</section>
@endsection
</body>
<script>
   var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
triggerTabList.forEach(function (triggerEl) {
 var tabTrigger = new bootstrap.Tab(triggerEl)

 triggerEl.addEventListener('click', function (event) {
   event.preventDefault()
   tabTrigger.show()
 })
})
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
   integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
   integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

</html>