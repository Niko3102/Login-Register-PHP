<?php
class AsthSys {
    private $PDO;

    public function __construct($PDOconn) {
        $this->PDO = $PDOconn;
    }
    
    public function registraNuovoUtente($post) {
        /* CONTROLLI
         * [OK] username non sia già presente e abbia solo lettere e numeri da 8 a 12 caratteri
         * [OK] password che abbia solo lettere, numeri ed alcuni caratteri speciali
         * [OK] password e conferma password devono coincidere
         * [OK] email passata valida
         * [OK] presenza nome
         */

        $in_uname = trim($post['uname']);
        $in_pwd = trim($post['pwd']);
        $in_repwd = trim($post['re_pwd']);
        $in_nome = trim($post['nome']);
        $in_email = trim($post['email']);

        if(!(ctype_alnum($in_uname) && mb_strlen($in_uname) >= 8 && mb_strlen($in_uname) <= 12)){
            throw new Exception("Username non valida");
        }
        
        $q = "SELECT * FROM Utenti WHERE (username = :uname)";
        $rq =  $this->PDO->prepare($q);
        $rq->bindParam(":uname", $in_uname, PDO::PARAM_STR);
        $rq->execute();
        if($rq->rowCount() > 0){
            throw new Exception("Username già presente");
        }

        if(!preg_match('/^[a-zA-Z0-9_\-\$@#!]{8,}$/', $in_pwd)) {
            throw new Exception("Password non valida*");
        }

        if(strcmp($in_pwd, $in_repwd) !== 0) {
            throw new Exception("Password e conferma non coincidono!*");
        }

        if(!filter_var($in_email, FILTER_VALIDATE_EMAIL)){
            throw new Exception("Email non valida*");
        }

        if(mb_strlen($in_nome) == 0){
            throw new Exception("Nome non indicato!*");
        }
        
        $pwd_hash = password_hash($in_pwd, PASSWORD_DEFAULT);

        try {
            $q = "INSERT INTO Utenti (username, password, nome, email) VALUES(:uname, :pwd, :nome, :email)";
            $rq = $this->PDO->prepare($q);
            $rq->bindParam(":uname", $in_uname, PDO::PARAM_STR);
            $rq->bindParam(":pwd", $pwd_hash, PDO::PARAM_STR);
            $rq->bindParam(":nome", $in_nome, PDO::PARAM_STR);
            $rq->bindParam(":email", $in_email, PDO::PARAM_STR);
            $rq->execute();
        }catch(PDOException $e){
            echo "Errore inserimanto!";
        }

        return TRUE;
        
    }
    public function login(string $username, string $password) {
        try {
            //controllo corripondenza username e password
            $q = "SELECT * FROM Utenti WHERE username = :username";
            $rq = $this->PDO->prepare($q);
            $rq->bindParam(":username", $username, PDO::PARAM_STR);
            $rq->execute();
            if($rq->rowCount() == 0) {
                throw new Exception("I dati forniti non sono validi per il login (NAME)");
            }
            $record = $rq->fetch(PDO::FETCH_ASSOC);
            //var_dump($record);
            if(!password_verify($password, $record['password'])){
                throw new Exception("I dati forniti non sono validi per il login (PASS)");
            }
            //logghiamo l'utente
            $session_id = session_id();
            $user_id = $record['id'];
            $q = "INSERT INTO UtentiLoggati (session_id, user_id) VALUES (:sessionid, :userid)";
            $rq = $this->PDO->prepare($q);
            $rq->bindParam(":sessionid", $session_id, PDO::PARAM_STR);
            $rq->bindParam(":userid", $user_id, PDO::PARAM_INT);
            $rq->execute();
            
            return TRUE;
        } catch(PDOException $e) {
            echo "Errore login!";
        }
    }

    public function logout() {
        try {
            $q = "DELETE FROM UtentiLoggati WHERE session_id = :sessionid";
            $rq = $this->PDO->prepare($q);
            $session_id = session_id();
            $rq->bindParam(":sessionid", $session_id, PDO::PARAM_STR);
            $rq->execute();
        } catch(PDOException $e) {
            echo "Errore logout";
        }
        return TRUE;
    }

    public function utenteLoggato() {
        $q = "SELECT * FROM UtentiLoggati WHERE session_id = :sessionid";
        $rq = $this->PDO->prepare($q);
        $session_id = session_id();
        $rq->bindParam(":sessionid", $session_id, PDO::PARAM_STR);
        $rq->execute();
        if($rq->rowCount() == 0) {
            return FALSE;
        }
        return TRUE;
    }
}

?>