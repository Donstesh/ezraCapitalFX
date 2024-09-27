<?php

namespace App\Http\Controllers;

use App\Models\KycVerify;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class KycVerifyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Fetch the KYC record for the logged-in user
        $kyc = KycVerify::where('user_id', $user->id)->first();

        // Determine the status based on the KYC record existence and its status
        if (!$kyc) {
            $status = 'not_verified'; // No record found
        } elseif ($kyc->status === 'pending') {
            $status = 'pending'; // Record exists but is pending
        } elseif ($kyc->status === 'verified') {
            $status = 'verified'; // Record exists and is verified
        } else {
            $status = 'unknown'; // Default case if status is not recognized
        }

        // Return the view with status and user_balance
        return view('user.profile.kyc', [
            'status' => $status
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function personaDetails(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'document_1' => 'required|string',
            'document_1_govt' => 'required|string',
            'document_1_name' => 'required|string|max:255',
            'ssn' => 'nullable|string|max:20',
            'document_1_no' => 'required|string|max:50',
            'document_1_image_front' => 'required|file|mimes:jpeg,png,jpg|max:15360', // 15MB
            'document_1_image_back' => 'required|file|mimes:jpeg,png,jpg|max:15360',  // 15MB
        ]);

        $user = Auth::user();

        // Check if the user has an existing KYC record
        $existingKyc = KycVerify::where('user_id', $user->id)->first();

        if ($existingKyc) {
            // If status is pending, don't allow resubmission
            if ($existingKyc->status == 'pending') {
                return response()->json(['error' => 'KYC is currently under verification. Please wait for approval.'], 403);
            }

            // If status is approved, don't allow resubmission
            if ($existingKyc->status == 'approved') {
                return response()->json(['error' => 'KYC has already been approved.'], 403);
            }

            // If status is rejected, allow the user to resubmit
            if ($existingKyc->status == 'rejected') {
                // Optionally, delete the old rejected files
                if (file_exists(public_path('kyc-documents/' . $existingKyc->document_1_image_front))) {
                    unlink(public_path('kyc-documents/' . $existingKyc->document_1_image_front));
                }
                if (file_exists(public_path('kyc-documents/' . $existingKyc->document_1_image_back))) {
                    unlink(public_path('kyc-documents/' . $existingKyc->document_1_image_back));
                }
                // Continue to the upload and save new data
            }
        }

        // Proceed with file upload
        $timestamp = date('YmdHis');
        $fName = Str::slug($user->f_name);
        $lName = Str::slug($user->l_name);

        if ($documentImageFrontFile = $request->file('document_1_image_front')) {
            $destinationPath = 'kyc-documents/';
            $documentImageFront = "{$timestamp}_{$fName}_{$lName}_front." . $documentImageFrontFile->getClientOriginalExtension();
            $documentImageFrontFile->move(public_path($destinationPath), $documentImageFront);
        }

        if ($documentImageBackFile = $request->file('document_1_image_back')) {
            $destinationPath = 'kyc-documents/';
            $documentImageBack = "{$timestamp}_{$fName}_{$lName}_back." . $documentImageBackFile->getClientOriginalExtension();
            $documentImageBackFile->move(public_path($destinationPath), $documentImageBack);
        }

        // If the KYC exists and was rejected, update the record, otherwise create a new one
        if ($existingKyc && $existingKyc->status == 'rejected') {
            $existingKyc->update([
                'document_1' => $request->document_1,
                'document_1_govt' => $request->document_1_govt,
                'document_1_name' => $request->document_1_name,
                'ssn' => $request->ssn,
                'document_1_no' => $request->document_1_no,
                'document_1_image_front' => $documentImageFront,
                'document_1_image_back' => $documentImageBack,
                'status' => 'pending', // Reset status to pending
            ]);
        } else {
            KycVerify::create([
                'user_id' => $user->id,
                'f_name' => $user->f_name,
                'l_name' => $user->l_name,
                'email' => $user->email,
                'document_1' => $request->document_1,
                'document_1_govt' => $request->document_1_govt,
                'document_1_name' => $request->document_1_name,
                'ssn' => $request->ssn,
                'document_1_no' => $request->document_1_no,
                'document_1_image_front' => $documentImageFront,
                'document_1_image_back' => $documentImageBack,
                'status' => 'pending',
            ]);
        }

        return response()->json(['success' => 'KYC submitted successfully.']);
    }


    public function proofOfResidence(Request $request)
    {
        $user = Auth::user();

        // Validate the incoming request data
        $request->validate([
            'document_2' => 'required|string',
            'document_2_name' => 'required|string',
            'address' => 'required|string|max:255',
            'document_2_image' => 'required|file|mimes:jpeg,png,jpg|max:15360',
            'document_2_exp_date' => 'nullable|date',
        ]);

        // Prepare file upload variables
        $timestamp = date('YmdHis');
        $fName = Str::slug($user->f_name);
        $lName = Str::slug($user->l_name);

        // Handle document_2_image file upload
        if ($doc2image = $request->file('document_2_image')) {
            $destinationPath = 'kyc-documents/';
            $kycImage = "{$timestamp}_{$fName}_{$lName}_residence." . $doc2image->getClientOriginalExtension();
            $doc2image->move(public_path($destinationPath), $kycImage);
        }

        // Retrieve user's KYC record
        $kyc = KycVerify::where('user_id', $user->id)->first();

        if ($kyc) {
            // Prevent updating if status is pending
            if ($kyc->status == 'pending') {
                return response()->json(['error' => 'KYC is under verification. Please wait until it is reviewed.'], 403);
            }

            // Allow updating if the KYC status is rejected
            if ($kyc->status == 'rejected' || $kyc->status == 'approved_with_changes') {
                // Optionally, delete the old file if needed
                if ($kyc->document_2_image && file_exists(public_path('kyc-documents/' . $kyc->document_2_image))) {
                    unlink(public_path('kyc-documents/' . $kyc->document_2_image));
                }

                // Update the KYC proof of residence details
                $kyc->update([
                    'document_2' => $request->document_2,
                    'document_2_name' => $request->document_2_name,
                    'address' => $request->address,
                    'document_2_exp_date' => $request->document_2_exp_date,
                    'document_2_image' => $kycImage,
                    'status' => 'pending', // Reset status to pending after upload
                ]);

                return response()->json(['success' => 'KYC Proof of Residence updated successfully.']);
            }

            // If status is approved, prevent further changes
            if ($kyc->status == 'approved') {
                return response()->json(['error' => 'KYC has been approved. Further updates are not allowed.'], 403);
            }

        } else {
            // If no KYC record exists
            return response()->json(['error' => 'KYC record not found.'], 404);
        }
    }

    public function selfie(Request $request)
    {
        // Validate the selfie image
        $request->validate([
            'document_3_selfie' => 'required|file|mimes:jpeg,png,jpg|max:15360',
        ]);

        $user = Auth::user();

        // Prepare file upload variables
        $timestamp = date('YmdHis');
        $fName = Str::slug($user->f_name);
        $lName = Str::slug($user->l_name);

        // Handle the selfie image file upload
        if ($selfieImageFile = $request->file('document_3_selfie')) {
            $destinationPath = 'kyc-documents/';
            $selfieImage = "{$timestamp}_{$fName}_{$lName}_selfie." . $selfieImageFile->getClientOriginalExtension();
            $selfieImageFile->move(public_path($destinationPath), $selfieImage);
        }

        // Retrieve the user's KYC record
        $kyc = KycVerify::where('user_id', $user->id)->first();

        if ($kyc) {
            // Prevent updating if status is pending
            if ($kyc->status == 'pending') {
                return response()->json(['error' => 'KYC is under verification. Please wait until it is reviewed.'], 403);
            }

            // Allow updating if the KYC status is rejected or changes are required
            if ($kyc->status == 'rejected' || $kyc->status == 'approved_with_changes') {
                // Optionally, delete the old selfie file if needed
                if ($kyc->document_3_selfie && file_exists(public_path('kyc-documents/' . $kyc->document_3_selfie))) {
                    unlink(public_path('kyc-documents/' . $kyc->document_3_selfie));
                }

                // Update the KYC selfie
                $kyc->update([
                    'document_3_selfie' => $selfieImage,
                    'status' => 'pending', // Reset status to pending after updating selfie
                ]);

                return response()->json(['success' => 'KYC Selfie updated successfully.']);
            }

            // If status is approved, prevent further changes
            if ($kyc->status == 'approved') {
                return response()->json(['error' => 'KYC has been approved. Further updates are not allowed.'], 403);
            }
        } else {
            // If no KYC record exists
            return response()->json(['error' => 'KYC record not found.'], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KycVerify $kycVerify)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KycVerify $kycVerify)
    {
        //
    }
}
