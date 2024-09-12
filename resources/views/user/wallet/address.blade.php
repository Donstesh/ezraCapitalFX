@extends('layouts.userdash')

@section('content')
<style>
.text-large {
  font-size: 1.25em;
}
.copiable-text {
  cursor: pointer;
}
</style>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Wallet</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Wallet</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-10">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-5 col-md-5">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title"><span>My Wallets | </span></h5>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Wallets <span>| Listed</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Wallet</th>
                        <th scope="col">Address</th>
                        <th class="text-center" scope="col">Update / Add New</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><img src="assets/img/bitcoin.svg" alt="" height="30px">
                            BTC
                        </th>
                        <td class="text-large">
                            {{ $btc ? $btc->wallet_address : 'No wallet found' }}
                        </td>
                        <td class="text-large text-center">
                            <a href="" data-bs-toggle="modal" data-bs-target="#btcModal"><i class="bi bi-pencil-square me-2"></i></a>
                            <div class="modal fade" id="btcModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">BTC Wallet</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6><span class="strong">Update Wallet</span></h6>
                                        <p><span class="strong">{{ $btc ? $btc->wallet_address : 'No wallet found' }}</span></p>
                                        <form id="btcForm">
                                            @csrf
                                            <input type="hidden" name="wallet_name" class="form-control mt-3" value="btc">
                                            <input type="hidden" name="id" class="form-control mt-3" value="{{ $btc ? $btc->id : '' }}">
                                            <input type="text" name="wallet_address" class="form-control mt-3" placeholder="Enter new BTC Wallet Address">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button id="btcButton" type="button" class="btn btn-primary">Update Wallet</button>
                                    </div>
                                </div>
                                </div>
                            </div><!-- End btcModal Modal-->
                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><img src="assets/img/ethereum.svg" alt="" height="30px"> ETH</th>
                        <td class="text-large">
                            {{ $eth ? $eth->wallet_address : 'No wallet found' }}
                        </td>
                        <td class="text-large text-center">
                            <a href="" data-bs-toggle="modal" data-bs-target="#ethModal"><i class="bi bi-pencil-square me-2"></i></a>
                            <div class="modal fade" id="ethModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">ETH Wallet</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6><span class="strong">Update Wallet</span></h6>
                                        <p><span class="strong">{{ $eth ? $eth->wallet_address : 'No wallet found' }}</span></p>
                                        <form id="ethForm">
                                            @csrf
                                            <input type="hidden" name="wallet_name" class="form-control mt-3" value="eth">
                                            <input type="hidden" name="id" class="form-control mt-3" value="{{ $eth ? $eth->id : '' }}">
                                            <input type="text" name="wallet_address" class="form-control mt-3" placeholder="Enter new ETH Wallet Address">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button id="ethButton" type="button" class="btn btn-primary">Update Wallet</button>
                                    </div>
                                </div>
                                </div>
                            </div><!-- End ethModal Modal-->
                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><img src="assets/img/tether.svg" alt="" height="30px"> USDT</th>
                        <td class="text-large">
                            {{ $usdt ? $usdt->wallet_address : 'No wallet found' }}
                        </td>
                        <td class="text-large text-center">
                            <a href="" data-bs-toggle="modal" data-bs-target="#usdtModal"><i class="bi bi-pencil-square me-2"></i></a>
                            <div class="modal fade" id="usdtModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">USDT Wallet</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6><span class="strong">Update Wallet</span></h6>
                                        <p><span class="strong">{{ $usdt ? $usdt->wallet_address : 'No wallet found' }}</span></p>
                                        <form id="usdtForm">
                                            @csrf
                                            <input type="hidden" name="wallet_name" class="form-control mt-3" value="usdt">
                                            <input type="hidden" name="id" class="form-control mt-3" value="{{ $usdt ? $usdt->id : '' }}">
                                            <input type="text" name="wallet_address" class="form-control mt-3" placeholder="Enter new USDT Wallet Address">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button id="usdtButton" type="button" class="btn btn-primary">Update Wallet</button>
                                    </div>
                                </div>
                                </div>
                            </div><!-- End usdtModal Modal-->
                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><img src="assets/img/usd-coin.svg" alt="" height="30px"> USDC</th>
                        <td class="text-large">
                            {{ $usdc ? $usdc->wallet_address : 'No wallet found' }}
                        </td>
                        <td class="text-large text-center">
                            <a href="" data-bs-toggle="modal" data-bs-target="#usdcModal"><i class="bi bi-pencil-square me-2"></i></a>
                            <div class="modal fade" id="usdcModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">USDC Wallet</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6><span class="strong">Update Wallet</span></h6>
                                        <p><span class="strong">{{ $usdc ? $usdc->wallet_address : 'No wallet found' }}</span></p>
                                        <form id="usdcForm">
                                            @csrf
                                            <input type="hidden" name="wallet_name" class="form-control mt-3" value="usdc">
                                            <input type="hidden" name="id" class="form-control mt-3" value="{{ $usdc ? $usdc->id : '' }}">
                                            <input type="text" name="wallet_address" class="form-control mt-3" placeholder="Enter new USDC Wallet Address">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button id="usdcButton" type="button" class="btn btn-primary">Update Wallet</button>
                                    </div>
                                </div>
                                </div>
                            </div><!-- End usdcModal Modal-->
                        </td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to handle form submissions
        function updateWallet(formId, buttonId) {
            $(buttonId).click(function() {
                var formData = $(formId).serialize();
                $.ajax({
                    url: "{{ route('wallet.update') }}",
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(response) {
                        alert('An error occurred while updating the wallet address.');
                    }
                });
            });
        }

        // Call the function for each form and button
        updateWallet('#btcForm', '#btcButton');
        updateWallet('#ethForm', '#ethButton');
        updateWallet('#usdtForm', '#usdtButton');
        updateWallet('#usdcForm', '#usdcButton');
    });
</script>
@endsection
