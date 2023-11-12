<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

use App\Models\Company;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

use DataTables;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companiesList = Company::all();
        return view('companies.index', compact('companiesList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url|max:255',
        ]);
        try {
            DB::beginTransaction();
            $data = $request->all();
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $fileName = $request->input('name') . '_' . time() . '.' . $file->getClientOriginalExtension();
                $logoPath = $file->storeAs('logos', $fileName, 'public');
                $data['logo'] = $logoPath;
            }
            Company::create($data);
            DB::commit();
            return redirect()->route('companies.index')->with('success', 'Company created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('companies.index')->with('fail', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
       
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $data = $request->all();
    
        if ($request->hasFile('logo')) {
            // Delete the old logo file if it exists
            Storage::disk('public')->delete($company->logo);
    
            $file = $request->file('logo');
            $fileName = $request->input('name') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $logoPath = $file->storeAs('logos', $fileName, 'public');
    
            // Update the logo path in the data
            $data['logo'] = $logoPath;
        }
    
        // Update the company data
        $company->update($data);
    
        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }
    

private function updateLogo($request, $company, &$data)
{
    // Delete the old logo file if it exists
    Storage::disk('public')->delete($company->logo);

    $file = $request->file('logo');
    $fileName = $request->input('name') . '_' . time() . '.' . $file->getClientOriginalExtension();
    $logoPath = $file->storeAs('logos', $fileName, 'public');
    $data['logo'] = $logoPath;
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Companey deleted successfully');
    }
    public function getCompanies()
    {
        $companies = Company::select(['id', 'name', 'email', 'website'])
        ->orderBy('id', 'desc');
       // ->take(10);
       return DataTables::of($companies)->make(true);
    }
}
