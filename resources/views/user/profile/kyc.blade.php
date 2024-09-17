@extends('layouts.userdash')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>KYC VERIFY</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
          <li class="breadcrumb-item">User</li>
          <li class="breadcrumb-item active">KYC Verify</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/user.png" alt="Profile" class="rounded-circle">
              <h2>{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}</h2>
              <h3>Trader Account</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#identity-docs">PERSONAL DETAILS</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#proof-of-residence">PROOF Of RESIDENCE</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#selfie-pane">SELFIE</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="identity-docs">
                  <h5 class="card-title">Account KYC Status</h5>

                @if ($status === 'pending')
                    <h4 class="justify-content-center fst-italic" style="color: red;">Not Verified
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.293 4.293a1 1 0 0 1 1.414 0L8 5.586l2.293-1.293a1 1 0 0 1 1.414 1.414L9.414 7l2.293 2.293a1 1 0 0 1-1.414 1.414L8 8.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L6.586 7 4.293 4.707a1 1 0 0 1 0-1.414z"/>
                        </svg>
                    </h4>
                @else
                    <h4 class="justify-content-center fst-italic" style="color: green;">Verified
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                        </svg>
                    </h4>
                @endif

                  <form id="kycForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-2">
                            <label for="exampleSelectGender" class="col-md-4 col-lg-3 col-form-label">Select Document</label>
                            <div class="col-md-8 col-lg-9">
                                <select name="document_1" class="form-control" id="exampleSelectGender">
                                    <option>-- Select Document Type --</option>
                                    <option>Government Issued Identity Card</option>
                                    <option>Passport</option>
                                    <option>Driving Licence</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="selectCountry" class="col-md-4 col-lg-3 col-form-label">Issuing Government</label>
                            <div class="col-md-8 col-lg-9">
                                <select name="document_1_govt" class="form-control" id="selectCountry">
                                    <option value="">-- Select Issuing Government --</option>
                                    <!-- Dynamically populate countries here -->
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="document_1_name" class="col-md-4 col-lg-3 col-form-label">Name on Document</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="text" name="document_1_name" class="form-control" id="nameOnDocument1" placeholder="Name on Document" required>
                            </div>
                        </div>

                        <div class="row mb-3" id="ssnContainer">
                            <label for="ssn" class="col-md-4 col-lg-3 col-form-label">SSN</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="text" name="ssn" class="form-control" id="ssn" placeholder="SSN For American Citizens">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="document_1_no" class="col-md-4 col-lg-3 col-form-label">Document Number</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="text" name="document_1_no" class="form-control" id="docNumber" placeholder="Document Number" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="document_1_image_front" class="col-md-4 col-lg-3 col-form-label">Front Side</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="file" name="document_1_image_front" class="form-control file-upload-info" id="doc1ImageFront" placeholder="Upload Image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="document_1_image_back" class="col-md-4 col-lg-3 col-form-label">Back Side</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="file" name="document_1_image_back" class="form-control file-upload-info" id="doc1ImageBack" placeholder="Upload Image">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="proof-of-residence">
                <h5 class="card-title">Proof Of Residence</h5>

                  <!-- proof-of-residence -->
                  <form id="kycResidenceForm" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-2">
                        <label for="exampleSelectGender" class="col-md-4 col-lg-3 col-form-label">Select Document</label>
                        <div class="col-md-8 col-lg-9">
                            <select name="document_2" class="form-control" id="exampleSelectGender">
                                <option>-- Select Document Type --</option>
                                <option>Utility Bill</option>
                                <option>Tax Complience</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label for="document_2_name" class="col-md-4 col-lg-3 col-form-label">Name on Document</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="text" name="document_2_name" class="form-control" id="exampleInputName1" placeholder="Name on Document" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label for="address" class="col-md-4 col-lg-3 col-form-label">Address on Document</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="text" name="address" class="form-control" id="addressOnDocument" placeholder="Document Number">
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label for="document_2_exp_date" class="col-md-4 col-lg-3 col-form-label">Expiry Date of Doc</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="date" name="document_2_exp_date" class="form-control" id="expDate" placeholder="Document Number">
                        </div>
                    </div>

                    <div class="row mb-3">
                      <label for="document_2_image" class="col-md-4 col-lg-3 col-form-label">Upload Document</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="file" name="document_2_image" class="form-control file-upload-info" id="doc2Image" placeholder="Upload Image">
                        </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="selfie-pane">
                <h5 class="card-title">Selfie Upload</h5>

                  <!-- proof-of-residence -->
                  <form id="kycSelfieForm" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                      <label for="document_3_selfie" class="col-md-4 col-lg-3 col-form-label">Upload Picture</label>
                        <div class="col-md-8 col-lg-9">
                            <input type="file" name="document_3_selfie" class="form-control file-upload-info" id="selfiePhoto" placeholder="Upload Picture" required>
                        </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#kycForm').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route("kyc.store") }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Extract and display a clean success message
                    alert(response.success || 'KYC submitted successfully.');
                    $('#kycForm')[0].reset();
                },
                error: function (response) {
                    // Extract and display error messages if any
                    var errors = response.responseJSON ? response.responseJSON.errors : ['An error occurred. Please try again.'];
                    alert('Error: ' + errors.join(', '));
                }
            });
        });
    });
    $(document).ready(function () {
        // Populate countries in the dropdown
        var countries = [
            'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria',
            'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan',
            'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia',
            'Cameroon', 'Canada', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo, Democratic Republic of the',
            'Congo, Republic of the', 'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic',
            'East Timor', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini', 'Ethiopia', 'Fiji',
            'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea',
            'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland',
            'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, North', 'Korea, South',
            'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania',
            'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius',
            'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia',
            'Nauru', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Macedonia', 'Norway', 'Oman',
            'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Qatar',
            'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe',
            'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia',
            'South Africa', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Sweden', 'Switzerland', 'Syria', 'Taiwan',
            'Tajikistan', 'Tanzania', 'Thailand', 'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu',
            'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City', 'Venezuela',
            'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe'
        ];
        var $selectCountry = $('#selectCountry');
        $.each(countries, function (index, country) {
            $selectCountry.append(new Option(country, country));
        });

        // Handle change event to show/hide SSN input
        $('#selectCountry').on('change', function () {
            var selectedCountry = $(this).val();
            if (selectedCountry === 'United States') {
                $('#ssnContainer').show(); // Show SSN input for USA
            } else {
                $('#ssnContainer').hide(); // Hide SSN input for other countries
            }
        });

        // Initial setup: hide SSN input if 'USA' is not selected
        if ($('#selectCountry').val() !== 'United States') {
            $('#ssnContainer').hide();
        }
    });
</script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#kycResidenceForm').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route("kyc.proof-of-residence") }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Extract and display a clean success message
                    alert(response.success || 'KYC Proof Of Residence submitted successfully.');
                    $('#kycResidenceForm')[0].reset();
                },
                error: function (response) {
                    // Extract and display error messages if any
                    var errors = response.responseJSON ? response.responseJSON.errors : ['An error occurred. Please try again.'];
                    alert('Error: ' + errors.join(', '));
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#kycSelfieForm').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route("kyc.selfie") }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Extract and display a clean success message
                    alert(response.success || 'KYC Selfie submitted successfully.');
                    $('#kycSelfieForm')[0].reset();
                },
                error: function (response) {
                    // Extract and display error messages if any
                    var errors = response.responseJSON ? response.responseJSON.errors : ['An error occurred. Please try again.'];
                    alert('Error: ' + errors.join(', '));
                }
            });
        });
    });
</script>
@endsection
