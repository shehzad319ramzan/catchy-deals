<?php

namespace App\Http\Controllers;

use App\Dto\UserDto;
use App\Repositories\UserRepository;
use App\Http\Requests\User\UserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\UserUpdateRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(UserRepository $repo)
    {
        $this->setRepo($repo, "auth/pages/users", "users");
    }

    public function index()
    {
        $data['all'] = $this->_repo->get_all_users();
        return view($this->_directory . '.all', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $this->_repo->store(UserDto::fromRequest($request->validated()));
            return redirect()->route($this->_route . '.index')->with('success', 'User successfully created.');
        } catch (\Throwable $th) {
            return redirect()->route($this->_route . '.index')->with('error', 'Something went wrong..');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request Validation $validation
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {
            $this->_repo->update($id, UserDto::fromRequest($request->validated()));
            return redirect()->route($this->_route . '.index')->with('success', 'User updated succesfully');
        } catch (\Throwable $th) {
            if ($th instanceof NotFoundHttpException) {
                $message = $th->getMessage(); // Get the exception message
                return redirect()->route($this->_route . '.index')->with('error', $message);
            } else {
                return redirect()->route($this->_route . '.index')->with('error', 'Something went wrong..');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function editprofile()
    {
        $data = Auth::user();
        return view($this->_directory . '.profile.my_profile', compact('data'));
    }

    /**
     * Update My profile.
     *
     * @param Request Validation $validation
     * @return \Illuminate\Http\Response
     */
    public function updatemyprofile(UpdateProfileRequest $request)
    {
        try {
            $this->_repo->update(Auth::id(), UserDto::fromRequest($request->validated()));
            return redirect()->route('myprofile')->with('success', 'Profile Updated succesfully');
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            if ($th instanceof NotFoundHttpException) {
                return redirect()->route('myprofile')->with('error', $message);
            } else {
                return redirect()->route('myprofile')->with('error', 'Something went wrong..');
            }
        }
    }

    public function safety_privacy()
    {
        return view($this->_directory . '.profile.privacy_safety');
    }
}
