public function postReg(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);


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
