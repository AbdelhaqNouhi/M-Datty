<?php

class Admin 
{
    public function all()
    {
        echo json_encode($this->model->fetch_all());
    }

    public function add()
    {

    }

    public function update()
    {
    }

    public function delete()
    {
    }
}