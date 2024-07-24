<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::with([ 'city', 'country'])->get();
        $ads = Ad::orderBy('created_at', 'desc')->take(3)->get();

        return view('pages.users.home', compact('users','ads'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function register()
    {     if(auth()->check()){
        return redirect('/users/home');
    }

        // Get account types, cities, and countries for the form

        $cities = \App\Models\City::all();
        $countries = \App\Models\Country::all();
        return view('pages.users.register', compact( 'cities', 'countries'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        // Validate input
         $this-> validate ($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone_number' => 'required',
            'nationality' => 'required',
            'job' => 'required',
            'birthday' => 'required|date',
            'country_id' => 'required',
            'city_id' => 'required',
            'account_type' => 'required|string|in:Search for Residence,Search for Roommate',
            'marital_status' => 'required',
            'gender' => 'required',
        ]);

        // تحقق من وجود المستخدم مسبقًا
        if (User::where('email', $request->email)->exists()) {
            // رسالة الخطأ إذا كان المستخدم موجودًا بالفعل
            return redirect()->back()->with('error', 'The email address is already registered.');
        }

        try {
            // إنشاء المستخدم
            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'nationality' => $request->nationality,
                'job' => $request->job,
                'birthday' => $request->birthday,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'account_type' => $request->account_type,
                'marital_status' => $request->marital_status,
                'gender' => $request->gender,
            ]);

            // رسالة النجاح
            return redirect()->route('login')->with('success', 'User registered successfully! Please login.');
        } catch (\Exception $e) {
            // رسالة الخطأ في حالة الفشل
            return redirect()->back()->with('error', 'Failed to register user.');
        }
    }
    public function showLoginForm()
    {   if(auth()->check()){
        return redirect('/users/home');
    }
        return view('pages.users.login'); // Assuming your login form view is named 'login.blade.php'
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('users/home'); // Or any other route you want to redirect the user to
        } else {
            // Check if the email exists in the users table
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return back()->with('error', 'No account found with this email.');
            } else {
                return back()->with('error', 'Incorrect password.');
            }
        }
    }
    public function logout(Request $request)
    {
        Auth::logout(); // تسجيل الخروج للمستخدم الحالي

        $request->session()->invalidate(); // إلغاء صلاحيات الجلسة الحالية
        $request->session()->regenerateToken(); // توليد رمز جديد للجلسة

        return redirect('/users/home'); // إعادة التوجيه إلى الصفحة الرئيسية أو أي صفحة أخرى بعد الخروج
    }

     // عرض صفحة الملف الشخصي
     public function viewprofile($id)
     {
         // استرجاع المستخدم بناءً على الـ ID
         $user = User::findOrFail($id);

         // تمرير المستخدم إلى العرض
         return view('pages.users.viewprofile', compact('user'));
     }
    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {   $user = Auth::user();


        $cities = \App\Models\City::all();
        $countries = \App\Models\Country::all();
        return view('pages.users.edit', compact('user', 'cities', 'countries'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate input
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone_number' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'nationality' => 'nullable|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'account_type' => 'required|string|in:Search for Residence,Search for Roommate',
            'job' => 'nullable|string|max:255',
            'marital_status' => 'nullable|in:single,married,divorced,widowed',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'first_name', 'last_name', 'email', 'phone_number', 'birthday',
            'gender', 'nationality', 'country_id', 'city_id', 'account_type',
            'job', 'marital_status','profile_picture',
        ]);

        // Handle password separately if provided
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        // Handle profile picture if provided
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                unlink(public_path($user->profile_picture));
            }

            $profilePicture = time().'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_pictures'), $profilePicture);
            $data['profile_picture'] = 'profile_pictures/' . $profilePicture;
        }

        try {
            // Update user
            $user->update($data);

            return redirect()->back()->with('success', 'User updated successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Error code for duplicate entry
                return redirect()->back()->with('error', 'The email address is already registered.');
            }
            return redirect()->back()->with('error', 'Failed to update user.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update user.');
        }
    }




    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('pages.index')->with('success', 'User deleted successfully.');
    }
    public function getCitiesByCountry($country_id)
    {


        $cities = City::where('country_id', $country_id)->get();
        return response()->json($cities);
    }


}

