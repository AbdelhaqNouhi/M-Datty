<?php

class CommandeModel extends Database
{
    function fetch()
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
        // var_dump($add);
        // die();
        $stmnt = $this->execStatement($query, $add);
        return $stmnt;
    }

    function update($data)
    {
        $query = 'UPDATE commandes SET image = ?, name = ?, description = ?, price = ? WHERE commande_id = ?';
        $update = array (
            $data ['image'],
            $data ['name'],
            $data ['description'],
            $data ['price'],
            $data ['id']
        );
        $stmnt = $this->execStatement($query, $update);
        return $stmnt;
    }

    function delete($data)
    {
        $id = $data->id;
        $query = 'DELETE FROM commandes WHERE commande_id = ?';
        $stmnt = $this->execStatement($query, [$id]);
        return $stmnt;
    }
}