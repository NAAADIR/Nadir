<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Mail\ExampleMail;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Filters\V1\UsersFilter;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Contracts\Mail\Mailer;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function sendEmail(Mailer $mailer)
    {
        $mailer->to('hello@example.com')
                ->send(new ExampleMail());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request): UserCollection
    {
        $filter = new UsersFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new UserCollection(User::paginate());
        } else {
            return new UserCollection(User::where($queryItems)->paginate());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse|UserResource
    {
        $user = User::create($request->validated());
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user): JsonResponse|UserResource
    {
        $user->update($request->validated());
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user): Response|JsonResponse
    {
        $user->delete();
        return response()->noContent();
    }
}
