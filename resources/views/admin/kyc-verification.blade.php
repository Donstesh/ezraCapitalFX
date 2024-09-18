@extends('layouts.admin')

@section('content')
<style>
    .table-user-thumb {
    width: 50px;
    height: 50px;
    cursor: pointer;
    object-fit: cover;
}

</style>
<div class="main-content">
    <div class="container-fluid">
        <!-- Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Document Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" src="" class="img-fluid" alt="KYC Document">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header d-block">
                <h3>User KYC Verification</h3>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="order-table" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>User Country</th>
                            <th>SSN USA Res</th>
                            <th>Identity Front</th>
                            <th>Identity Back</th>
                            <th>Proof Of Residence</th>
                            <th>Selfie</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($userskyc as $kyc)
                            <tr>
                                <td>{{ $kyc->f_name }} {{ $kyc->l_name }}</td>
                                <td>{{ $kyc->document_1_govt }}</td>
                                <td>{{ $kyc->ssn }}</td>
                                <td>
                                    <img src="{{ asset('kyc-documents/' . $kyc->document_1_image_front) }}" class="table-user-thumb" alt="" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('kyc-documents/' . $kyc->document_1_image_front) }}">
                                </td>
                                <td>
                                    <img src="{{ asset('kyc-documents/' . $kyc->document_1_image_back) }}" class="table-user-thumb" alt="" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('kyc-documents/' . $kyc->document_1_image_back) }}">
                                </td>
                                <td>
                                    <img src="{{ asset('kyc-documents/' . $kyc->document_2_image) }}" class="table-user-thumb" alt="" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('kyc-documents/' . $kyc->document_2_image) }}">
                                </td>
                                <td>
                                    <img src="{{ asset('kyc-documents/' . $kyc->document_3_selfie) }}" class="table-user-thumb" alt="" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('kyc-documents/' . $kyc->document_3_selfie) }}">
                                </td>
                                <td>
                                    @if ($kyc->status == 'pending')
                                        <button type="button" class="btn btn-warning" disabled><i class="ik ik-check-circle"></i>Not Approved</button>
                                    @elseif ($kyc->status == 'verified')
                                        <button type="button" class="btn btn-success" disabled><i class="ik ik-x"></i>Approved</button>
                                    @elseif ($kyc->status == 'rejected')
                                        <button type="button" class="btn btn-danger" disabled><i class="ik ik-x"></i>Rejected</button>
                                    @endif
                                </td>
                                <td>
                                    <!-- Approve button -->
                                    <button type="button" class="btn btn-success process-btn" data-id="{{ $kyc->id }}" data-status="verified" @if ($kyc->status == 'verified') disabled @endif>
                                        Approve KYC
                                    </button>
                                    <!-- Reject button -->
                                    <button type="button" class="btn btn-danger process-btn" data-id="{{ $kyc->id }}" data-status="rejected" @if ($kyc->status == 'rejected') disabled @endif>
                                        Reject KYC
                                    </button>

                                    <!-- Hidden forms for Approve and Reject -->
                                    <form id="update-status-form-verified-{{ $kyc->id }}" method="POST" action="{{ route('admin.kyc-verify') }}" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $kyc->id }}">
                                        <input type="hidden" name="status" value="verified">
                                    </form>

                                    <form id="update-status-form-rejected-{{ $kyc->id }}" method="POST" action="{{ route('admin.kyc-verify') }}" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $kyc->id }}">
                                        <input type="hidden" name="status" value="rejected">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>User Country</th>
                            <th>SSN USA Res</th>
                            <th>Identity Front</th>
                            <th>Identity Back</th>
                            <th>Proof Of Residence</th>
                            <th>Selfie</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Event handler for all buttons with class 'process-btn'
        $('.process-btn').on('click', function () {
            var kycId = $(this).data('id'); // Get KYC ID
            var status = $(this).data('status'); // Get status (verified or rejected)

            // Select the specific form based on the action
            var actionForm = $('#update-status-form-' + status + '-' + kycId);

            $.ajax({
                url: actionForm.attr('action'), // Get the form action URL
                type: 'POST',
                data: actionForm.serialize(), // Serialize form data
                success: function (response) {
                    if (response.success) {
                        alert(response.message); // Show success message
                        window.location.reload(); // Reload page to reflect changes
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText); // Log error for debugging
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#imageModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var imageSrc = button.data('image'); // Extract the image URL from data-* attribute
            var modal = $(this);
            modal.find('#modalImage').attr('src', imageSrc); // Update the modal's image source
        });
    });
</script>
@endsection