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
                <div class="modal fade" id="withdrawalmodal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Submit Withdrawal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    </div>
                </div><!-- End  Withdrawal Modal -->

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
                                            <th><b>Symbol</b></th>
                                            <th>Amount</th>
                                            <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>BTC</td>
                                            <td>$2150</td>
                                            <td>2024/29/09</td>
                                            <td>complete</td>
                                        </tr>
                                        <tr>
                                            <td>XAUUSD</td>
                                            <td>$200</td>
                                            <td>2024/29/09</td>
                                            <td>pending</td>
                                        </tr>
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
@endsection
