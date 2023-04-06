public function postReg(Request $request)
    {
        
        $messages = [
                'name.required' => 'Поле Имя обязательно для заполнения',
                'email.required' => 'Поле Email обязательно для заполнения',
                'password.required' => 'Поле Пароль обязательно для заполнения',
                'name.string' => 'Поле Имя обязательно должно быть строкой',
                'email.unique' => 'Такой Email уже используется',
                'password.min' => 'Пароль слишком короткий',
        ];

        $validatedData = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ],$messages);


        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);


//        $user = User::create([
//            'email'    => $request->input('email'),
//            'name'     => $request->input('name'),
//            'password' => bcrypt($request->input('password'))
//        ]);

        Auth::loginUsingId($user->id);

        return redirect()
            ->route('home')
            ->with('success', 'Вы успешно зарегистрировались');
    }
