<?php

require_once(dirname(__FILE__) . '/../config/PDO/PDO_init.php');

class Exercices {
    private int $_id;
    private string $_name;
    private string $_description;
    private int $_ID_users;
    private object $_pdo;

            /**
     * Création de la méthode magique construct visant à créer un exercice
     * @param int $id
     * @param string $name
     * @param string $description
     * @param object $pdo
     */

    public function __construct(string $name = '', string $description = '', int $ID_users = 0){
        $this->_name = $name;
        $this->_description = $description;
        $this->_ID_users = $ID_users;
        $this->_pdo = DataBase::dbConnect();
    }

            /**
     * GETTER ID
     * @return int
     */

    public function getId():int{
        return $this->_id;
    }

    /**
     * GETTER name
     * @return string
     */

    public function getName():string{
        return $this->_name;
    }

        /**
     * GETTER firstname
     * @return string
     */

    public function getDescription():string{
        return $this->_description;
    }

            /**
     * GETTER ID_users
     * @return int
     */

    public function getIDUsers():int{
        return $this->_ID_users;
    }

            /**
     * SETTER pour l'attribut privé _id
     * @param int $id
     * 
     * @return void
     */
    public function setId(int $id):void{
        $this->_id = $id;
    }

        /**
     * SETTER pour l'attribut privé _name
     * @param string $name
     * 
     * @return void
     */
    public function setName(string $name):void{
        $this->_name = $name;
    }

        /**
     * SETTER pour l'attribut privé _description
     * @param string $description
     * 
     * @return void
     */
    public function setDescription(string $description):void{
        $this->_description = $description;
    }

            /**
     * SETTER pour l'attribut privé _ID_users
     * @param int $ID_users
     * 
     * @return void
     */
    public function setIDusers(string $ID_users):void{
        $this->_ID_users = $ID_users;
    }

    public function add($ID_users):int{
        try{
            $db = DataBase::dbConnect();
            $sth = $db->prepare('INSERT INTO `exercices` (`name`,`description`,ID_users) VALUES (:names,:descriptions,:id_users)');
            $sth->bindValue(':names', $this->getName(), PDO::PARAM_STR);
            $sth->bindValue(':descriptions', $this->getDescription(), PDO::PARAM_STR);
            $sth->bindValue(':id_users', $ID_users, PDO::PARAM_INT);
            if($sth->execute()){
                $lastId = $db->lastInsertId();
            } 
            return $lastId;
        } catch (PDOException $e){
            return false;
        }
    }

    public static function getOne(int $id):object{
        $sql = 'SELECT * FROM `exercices` WHERE `exercices`.`id` = :id;';
        try{
            $sth =  DataBase::dbConnect()->prepare($sql);
            $sth->bindValue(':id',$id, PDO::PARAM_INT);
            $verif = $sth ->execute();
            if(!$verif){
                throw new PDOException();
            } else {
                return $sth->fetch();
            }
        } catch(PDOException $e){
            return $e;
        }
    }

    public static function getAll(){
        $sql = 'SELECT * FROM `exercices` ORDER BY `id`';
        try{
            $sth =  DataBase::dbConnect()->prepare($sql);
            $sth ->execute();
            $result = $sth->fetchAll();
            if(!$result){
                throw new PDOException();
            } else {
                return $result;
            }
        } catch(PDOException $e){
            return $e;
        }
    }

    public function modifyOne($id){
        $sql = 
        'UPDATE `exercices`  
        SET `name` = :newNames, `description` = :newDescription
        WHERE `id` = :id';
        $sth =  DataBase::dbConnect()->prepare($sql);
        $sth->bindValue(':newNames', $this->getName(), PDO::PARAM_STR);
        $sth->bindValue(':newDescription', $this->getDescription(), PDO::PARAM_STR);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth ->execute();
        return $sth->fetch(); 
    }

    public function deleteExercice($id){
        $sql = 'DELETE FROM `exercices`
        WHERE `exercices`.`id` = :id';
        $sth = DataBase::dbConnect()->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth ->execute();  
        return $sth->fetch();
    }


}