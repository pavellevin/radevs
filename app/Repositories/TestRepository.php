<?php

namespace App\Repositories;

use App\Models\Test;

class TestRepository
{
    public function all()
    {
        return Test::latest()->paginate(5);
    }

    public function create($request)
    {
        return Test::create($request->all());
    }

    public function delete($test)
    {
        return $test->delete();
    }

    public function update($request, $test)
    {
        return $test->update($request->all());
    }
}
