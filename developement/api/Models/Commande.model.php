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

    function  add($data)
    {
        $query = 'INSERT INTO commandes (image, name, description, price) VALUE (?, ?, ?, ?)';
        $add = array (
            $data ['image'],
            $data ['name'],
            $data ['description'],
            $data ['price'],
        );
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