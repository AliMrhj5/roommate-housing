<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\AdsType;
use App\Models\ResidenceType;
use App\Models\Country;
use App\Models\City;
use App\Models\ImageAd;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function showAds()
{
    // جلب كل الإعلانات من قاعدة البيانات

    $ads = Ad::with(['user', 'images'])->get();
    // إرسال البيانات إلى العرض (view) لعرضها
    return view('pages.users.ads', compact('ads'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAdIndex()
    {   $countries = Country::all();
        $city = City::find(auth()->user()->city_id);
        // جلب القيم الممكنة لـ ad_type و residence_type
        $ad_type = ['House', 'Partner']; // أو يمكنك جلب القيم من قاعدة البيانات إذا كانت موجودة في جدول
        $residence_type = ['apartment', 'house', 'shared', 'studio']; // أو يمكنك جلب القيم من قاعدة البيانات

        return view('pages.users.create-ads', compact('ad_type', 'residence_type', 'countries', 'city'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{

    // تحقق من صحة البيانات المدخلة
    $this->validate($request,[

            'title' => 'required|string|max:255',
            'budget' => 'required|numeric',
            'ad_type' => 'required|in:House,Partner',
            'residence_type' => 'required|in:apartment,house,shared,studio',
            'room_size' => 'nullable|integer|min:0',
            'number_of_rooms' => 'nullable|integer|min:0',
            'number_of_bathrooms' => 'nullable|integer|min:0',
            'furnished' => 'nullable|boolean',
            'smoking_allowed' => 'nullable|boolean',
            'pets_allowed' => 'nullable|boolean',
            'location_description' => 'nullable|string|max:255',
            'availability_date' => 'required|date',
            'preferences' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'notes' => 'nullable|string',
            'contact_phone' => 'required|string|max:15',
            'partner_age_min' => 'nullable|integer|min:0',
            'partner_age_max' => 'nullable|integer|min:0',
            'partner_gender' => 'required|string|in:male,female,any',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,gif|max:2048',

    ]);

    // إنشاء نموذج الإعلان الجديد
    $ad = new Ad($request->all());
    $ad->user_id = $request->input('user_id', Auth::id()); // تعيين معرّف المستخدم الحالي إذا لم يتم تقديمه

    $ad->save();
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('ads_images'), $imageName);
            $adImage = new ImageAd();
            $adImage->ad_id = $ad->id;
            $adImage->image_path = 'ads_images/' . $imageName;
            $adImage->save();
        }

    }

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->route('ads')->with('success', 'تم إنشاء الإعلان بنجاح.');
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




     public function viewdetails($id)
{

    $ad = Ad::with(['country', 'city'])->findOrFail($id);
    return view('pages.users.view-details', compact('ad'));
}
    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        $adsTypes = AdsType::all();
        $residenceTypes = ResidenceType::all();
        return view('ads.edit', compact('ad', 'adsTypes', 'residenceTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request,[
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'budget' => 'nullable|numeric',
            'ad_type' => 'required|in:House,Partner',
            'residence_type' => 'required|in:apartment,house,shared,studio',
            'number_of_rooms' => 'nullable|integer|min:0',
            'number_of_bathrooms' => 'nullable|integer|min:0',
            'furnished' => 'nullable|boolean',
            'smoking_allowed' => 'nullable|boolean',
            'pets_allowed' => 'nullable|boolean',
            'location_description' => 'nullable|string|max:255',
            'availability_date' => 'nullable|date',
            'preferences' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'notes' => 'nullable|string',
            'contact_phone' => 'nullable|string',

            'partner_age_min' => 'nullable|integer|min:0',
            'partner_age_max' => 'nullable|integer|min:0',
            'partner_gender' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        ]);

        $ad = Ad::findOrFail($id);
        $ad->update($request);

        return redirect()->route('ads')->with('success', 'Ad updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        $ad->delete();

        return redirect()->route('ads.index')->with('success', 'Ad deleted successfully.');
    }
}

