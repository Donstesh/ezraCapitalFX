@extends('layouts.admin')

@section('content')

<div class="main-content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header d-block">
                <h3>Registered Users</h3>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="order-table" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Phone</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->f_name }} {{ $user->l_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <a href="{{ route('admin.user.delete', ['id' => $user->id]) }}" class="btn btn-danger">
                                        <i class="ik ik-trash-2"></i>
                                    </a>
                                    <a data-id="{{ $user->id }}" class="btn btn-primary open-mail-modal" data-toggle="modal" data-target="#mailModal">
                                        <i class="ik ik-mail"></i>
                                    </a>
                                    <a data-id="{{ $user->id }}" class="btn btn-success open-balance-modal" data-toggle="modal" data-target="#addBalance">
                                        <i class="ik ik-plus"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Phone</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>

                   <!-- Mail Modal -->
                    <div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="mailModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <form class="forms-sample" id="new-email">
                                @csrf
                                <input type="hidden" name="recipientId" id="recipientId"> <!-- Hidden field for recipient user ID -->
                                <input type="hidden" name="userEmail" id="userEmail"> <!-- Hidden field for user email -->
                                <input type="hidden" name="userFullName" id="userFullName"> <!-- Hidden field for user full name -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="mailModalLabel">Send Email</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-header"><h3>Enter Email Details</h3></div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="inputSubject">Subject</label>
                                                    <input type="text" name="title" class="form-control" id="inputSubject" placeholder="Subject" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipientNameDisplay">Recipient Name</label>
                                                    <input type="text" class="form-control" id="recipientNameDisplay" placeholder="Recipient Name" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipientEmailDisplay">Recipient Email</label>
                                                    <input type="email" class="form-control" id="recipientEmailDisplay" placeholder="Recipient Email" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Body</label>
                                                    <textarea class="form-control" name="description" id="description" rows="8" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send Email</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Add Balance Modal -->
                    <div class="modal fade" id="addBalance" tabindex="-1" role="dialog" aria-labelledby="addBalanceModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <form class="forms-sample" id="new-balance">
                                @csrf
                                <input type="hidden" name="user_id" id="userId"> <!-- Hidden field for user ID -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addBalanceModalLabel">Add Account Balance</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-header"><h3>User Info</h3></div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="userName">User Name</label>
                                                    <input type="text" class="form-control" id="userName" placeholder="User Name" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="userEmail">User Email</label>
                                                    <input type="email" class="form-control" id="userEmail" placeholder="User Email" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="balanceAmount">Amount (GBP)</label>
                                                    <input type="text" name="amount_in_gbp" class="form-control" id="balanceAmount" placeholder="Amount" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Update Balance</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.open-mail-modal', function() {
        var userId = $(this).data('id');
        $('#recipientId').val(userId); // Set recipient ID

        // AJAX request to fetch user data for email modal
        $.ajax({
            url: '/admin/user/' + userId,
            method: 'GET',
            success: function(data) {
                $('#recipientId').val(data.id); // Set recipient ID
                $('#recipientNameDisplay').val(data.f_name + ' ' + data.l_name); // Set recipient name
                $('#recipientEmailDisplay').val(data.email); // Set recipient email
                $('#userEmail').val(data.email); // Set hidden userEmail
                $('#userFullName').val(data.f_name + ' ' + data.l_name); // Set hidden userFullName
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });

    $(document).on('click', '.open-balance-modal', function() {
        var userId = $(this).data('id');
        $('#userId').val(userId); // Set the hidden user ID

        // AJAX request to fetch user data for balance modal
        $.ajax({
            url: '/admin/user/' + userId,
            method: 'GET',
            success: function(data) {
                $('#userName').val(data.f_name + ' ' + data.l_name); // Set user name
                $('#userEmail').val(data.email); // Set user email
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });

    // Handle email form submission
    $('#new-email').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Gather form data
        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: '/admin/email/send', // Update this URL to your actual route
            method: 'POST',
            data: formData,
            success: function(response) {
                alert(response.message); // Notify on success
                $('#mailModal').modal('hide'); // Close modal
                $('#new-email')[0].reset(); // Reset form
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                // Handle errors (you can show them in a user-friendly way)
                console.error(errors);
                alert(errors.userEmail ? errors.userEmail[0] : 'An error occurred.');
            }
        });
    });

    // Handle add balance form submission
    $('#new-balance').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        $.ajax({
            url: '/admin/balance/store', // Your route to store balance
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response.message); // Show success message
                $('#addBalance').modal('hide'); // Hide modal
                $('#new-balance')[0].reset(); // Reset form fields
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('An error occurred while adding the balance.');
            }
        });
    });
</script>

@endsection
