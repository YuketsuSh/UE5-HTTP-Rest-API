<?php

require_once("DBManager.php");

class AnnonceManager {
    private $db;

    public function __construct(){
        $this->db = new DBManager();
    }

    public function addAnnonce($text_annonce){
        try {
            $conn = $this->db->getConn();
            $stmt = $conn->prepare("INSERT INTO annonces (announces) VALUES (:annonce)");
            $stmt->bindParam(':annonce', $text_annonce);
            $stmt->execute();
        } catch (PDOException $e){
            echo "Error : " . $e->getMessage();
        }finally{
            $this->db->closeConn();
        }

    }


    public function getAnnonces(){
        try {
            $conn = $this->db->getConn();
            $stmt = $conn->query("SELECT announces FROM annonces");
            $annonces = $stmt->fetchAll(PDO::FETCH_COLUMN);
            return $annonces;
        }catch (PDOException $e){
            echo "Error : " . $e->getMessage();
        }finally {
            $this->db->closeConn();
        }
    }

    public function getLastAnnonceText(){
        try {
            $conn = $this->db->getConn();
            $stmt = $conn->query("SELECT announces FROM annonces ORDER BY date_creation DESC LIMIT 1");
            $lastAnnonce = $stmt->fetchColumn();
            return $lastAnnonce !== false ? $lastAnnonce : "Aucune annonce disponible.";
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        } finally {
            $this->db->closeConn();
        }
    }
}

?>