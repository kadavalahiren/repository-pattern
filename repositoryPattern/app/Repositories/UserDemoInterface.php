<?php

namespace App\Repositories;

interface UserDemoInterface {

    public function all();

    public function get($id);

    public function store($request);

    public function update($id ,array $data);

    public function delete($id);

}