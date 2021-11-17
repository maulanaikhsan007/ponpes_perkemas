<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\BiodataSiswa;
use App\Models\Kelas;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
     use RegistersUsers;

    public function showRegistrationForm()
    {
    	$kelas = Kelas::all();
        return view('auth.register',compact('kelas'));
    }
    protected function create(array $data)
    {
    	$request = request();
    	$file = $request->file('foto');
 
	$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
	$tujuan_upload = 'siswa';
	$file->move($tujuan_upload,$nama_file);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 'siswa',
            'password' => Hash::make($data['password']),
        ]);
        $insertedId = $user->id;
       
         BiodataSiswa::create([
            'nama_siswa' => $data['name'],
            'nama_samaran_siswa' => $data['nama_samaran_siswa'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'asal_sekolah' => $data['asal_sekolah'],
            'nama_ayah' => $data['nama_ayah'],
            'nama_ibu' => $data['nama_ibu'],
            'telp_orang_tua' => $data['telp_orang_tua'],
            'alamat_orang_tua' => $data['alamat_orang_tua'],
            'nisn' => $data['nisn'],
            'id_kelas' => $data['id_kelas'],
            'user_id' => $insertedId,
            'foto' => $nama_file,
            ]);
            
            return redirect('/login');
    }
}
