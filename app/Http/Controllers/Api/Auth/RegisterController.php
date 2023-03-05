<?php

namespace App\Http\Controllers\Api\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Resources\UserResource;

class RegisterController extends Controller
{
    use PasswordValidationRules;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

       $token = $user->createToken('api-kuliner');

        return (new UserResource($user))->additional([
            'token' => $token->plainTextToken,
        ]);

    }
}
