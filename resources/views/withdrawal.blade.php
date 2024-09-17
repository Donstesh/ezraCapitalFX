@extends('layouts.userdash')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Withdrwals</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Withdrwals</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

        <!-- Left side columns -->
        <div class="col-lg-10">
          <div class="row">

          <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Make a New Withdrwal</h5>
                <!-- Withdrawal Modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#withdrawalmodal">
                    New Withdrawal
                </button>
                <div class="modal fade" id="withdrawalmodal" tabindex="-1" aria-labelledby="withdrawalmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="withdrawalmodalLabel">Submit Withdrawal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="withdrawalForm" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="walletAddress" class="col-md-4 col-lg-3 col-form-label">Paste Wallet</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" name="wallet_id" class="form-control" id="walletAddress" placeholder="Paste Wallet Address" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3" id="ssnContainer">
                                        <label for="amount" class="col-md-4 col-lg-3 col-form-label">Amount</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter Amount in USD">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Send Request</button>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
                <!-- End  Withdrawal Modal -->
                </div>
            </div>
          </div>

            <!-- Reports -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Latest Withdrawal</h5>

                        <!-- Tab content -->
                        <div class="tab-content" id="myTabContent">
                            <!-- Table 1 -->
                            <div class="tab-pane fade show active" id="table1" role="tabpanel" aria-labelledby="table1-tab">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($withdrawals as $withdrawal)
                                        <tr>
                                            <td>{{$withdrawal->created_at}}</td>
                                            <td>{{$withdrawal->amount}}</td>
                                            <td>{{$withdrawal->status}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#withdrawalForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = $(this).serialize(); // Serialize form data

        $.ajax({
            url: '{{ route("withdrawals.store") }}', // Update with your route
            type: 'POST',
            data: formData,
            success: function(response) {
                alert('Withdrawal request submitted successfully');
                $('#withdrawalmodal').modal('hide'); // Correct ID here
                // Optionally clear the form
                $('#withdrawalForm')[0].reset();
                location.reload();
            },
            error: function(xhr) {
                alert('An error occurred while submitting the request');
                console.log(xhr.responseText); // Log error for debugging
            }
        });
    });
});
</script>
@endsection
