<?php

class CommandeModel extends Database
{
    function get()
    {
        $query = 'SELECT * from commandes
        order by commandes.commande_id desc';
        $stmnt = $this->execStatement($query);
        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

    function add($data)
    {
        $query = 'INSERT INTO commandes (product_name, user_name, phone, ville, adress, quantite, total_prix) VALUE (?, ?, ?, ?, ?, ?, ?)';
        $add = array (
            $data ['product_name'],
            $data ['user_name'],
            $data ['phone'],
            $data ['ville'],
            $data ['adress'],
            $data ['quantite'],
            $data ['total_prix']
        );
        $stmnt = $this->execStatement($query, $add);
        return $stmnt;
    }

    function delete($data)
    {
        die();
        $query = 'DELETE FROM commandes WHERE commande_id = ?';
        $delete = array(
            $data['id']
        );
        $stmnt = $this->execStatement($query, $delete);
        return $stmnt;
    }
}