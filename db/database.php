<?php

require __DIR__ . "/../process/utils.php";

class Database
{
    public $contHost = 'localhost';
    public $contnama = 'popaysit_popay';
    public $contUsernama = 'popaysit';
    public $contUserPassword = 'Ho)qES[39t0Up6';

    public $cont  = null;

    public function __construct()
    {
        if ($this->cont == null) {

            try {
                $this->cont =  new PDO(
                    "mysql:host=" . $this->contHost .
                        ";" . "dbname=" . $this->contnama,
                    $this->contUsernama,
                    $this->contUserPassword
                );
                $this->cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        return $this->cont;
    }
 

    public function query($query)
    {
        try {
            $query = $this->cont->prepare($query);

            $query->execute();

            return $query;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function registerPengelola($nama, $telepon, $provinsi_pengelola, $alamat, $email, $dengan_kode = false)
    {
        try {
            $kode = "";

            if ($dengan_kode) {
                do {
                    $kode = generateRandom();

                    $chk = $this->cont->prepare("SELECT * FROM pengelola WHERE kode=:kode");
                    $chk->bindParam("kode", $kode);
                    $chk->execute();
                } while ($chk->rowCount() > 0);
            }

            $query = $this->cont->prepare(
                "INSERT INTO pengelola(telepon, provinsi_pengelola, nama_pengelola, email, alamat, kode)
                VALUES (:telepon,:provinsi_pengelola,:nama_pengelola,:email,:alamat,:kode)"
            );

            $query->bindParam("telepon", $telepon, PDO::PARAM_INT);
            $query->bindParam("provinsi_pengelola", $provinsi_pengelola, PDO::PARAM_STR);
            $query->bindParam("nama_pengelola", $nama, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("alamat", $alamat, PDO::PARAM_STR);
            $query->bindParam("kode", $kode, PDO::PARAM_STR);

            $query->execute();

            return $this->cont->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getPengelolaByCode($code, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT * FROM pengelola WHERE kode=:code"
            );

            $query->bindParam("code", $code, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetch($rettype);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getPengelolaData($id, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT * FROM pengelola WHERE id=:id"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetch($rettype);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getPengelolaTotalBalance($id)
    {
        try {
           

            $query = $this->cont->prepare(
                "SELECT SUM(saldo) AS total FROM user WHERE id_pengelola=:id"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() < 0) {
                return false;
            }

            $userBalance = $query->fetch(PDO::FETCH_OBJ)->total;

            $query = $this->cont->prepare(
                "SELECT SUM(terkumpul) AS total FROM donasi WHERE id_pengelola=:id"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() < 0) {
                return false;
            }

            $donasi = $query->fetch(PDO::FETCH_OBJ)->total;

            return (object)[

                "user" => $userBalance,
                "donasi" => $donasi,
                "total" => $userBalance + $donasi
            ];
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getPengelolaUserStats($id)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT COUNT(id) AS jumlah FROM user WHERE jenis_kelamin='laki-laki' AND id_pengelola=:id"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() < 0) {
                return false;
            }

            $jumlah_laki = $query->fetch(PDO::FETCH_OBJ)->jumlah;

            $query = $this->cont->prepare(
                "SELECT COUNT(id) AS jumlah FROM user WHERE jenis_kelamin='perempuan' AND id_pengelola=:id"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() < 0) {
                return false;
            }

            $jumlah_perempuan = $query->fetch(PDO::FETCH_OBJ)->jumlah;

            return (object)["laki" => $jumlah_laki, "perempuan" => $jumlah_perempuan, "total" => $jumlah_laki + $jumlah_perempuan];
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getPengelolaTransactions($id)
    {
        try {
            try {
                $query = $this->cont->prepare(
                    "SELECT * FROM transaksi_user WHERE id_pengelola=:id"
                );

                $query->bindParam("id", $id, PDO::PARAM_STR);

                $query->execute();

                if ($query->rowCount() > 0) {
                    return $query->fetchAll(PDO::FETCH_OBJ);
                }
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

   
    public function getPengelolaStats($id)
    {
        $balance = $this->getPengelolaTotalBalance($id);
        $user = $this->getPengelolaUserStats($id);
        $trx = $this->getPengelolaTransactions($id);

        return (object)["balance" => $balance, "user" => $user, "trx" => $trx];
    }

    public function registerAdmin($nama, $email, $password, $id_pengelola)
    {
        try {
            $query = $this->cont->prepare(
                "INSERT INTO admin(nama, email, level, password, id_pengelola) 
                VALUES (:nama,:email,'admin',:password,:idpengelola)"
            );

            $enc_password = saltHash($password);

            $query->bindParam("nama", $nama, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->bindParam("idpengelola", $id_pengelola, PDO::PARAM_INT);

            $query->execute();

            return $this->cont->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }


    public function loginAdmin($email, $password)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT id FROM admin 
                WHERE email=:email
                AND password=:password"
            );

            $query->bindParam("email", $email, PDO::PARAM_STR);
            $enc_password = saltHash($password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->id;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function validateAdminPassword($id, $password)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT id FROM admin 
                WHERE id=:id
                AND password=:password"
            );

            $enc_password = saltHash($password);

            $query->bindParam("id", $id, PDO::PARAM_STR);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }


    public function deleteDonasi($id)
    {
        try {
            $query = $this->cont->prepare(
                "DELETE FROM donasi
                WHERE id=:id"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            return $query->rowCount();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }


    public function getAdminById($id, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT id, nama, email, level, id_pengelola
                FROM admin WHERE id=:id"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetch($rettype);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function addAdminJournal($id_admin, $code, $nilai, $ext1 = "")
    {
        try {
            $query = $this->cont->prepare(
                "INSERT INTO aktivitas_admin(id_pengelola, id_admin, code, nilai, ext_1)
                VALUES (:idpengelola,:idadmin,:code,:nilai,:ext1)"
            );

            $query->bindParam("idpengelola", $this->getAdminById($id_admin, PDO::FETCH_OBJ)->id_pengelola, PDO::PARAM_INT);
            $query->bindParam("idadmin", $id_admin, PDO::PARAM_INT);
            $query->bindParam("code", $code, PDO::PARAM_STR);
            $query->bindParam("nilai", $nilai, PDO::PARAM_INT);
            $query->bindParam("ext1", $ext1, PDO::PARAM_STR);

            $query->execute();

            return $this->cont->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getAdminJournal($id_admin)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT * FROM aktivitas_admin WHERE id_admin=:idadmin"
            );

            $query->bindParam("idadmin", $id_admin, PDO::PARAM_INT);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getSeluruhUser($idpengelola)
    {
        try {
            $stmt = $this->cont->prepare(
                "SELECT id, id_pengelola, tanggal_pendaftaran, nama, jenis_kelamin, email, level, provinsi, kodepos, pekerjaan, teleponuser, saldo 
                FROM user WHERE id_pengelola=:idpengelola ORDER BY id ASC"
            );

            $stmt->bindParam("idpengelola", $idpengelola, PDO::PARAM_INT);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function register($nama, $id_pengelola, $jenis_kelamin, $email, $provinsi, $kodepos, $pekerjaan, $teleponuser, $saldo)
    {
        try {
            $query = $this->cont->prepare(
                "INSERT INTO user(nama, id_pengelola, jenis_kelamin, email, level, provinsi, kodepos, pekerjaan, teleponuser, saldo, password) 
                VALUES (:nama,:idpengelola,:jenis_kelamin,:email,'user',:provinsi,:kodepos,:pekerjaan,:teleponuser,:saldo,:password)"
            );

            $password = generateRandom();

            $enc_password = saltHash($password);

            $query->bindParam("nama", $nama, PDO::PARAM_STR);
            $query->bindParam("idpengelola", $id_pengelola, PDO::PARAM_INT);
            $query->bindParam("jenis_kelamin", $jenis_kelamin, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("provinsi", $provinsi, PDO::PARAM_STR);
            $query->bindParam("kodepos", $kodepos, PDO::PARAM_STR);
            $query->bindParam("pekerjaan", $pekerjaan, PDO::PARAM_STR);
            $query->bindParam("teleponuser", $teleponuser, PDO::PARAM_STR);
            $query->bindParam("saldo", $saldo, PDO::PARAM_INT);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);

            $query->execute();

            $id_user = $this->cont->lastInsertId();

           

            return array($id_user, $password);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function editUserFull($id, $nama, $id_pengelola, $jenis_kelamin, $email, $provinsi, $kodepos, $pekerjaan, $teleponuser)
    {
        try {
            $query = $this->cont->prepare(
                "UPDATE user
                SET nama=:nama,
                jenis_kelamin=:jenis_kelamin,
                email=:email,
                provinsi=:provinsi,
                kodepos=:kodepos,
                pekerjaan=:pekerjaan,
                teleponuser=:teleponuser WHERE id=:id AND id_pengelola=:idpengelola"
            );

            $query->bindParam("id", $id, PDO::PARAM_INT);
            $query->bindParam("idpengelola", $id_pengelola, PDO::PARAM_INT);
            $query->bindParam("nama", $nama, PDO::PARAM_STR);
            $query->bindParam("jenis_kelamin", $jenis_kelamin, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("provinsi", $provinsi, PDO::PARAM_STR);
            $query->bindParam("kodepos", $kodepos, PDO::PARAM_STR);
            $query->bindParam("pekerjaan", $pekerjaan, PDO::PARAM_STR);
            $query->bindParam("teleponuser", $teleponuser, PDO::PARAM_STR);

            $query->execute();

            return $query->rowCount();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function login($email, $password)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT id FROM user 
                WHERE email=:email
                AND password=:password"
            );

            $enc_password = saltHash($password);

            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);

            $query->execute();

            // print_r($query->fetchAll(PDO::FETCH_ASSOC));

            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->id;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function validatePassword($id, $password)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT id FROM user 
                WHERE id=:id
                AND password=:password"
            );

            $enc_password = saltHash($password);

            $query->bindParam("id", $id, PDO::PARAM_STR);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);

            $query->execute();

            return $query->rowCount();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function changeUserPassword($id, $old_password, $new_password)
    {
        try {
            $query = $this->cont->prepare(
                "UPDATE user SET password=IF(password=:old_password, :new_password, password) WHERE id=:id"
            );

            $old_password = saltHash($old_password);
            $new_password = saltHash($new_password);

            $query->bindParam("old_password", $old_password, PDO::PARAM_STR);
            $query->bindParam("new_password", $new_password, PDO::PARAM_STR);
            $query->bindParam("id", $id, PDO::PARAM_INT);

            $query->execute();

            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function searchUser($query)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT id, tanggal_pendaftaran, nama, email, level, provinsi, kodepos, pekerjaan, teleponuser, saldo
                FROM user WHERE name LIKE '%:query%' OR email=':query' OR teleponuser=':query'"
            );

            $query->bindParam("query", $query, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetchAll(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getUserById($id, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT id, id_pengelola, tanggal_pendaftaran, nama, jenis_kelamin, email, level, provinsi, kodepos, pekerjaan, teleponuser, saldo 
                FROM user WHERE id=:id"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetch($rettype);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getUserByEmail($email, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT id, id_pengelola, tanggal_pendaftaran, nama, jenis_kelamin, email, level, provinsi, kodepos, pekerjaan, teleponuser, saldo 
                FROM user WHERE email=:email"
            );

            $query->bindParam("email", $email, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetch($rettype);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getUserByTELEPONUSER($teleponuser, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT id, id_pengelola, tanggal_pendaftaran, nama, jenis_kelamin, email, level, provinsi, kodepos, pekerjaan, teleponuser, saldo 
                FROM user WHERE teleponuser=:teleponuser"
            );

            $query->bindParam("teleponuser", $teleponuser, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetch($rettype);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getUserUKTBill($id, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT * FROM ukt WHERE id_user=:id AND status_pembayaran=0"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetchAll($rettype);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getUserUKT($id, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT * FROM ukt WHERE id_user=:id"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetchAll($rettype);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function payUKT($userid, $pengelolaid, $uktid)
    {
        try {
            $pengelola = $this->getPengelolaData($pengelolaid, PDO::FETCH_OBJ);
            $jumlah = $pengelola->biaya_ukt;

            $query = $this->cont->prepare(
                "UPDATE pengelola
                SET saldo = saldo + :amount
                WHERE id=:idpengelola"
            );

            $query->bindParam("idpengelola", $pengelolaid, PDO::PARAM_STR);
            $query->bindParam("amount", $jumlah, PDO::PARAM_INT);

            $query->execute();

            if ($query->rowCount() < 0) {
                return false;
            }

            $query = $this->cont->prepare(
                "UPDATE user
                SET saldo = IF(:amount <= saldo, saldo - :amount, saldo)
                WHERE id=:userid"
            );

            $query->bindParam("userid", $userid, PDO::PARAM_STR);
            $query->bindParam("amount", $jumlah, PDO::PARAM_INT);

            $query->execute();


            if ($query->rowCount() < 0) {
                return false;
            }

            $query = $this->cont->prepare(
                "UPDATE ukt SET status_pembayaran=1, tanggal_pembayaran=now() WHERE id=:id"
            );

            $query->bindParam("id", $uktid, PDO::PARAM_INT);

            $query->execute();

            return $query->rowCount();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function userDeposit($userid, $amount)
    {
        try {
            $query = $this->cont->prepare(
                "UPDATE user
                SET saldo = saldo + :amount
                WHERE id=:userid"
            );

            $query->bindParam("userid", $userid, PDO::PARAM_STR);
            $query->bindParam("amount", $amount, PDO::PARAM_INT);

            $query->execute();

            if ($query->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function userWithdrawal($userid, $amount)
    {
        try {
            $query = $this->cont->prepare(
                "UPDATE user
                SET saldo = IF(:amount <= saldo, saldo - :amount, saldo)
                WHERE id=:userid"
            );

            $query->bindParam("userid", $userid, PDO::PARAM_STR);
            $query->bindParam("amount", $amount, PDO::PARAM_INT);

            $query->execute();

            if ($query->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function transferByTELEPONUSER($userid, $teleponuser, $amount)
    {
        try {
            $query = $this->cont->prepare(
                "UPDATE user
                SET saldo = IF(:amount <= saldo, saldo - :amount, saldo)
                WHERE id=:userid"
            );

            $query->bindParam("userid", $userid, PDO::PARAM_STR);
            $query->bindParam("amount", $amount, PDO::PARAM_INT);

            $query->execute();

            if ($query->rowCount() < 0) {
                return false;
            }

            $query = $this->cont->prepare(
                "UPDATE user
                SET saldo = saldo + :amount
                WHERE teleponuser=:teleponuser"
            );

            $query->bindParam("teleponuser", $teleponuser, PDO::PARAM_STR);
            $query->bindParam("amount", $amount, PDO::PARAM_INT);


            $query->execute();

            if ($query->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function transferFromTeleponToTelepon($teleponsender, $teleponreceiver, $amount)
    {
        try {
            $query = $this->cont->prepare(
                "UPDATE user
                SET saldo = IF(:amount <= saldo, saldo - :amount, saldo)
                WHERE teleponuser=:teleponsender"
            );

            $query->bindParam("teleponsender", $teleponsender, PDO::PARAM_STR);
            $query->bindParam("amount", $amount, PDO::PARAM_INT);

            $query->execute();

            if ($query->rowCount() < 0) {
                return false;
            }

            $query = $this->cont->prepare(
                "UPDATE user
                SET saldo = saldo + :amount
                WHERE teleponuser=:teleponreceiver"
            );

            $query->bindParam("teleponreceiver", $teleponreceiver, PDO::PARAM_STR);
            $query->bindParam("amount", $amount, PDO::PARAM_INT);


            $query->execute();

            if ($query->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getUserTransactionHistory($id, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT *
                 FROM transaksi_user
                 WHERE user_id=:id
                 ORDER BY tanggal DESC"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetchAll($rettype);
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function createDonasi($judul, $deskripsi, $target, $idposter)
    {
        try {
            $query = $this->cont->prepare(
                "INSERT INTO donasi(judul, deskripsi, diposting_oleh, target_donasi, id_pengelola) 
                VALUES (:judul,:deskripsi,:idposter,:tgt,:idpengelola)"
            );

            $query->bindParam("judul", $judul, PDO::PARAM_STR);
            $query->bindParam("deskripsi", $deskripsi, PDO::PARAM_STR);
            $query->bindParam("tgt", $target, PDO::PARAM_INT);
            $query->bindParam("idposter", $idposter, PDO::PARAM_STR);
            $query->bindParam(
                "idpengelola",
                $this->getAdminById($idposter, PDO::FETCH_OBJ)->id_pengelola,
                PDO::PARAM_INT
            );

            $query->execute();

            return $this->cont->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function changedonasiStatus($id, $adminid, $status)
    {
        try {
            $query = $this->cont->prepare(
                "UPDATE donasi SET status=:status WHERE id=:id AND id_pengelola=:idpengelola"
            );

            $query->bindParam("id", $id, PDO::PARAM_INT);
            $query->bindParam(
                "idpengelola",
                $this->getAdminById($adminid, PDO::FETCH_OBJ)->id_pengelola,
                PDO::PARAM_INT
            );
            $query->bindParam("status", $status, PDO::PARAM_STR);

            $query->execute();

            return $this->cont->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getdonasi($id, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT * FROM donasi WHERE id=:id"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetch($rettype);
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getDonatur($id, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT user.nama, user.provinsi, user.kodepos,
                 user.pekerjaan, donasi_user.jumlah, donasi_user.private
                 FROM donasi_user INNER JOIN user
                 ON donasi_user.user_id = user.id
                 WHERE donasi_user.id_donasi=:id
                 ORDER BY tanggal DESC"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetchAll($rettype);
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getAllDonasi($id_pengelola, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT * FROM donasi WHERE id_pengelola=:idpengelola"
            );

            $query->bindParam("idpengelola", $id_pengelola, PDO::PARAM_INT);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetchAll($rettype);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function funddonasi($id_donasi, $user_id, $amount, $isprivate)
    {
        try {
            $query = $this->cont->prepare(
                "UPDATE donasi
                SET terkumpul = terkumpul + :amount
                WHERE id=:donasiid"
            );

            $query->bindParam("donasiid", $id_donasi, PDO::PARAM_STR);
            $query->bindParam("amount", $amount, PDO::PARAM_INT);

            $query->execute();

            if ($query->rowCount() < 0) {
                return false;
            }

            $query = $this->cont->prepare(
                "UPDATE user
                SET saldo = IF(:amount <= saldo, saldo - :amount, saldo)
                WHERE id=:userid"
            );

            $query->bindParam("userid", $user_id, PDO::PARAM_INT);
            $query->bindParam("amount", $amount, PDO::PARAM_INT);


            $query->execute();

            if ($query->rowCount() < 0) {
                return false;
            }

            $query = $this->cont->prepare(
                "INSERT INTO donasi_user(id_donasi, user_id, jumlah, private, id_pengelola) 
                VALUES (:donasiid,:userid,:amount,:isprivate,:idpengelola)"
            );

            $query->bindParam("donasiid", $id_donasi, PDO::PARAM_INT);
            $query->bindParam("userid", $user_id, PDO::PARAM_INT);
            $query->bindParam("amount", $amount, PDO::PARAM_INT);
            $query->bindParam("isprivate", $isprivate, PDO::PARAM_BOOL);
            $query->bindParam("idpengelola", $this->getUserById($user_id, PDO::FETCH_OBJ)->id_pengelola, PDO::PARAM_INT);

            $query->execute();

            return $this->cont->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function disbursementdonasi($id_donasi, $admin_id, $amount)
    {
        try {
            $query = $this->cont->prepare(
                "UPDATE donasi
                SET terkumpul = IF(:amount <= terkumpul, terkumpul - :amount, terkumpul)
                WHERE id=:donasiid && id_pengelola=:idpengelola"
            );

            $query->bindParam("donasiid", $id_donasi, PDO::PARAM_STR);
            $query->bindParam("amount", $amount, PDO::PARAM_INT);
            $query->bindParam("idpengelola", $this->getAdminById($admin_id, PDO::FETCH_OBJ)->id_pengelola, PDO::PARAM_INT);

            $query->execute();

            if ($query->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function addTransaction($kredit, $type, $jenistransaksi, $userid, $method, $description, $keterangan)
    {
        try {
            $query = $this->cont->prepare(
                "INSERT INTO transaksi_user(kredit, debit, tipe, jenistransaksi, user_id, metode, deskripsi, id_pengelola, keterangan)
                VALUES (:kredit,:debit,:tipe,:jenistransaksi,:userid,:metode,:deskripsi,:idpengelola,:keterangan)"
            );

            $debit = $this->getUserById($userid, PDO::FETCH_OBJ)->saldo;

            $query->bindParam("kredit", $kredit, PDO::PARAM_INT);
            $query->bindParam("debit", $debit, PDO::PARAM_INT);
            $query->bindParam("tipe", $type, PDO::PARAM_STR);
            $query->bindParam("jenistransaksi", $jenistransaksi, PDO::PARAM_STR);
            $query->bindParam("userid", $userid, PDO::PARAM_STR);
            $query->bindParam("metode", $method, PDO::PARAM_STR);
            $query->bindParam("deskripsi", $description, PDO::PARAM_STR);
            $query->bindParam("idpengelola", $this->getUserById($userid, PDO::FETCH_OBJ)->id_pengelola, PDO::PARAM_INT);
            $query->bindParam("keterangan", $keterangan, PDO::PARAM_STR);
            $query->execute();

            return $this->cont->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getTransaction($id, $rettype)
    {
        try {
            try {
                $query = $this->cont->prepare(
                    "SELECT * FROM transaksi_user WHERE id=:id"
                );

                $query->bindParam("id", $id, PDO::PARAM_STR);

                $query->execute();

                if ($query->rowCount() > 0) {
                    return $query->fetch($rettype);
                }
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }


    public function newQr($judul, $nilai, $tetap, $id_admin)
    {
        try {
            $uniid = "";

            do {
                $uniid = generateRandom();

                $chk = $this->cont->prepare("SELECT * FROM qrcode WHERE unique_id=:uniid");
                $chk->bindParam("uniid", $uniid);
                $chk->execute();
            } while ($chk->rowCount() > 0);


            $query = $this->cont->prepare(
                "INSERT INTO qrcode(judul, nilai, tetap, dibuat_oleh, unique_id, id_pengelola)
                VALUES (:judul,:nilai,:tetap,:id_admin,:id_unik,:idpengelola)"
            );

            $query->bindParam("judul", $judul, PDO::PARAM_STR);
            $query->bindParam("nilai", $nilai, PDO::PARAM_INT);
            $query->bindParam("tetap", $tetap, PDO::PARAM_BOOL);
            $query->bindParam("id_admin", $id_admin, PDO::PARAM_STR);
            $query->bindParam("id_unik", $uniid, PDO::PARAM_STR);
            $query->bindParam("idpengelola", $this->getAdminById($id_admin, PDO::FETCH_OBJ)->id_pengelola, PDO::PARAM_INT);

            $query->execute();

            return $this->cont->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getQR($uniqueid, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT * FROM qrcode WHERE unique_id=:unid"
            );

            $query->bindParam("unid", $uniqueid, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetch($rettype);
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getQRById($id, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT * FROM qrcode WHERE id=:id"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetch($rettype);
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getQRCodeKantin($id, $rettype)
    {
        try {
            $query = $this->cont->prepare(
                "SELECT * FROM qrcode WHERE id_kantin=:id ORDER BY id DESC"
            );

            $query->bindParam("id", $id, PDO::PARAM_STR);

            $query->execute();

            if ($query->rowCount() > 0) {
                return $query->fetchAll($rettype);
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function disconnect()
    {
        $this->cont = null;
    }
}
