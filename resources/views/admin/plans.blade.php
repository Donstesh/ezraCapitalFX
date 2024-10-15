@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-block">
                <h3>User Plans</h3>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="order-table" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>User Plan</th>
                            <th>Plan Amount</th>
                            <th>Plan Option</th>
                            <th>Plan Status</th>
                            <th>Trade</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($plans as $plan)
                            <tr>
                                <td>{{ $plan->user_id }}</td>
                                <td>{{ $plan->plan_selected }}</td>
                                <td>{{ $plan->plan_amount }}</td>
                                <td>{{ $plan->plan_option }}</td>
                                <td>{{ $plan->status }}</td>
                                <td>
                                    <!-- Start Trade Button -->
                                    <form action="{{ url('/start-trade/' . $plan->user_id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Start Trade</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>User Plan</th>
                            <th>Plan Amount</th>
                            <th>Plan Option</th>
                            <th>Plan Status</th>
                            <th>Trade</th>
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
