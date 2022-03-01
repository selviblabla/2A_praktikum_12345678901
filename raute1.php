Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello',function(){
    return 'Hello World';
});
Route::get('/belajar',function(){
    echo '<h1>Hello World</h1>';
    echo '<p>Sedang belajar Laravel</p>';
});
Route::get('/mahasiswa/fasilkom/coba',function(){
    echo '<h2 style="text-align: center"><u>Welcome Profil Coba</u></h2>';
});

//router parameter
Route::get('mahasiswa/{nama}',function($nama){
    return "Tampilan data mahasiswa bernama $nama";
});

//route parameter dengan 2 parameter
Route::get('/stok_barang/{jenis}/{merek}',function($jenis,$merek){
    return "Cek sisa stok untuk $jenis $merek";
});
Route ::get('/stok_barang/{jenis}/{merek}', function($a,$b){
    echo "Cek sisa stok untuk $a $b";
});

//route dengan optional parameter
Route::get('/stok_barang/{jenis?}/{merek?}',function($a='smartphone',$b='samsung'){
return "Cek sisa stok untuk $a $b";
});

//route parameter dengan regular expression
Route::get('/user/{id}',function($id){
    return "Tampilkan user dengan id = $id";
});
Route::get('/user/{id}',function($id){
    return "Tampilkan user dengan id=$id";
})->where('id','[0-9]+');
Route::get('/user/{id}',function($id){
    return "Tampilkan user dengan id =$id";
})->where('id','[A-Z]{2}[0-9]+');

//route redirect
Route::get('/hubungi-kami',function(){
    return '<h1>Hubungi Kami</h1>';
});
Route::redirect('/contact-us', '/hubungi-kami');

//Router group 
Route::get('/admin/mahasiswa',function(){
    return "<h1>Daftar Mahasiswa</h1>";
});
Route::get('/admin/dosen',function(){
    return "<h1> Daftar Dosen</h1>";
});
Route::get('/admin/karyawan',function(){
    return "<h1> Karyawan</h1>";
});
Route::prefix('/admin')->group(function(){
    Route::get('/mahasiswa',function(){
        echo "<h1>Daftar Mahasiswa</h1>";
    });
    Route::get('/dosen',function(){
        echo "<h1>Daftar Dosen</h1>";
    });
    Route::get('/karyawan',function(){
        echo "<h1>Daftar Karyawan</h1>";
    });
});

//route fallback
Route::fallback(function(){
    return "Maaf,Alamat tidak ditemukan";
});

//route Priority