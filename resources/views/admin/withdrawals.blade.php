@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-block">
                <h3>User Withdrawals</h3>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="order-table" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Withdrawal Wallet</th>
                            <th>Withdrawal Amount</th>
                            <th>Withdrawal Status</th>
                            <th>Withdrawal Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($withdrawals as $withdrawal)
                            <tr>
                                <td>{{ $withdrawal->user_id }}</td>
                                <td>{{ $withdrawal->wallet_id }}</td>
                                <td>{{ $withdrawal->amount }}</td>
                                <td>
                                    @if ($withdrawal->status == 'confirmed')
                                        <button type="button" class="btn btn-success" disabled><i class="ik ik-check-circle"></i>Confirmed</button>
                                    @elseif ($withdrawal->status == 'unconfirmed')
                                        <button type="button" class="btn btn-danger"><i class="ik ik-x"></i>Not Confirmed</button>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($withdrawal->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    <button type="button" class="btn btn-success process-btn" data-id="{{ $withdrawal->id }}" @if ($withdrawal->status == 'confirmed') disabled @endif><i class="ik ik-check-circle"></i>Process</button>
                                    <form id="update-status-form-{{ $withdrawal->id }}" method="POST" action="{{ route('admin.updateWithdrawalStatus') }}" style="display: none;">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $withdrawal->id }}">
                                        <input type="hidden" name="status" value="confirmed">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Withdrawal Wallet</th>
                            <th>Withdrawal Amount</th>
                            <th>Withdrawal Status</th>
                            <th>Withdrawal Date</th>
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
        // Handle click event on buttons with class 'process-btn'
        $('.process-btn').on('click', function () {
            var depositId = $(this).data('id'); // Get deposit ID from button data attribute

            // Send AJAX request to update deposit status
            $.ajax({
                url: $('#update-status-form-' + depositId).attr('action'), // Get form action URL dynamically
                type: 'POST',
                data: $('#update-status-form-' + depositId).serialize(), // Serialize form data
                success: function (response) {
                    if (response.success) {
                        // Show success message and reload the page
                        alert(response.message);
                        window.location.reload();
                    } else {
                        // Handle the case when success flag is false
                        alert('Failed to update deposit status.');
                    }
                },
                error: function (xhr, status, error) {
                    // Handle any errors that occur during the AJAX request
                    console.error('Error:', error);  // Log the error to the console
                    console.error('Response:', xhr.responseText);  // Log the response
                    alert('An error occurred while updating the deposit status.');
                }
            });
        });
    });
</script>
@endsection
