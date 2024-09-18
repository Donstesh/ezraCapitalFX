@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-header d-block">
                <h3>User Deposits</h3>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="order-table" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Deposit Method</th>
                            <th>Deposit Amount</th>
                            <th>Deposit Status</th>
                            <th>Deposit Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($deposits as $deposit)
                            <tr>
                                <td>{{ $deposit->user_id }}</td>
                                <td>{{ $deposit->deposit_method }}</td>
                                <td>{{ $deposit->amount }}</td>
                                <td>
                                    @if ($deposit->deposit_status == 'confirmed')
                                        <button type="button" class="btn btn-success" disabled><i class="ik ik-check-circle"></i>Confirmed</button>
                                    @elseif ($deposit->deposit_status == 'unconfirmed')
                                        <button type="button" class="btn btn-danger"><i class="ik ik-x"></i>Not Confirmed</button>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($deposit->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    <button type="button" class="btn btn-success process-btn" data-id="{{ $deposit->id }}" @if ($deposit->deposit_status == 'confirmed') disabled @endif><i class="ik ik-check-circle"></i>Process</button>
                                    <form id="update-status-form-{{ $deposit->id }}" method="POST" action="{{ route('admin.updateStatus') }}" style="display: none;">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $deposit->id }}">
                                        <input type="hidden" name="deposit_status" value="confirmed">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>Deposit Method</th>
                            <th>Deposit Amount</th>
                            <th>Deposit Status</th>
                            <th>Deposit Date</th>
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
        $('.process-btn').on('click', function () {
            var depositId = $(this).data('id');
            
            $.ajax({
                url: $('#update-status-form-' + depositId).attr('action'),
                type: 'POST',
                data: $('#update-status-form-' + depositId).serialize(),
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        window.location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection