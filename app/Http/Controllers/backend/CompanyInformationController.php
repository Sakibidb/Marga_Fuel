<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\CompanyInformation;

class CompanyInformationController extends Controller
{

    public function index()
    {
        $company = CompanyInformation::first();
        return view('backend.page.companyInformation.index', ['company' => $company]);
    }

    public function storeOrUpdate(Request $request)
    {
        // Validation rules
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bangla_company_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'hotline' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'websitelink' => 'nullable|string',
            'facebooklink' => 'nullable|string',
            'youtubeink' => 'nullable|string',
            'googletag' => 'nullable|string',
            'image' => 'image',
            'banner1' => 'image',
            'banner2' => 'image',
            'banner3' => 'image',
            'cantactbackground' => 'image',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $otherImages = ['banner1', 'banner2', 'banner3', 'cantactbackground'];
        foreach ($otherImages as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $image = $request->file($fieldName);
                $imageName = time() . '_' . $fieldName . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $validatedData[$fieldName] = $imageName;
            }
        }

        $company = CompanyInformation::first();

        if ($company) {
            $company->update($validatedData);
            $message = 'Company information updated successfully!';
        } else {
            CompanyInformation::create($validatedData);
            $message = 'Company information saved successfully!';
        }
        return redirect()->back()->with('success', $message);
    }

    public function CompanyInformationApi()
    {
        $company = CompanyInformation::first();

        if ($company) {
            return response()->json([
                'success' => true,
                'company' => $company,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Company information not found',
            ], 404);
        }
    }

}
