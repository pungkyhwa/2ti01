<?php
    include "koneksi.php";
    class application extends koneksi{
        public function cekLogin($username, $password)
        {
            // echo $username." ini adalah username";
            $query = "SELECT * FROM users WHERE username ='$username' and password = '$password'";
            $data = mysqli_query($this->koneksi,$query);
            $row = mysqli_fetch_assoc($data);
            
            if($row != null){
                echo "anda bisa login";
                $roles = $row['roles'];
                session_start();
                $_SESSION["roles"] = $roles;
                header("location: dasboard.php");
            }else{
                echo "anda tidak bisa login";
            }
        }
        public function tampilData($query)
        {
            $data = mysqli_query($this->koneksi,$query);
            while ($row = mysqli_fetch_assoc($data)) {
                $hasil[] = $row;
            }
            return $hasil;
        }
        public function addPegawai($id_peg,$nm_pegawai,$jns_kelamin,$tmp_lahir,$tgl_lahir,$email,$no_telp,$alamat)
        {
            mysqli_query($this->koneksi,"INSERT INTO pegawai (id_pegawai, nm_pegawai, email, alamat, no_telp, jsn_kelamin, tgl_lahir, tmp_lahir) VALUES ('$id_peg','$nm_pegawai','$email','$alamat','$no_telp','$jns_kelamin','$tgl_lahir','$tmp_lahir')");
        }
        public function addAkun($id_peg,$username,$password)
        {
            mysqli_query($this->koneksi,"INSERT INTO users(id_pegawai, username, password, roles) VALUES ('$id_peg','$username','$password','2')");
        }
        
    }
?>