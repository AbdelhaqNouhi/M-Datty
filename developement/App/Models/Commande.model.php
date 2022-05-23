<?php

class CommandeModel extends Database
{
    function fetch()
    {
        $query = 'SELECT * from commandes';
        $stmnt = $this->execStatement($query);
        $result = $stmnt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
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