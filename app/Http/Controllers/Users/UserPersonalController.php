<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Services\Users\UserPersonalService;
use App\Http\Requests\Users\UserPersonalRequest;

class UserPersonalController extends Controller
{

    /**
     * Controller Constructor
     */
    public function __construct(
        protected UserPersonalService $service = new UserPersonalService(),
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->service->getAll();
        $viewParam = [
            'title' => 'User List',
            'datas' => $data
        ];
        return view('users.userPersonalList', $viewParam);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserPersonalRequest $request)
    {
        $response = [
            'success' => false,
            'message' => "Failed created data",
            'data'    => null
        ];

        $data = $request->validated();

        $created = $this->service->createUserPersonal($data);
        if ($created) {
            Session::flash('status', 'success');
            Session::flash('message', 'New user successfully created.');
            $response = [
                'success' => true,
                'message' => 'Created user success',
                'data'    => $created
            ];
        } else {
            Session::flash('status', 'error');
            Session::flash('message', 'Failed to created new user.');
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = [
            'success' => false,
            'message' => "Failed get data",
            'data'    => null
        ];
        
        $id = decrypt($id);
        $data = $this->service->findByKey(['id' => $id]);
        if ($data) {
            $response = [
                'success' => true,
                'message' => 'Get data success',
                'data'    => $data
            ];
        }
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserPersonalRequest $request, string $id)
    {
        $response = [
            'success' => false,
            'message' => "Failed update data",
            'data'    => null
        ];

        $datas = $request->validated();

        $update = $this->service->update($id, $datas);
        if ($update) {
            Session::flash('status', 'success');
            Session::flash('message', 'User data updated successfully.');
            $response = [
                'success' => true,
                'message' => 'Update data success',
                'data'    => $update
            ];
        } else {
            Session::flash('status', 'error');
            Session::flash('message', 'Failed to update user data.');
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = decrypt($id);
        $response = $this->service->deleteByIds([$id]);
        if ($response) {
            Session::flash('status', 'success');
            Session::flash('message', 'User data deleted successfully.');
        } else {
            Session::flash('status', 'error');
            Session::flash('message', 'Failed to delete user data.');
        }        
        return true;
    }
}
