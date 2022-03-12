<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\TestRepository;
use App\Repositories\UserRepository;
use App\Http\Requests\TestCreateRequest;
use App\Http\Requests\TestUpdateRequest;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $testRepository;
    private $userRepository;

    function __construct(TestRepository $testRepository, UserRepository $userRepository)
    {
        $this->middleware('permission:test-list|test-create|test-edit|test-delete', ['only' => ['index','show']]);
        $this->middleware('permission:test-create', ['only' => ['create','store']]);
        $this->middleware('permission:test-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:test-delete', ['only' => ['destroy']]);

        $this->testRepository = $testRepository;
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = $this->testRepository->all();

        return view('tests.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managers = $this->userRepository->getManagers();

        return view('tests.create',compact('managers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestCreateRequest $request)
    {
        $this->testRepository->create($request);

        return redirect()->route('tests.index')
            ->with('success','Test created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        return view('tests.show',compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        $managers = $this->userRepository->getManagers();

        return view('tests.edit',compact(['test', 'managers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function update(TestUpdateRequest $request, Test $test)
    {
        $this->testRepository->update($request, $test);

        return redirect()->route('tests.index')
            ->with('success','Test updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $this->testRepository->delete($test);

        return redirect()->route('tests.index')
            ->with('success','Test deleted successfully');
    }
}
