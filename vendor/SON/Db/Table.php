<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 16/07/14
 * Time: 00:32
 */

namespace SON\Db;


abstract class Table {

    protected $db;
    protected $table;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function fetchAll()
    {
        $query = "SELECT * FROM {$this->table}";
        return $this->db->query($query);
    }

    public function findId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} where id=:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $res = $stmt->fetch();
        return $res;
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("delete FROM {$this->table} where id=:id");
        $stmt->bindParam(":id",$id);
        return  $stmt->execute();

    }
} 