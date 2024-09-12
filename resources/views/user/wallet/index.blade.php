@extends('layouts.userdash')

@section('content')
<style>
.text-large {
  font-size: 1.65em;

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
                  <h5 class="card-title"><span>Balance | </span>BTC {{$btc}}</h5>
                </div>

              </div>
                <!-- Make Deposit Modal -->
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                <i class="bi bi-box-arrow-in-down me-2"></i>
                Make Deposit
                </button>
                <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Added modal-lg class here -->
                    <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title">Make Deposit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="deposit-form">
                        <div class="modal-body">
                            <label for="deposit-method">Select Deposit Method:</label>
                            <select id="deposit-method" name="deposit_method" class="form-select" onchange="updateDepositMethod()">
                                <option value="" selected disabled>Choose...</option>
                                <option value="btc">BTC</option>
                                <option value="eth">ETH</option>
                                <option value="usdt">USDT</option>
                                <option value="usdc">USDC</option>
                            </select>
                            <!-- Center aligned spinner -->
                            <div class="d-flex justify-content-center mt-3">
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div><!-- End Center aligned spinner -->
                            <div id="deposit-details" class="mt-4 d-none">
                                <!-- Initial deposit details will be populated by JavaScript -->
                            </div>
                            <!-- Hidden CSRF token field -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button id="deposit-button" type="button" class="btn btn-primary">Send For Confirmation</button>
                        </div>
                    </form>

                    </div>
                </div>
                </div><!-- End Make Deposit Modal-->
            </div><!-- End Sales Card -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Assets <span>| Listed</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Currency</th>
                        <th scope="col">Balance</th>
                        <th scope="col">In USD</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><img src="assets/img/bitcoin.svg" alt="" height="30px">
                            BTC
                        </th>
                        <td class="fw-bold text-large">{{$btc}}</td>
                        <td class="text-large">11.31</td>
                        <td class="text-large">
                            <a href=""><i class="bi bi-send me-4"></i></a>
                            <a href=""><i class="bi bi-box-arrow-in-down me-4"></i></a>
                            <a href=""><i class="bi bi-arrow-repeat me-4"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><img src="assets/img/ethereum.svg" alt="" height="30px"> ETH</th>
                        <td class="fw-bold text-large">{{$eth}}</td>
                        <td class="text-large"> 0</td>
                        <td class="text-large">
                            <a href=""><i class="bi bi-send me-4"></i></a>
                            <a href=""><i class="bi bi-box-arrow-in-down me-4"></i></a>
                            <a href=""><i class="bi bi-arrow-repeat me-4"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><img src="assets/img/tether.svg" alt="" height="30px"> USDT</th>
                        <td class="fw-bold text-large">{{$usdt}}</td>
                        <td class="text-large">0</td>
                        <td class="text-large">
                            <a href=""><i class="bi bi-send me-4"></i></a>
                            <a href=""><i class="bi bi-box-arrow-in-down me-4"></i></a>
                            <a href=""><i class="bi bi-arrow-repeat me-4"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><img src="assets/img/usd-coin.svg" alt="" height="30px"> USDC</th>
                        <td class="fw-bold text-large">{{$usdc}}</td>
                        <td class="text-large">0</td>
                        <td class="text-large">
                            <a href=""><i class="bi bi-send me-4"></i></a>
                            <a href=""><i class="bi bi-box-arrow-in-down me-4"></i></a>
                            <a href=""><i class="bi bi-arrow-repeat me-4"></i></a>
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
  <script>
  function updateDepositMethod() {
    const method = document.getElementById('deposit-method').value;
    const detailsContainer = document.getElementById('deposit-details');

        if (method) {
            detailsContainer.classList.remove('d-none');
        } else {
            detailsContainer.classList.add('d-none');
        }

        let detailsHTML = '';

        switch (method) {
            case 'btc':
                detailsHTML = `
                    <p>Scan the QR code below or Click to copy Address to deposit BTC</p>
                    <img src="assets/img/qr_code.png" alt="BTC QR Code" height="250px" onerror="this.onerror=null; this.src='assets/img/qr_code.png'"> <br><br>
                    <h5><span class="strong" data-bs-toggle="tooltip" title="Click to copy" onclick="copyToClipboard(this, '1Lbcfr7sAHTD9CgdQo3HTMTkV8LK4ZnX71')">BTC Address: <span class="copiable-text">1Lbcfr7sAHTD9CgdQo3HTMTkV8LK4ZnX71</span></span></h5>
                    <input type="number" name="amount" class="form-control mt-3" placeholder="Enter amount to deposit" step="0.00000001" min="0.00000001" required>
                `;
                break;
            case 'eth':
                detailsHTML = `
                    <p>Scan the QR code below or Click to copy Address to deposit ETH</p>
                    <img src="assets/img/qr_code.png" alt="ETH QR Code" height="250px" onerror="this.onerror=null; this.src='assets/img/qr_code.png'"> <br><br>
                    <h5><span class="strong" data-bs-toggle="tooltip" title="Click to copy" onclick="copyToClipboard(this, '0xAbC123Ef456Gh789IjkL012MnOp345QrSt678UvWx')">ETH Address: <span class="copiable-text">0xAbC123Ef456Gh789IjkL012MnOp345QrSt678UvWx</span></span></h5>
                    <input type="number" name="amount" class="form-control mt-3" placeholder="Enter amount to deposit" step="0.00000001" min="0.00000001" required>
                `;
                break;
            case 'usdt':
                detailsHTML = `
                    <p>Scan the QR code below or Click to copy Address to deposit USDT</p>
                    <img src="assets/img/qr_code.png" alt="USDT QR Code" height="250px" onerror="this.onerror=null; this.src='assets/img/qr_code.png'"> <br><br>
                    <h5><span class="strong" data-bs-toggle="tooltip" title="Click to copy" onclick="copyToClipboard(this, 'TAbC123Ef456Gh789IjkL012MnOp345QrSt678UvWx')">USDT Address: <span class="copiable-text">TAbC123Ef456Gh789IjkL012MnOp345QrSt678UvWx</span></span></h5>
                    <input type="number" name="amount" class="form-control mt-3" placeholder="Enter amount to deposit" step="0.00000001" min="0.00000001" required>
                `;
                break;
            case 'usdc':
                detailsHTML = `
                    <p>Scan the QR code below or Click to copy Address to deposit USDC</p>
                    <img src="assets/img/qr_code.png" alt="USDC QR Code" height="250px" onerror="this.onerror=null; this.src='assets/img/qr_code.png'"> <br><br>
                    <h5><span class="strong" data-bs-toggle="tooltip" title="Click to copy" onclick="copyToClipboard(this, '0xCdE123Ff456Gh789IjkL012MnOp345QrSt678UvWx')">USDC Address: <span class="copiable-text">0xCdE123Ff456Gh789IjkL012MnOp345QrSt678UvWx</span></span></h5>
                    <input type="number" name="amount" class="form-control mt-3" placeholder="Enter amount to deposit" step="0.00000001" min="0.00000001" required>
                `;
                break;
            default:
                detailsHTML = '<p>Please select a deposit method.</p>';
        }

        detailsContainer.innerHTML = detailsHTML;
        // Initialize Bootstrap tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }

    async function copyToClipboard(element, text) {
        try {
            await navigator.clipboard.writeText(text);

            // Show tooltip with "Copied!" message
            var tooltip = bootstrap.Tooltip.getInstance(element);
            tooltip.hide();
            element.setAttribute('data-bs-original-title', 'Copied!');
            tooltip.show();

            // Reset tooltip title after a short delay
            setTimeout(function() {
                element.setAttribute('data-bs-original-title', 'Click to copy');
            }, 2000);
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    }

    // Initialize with empty details on modal show
    document.getElementById('verticalycentered').addEventListener('shown.bs.modal', function() {
        document.getElementById('deposit-details').classList.add('d-none');
        document.getElementById('deposit-method').selectedIndex = 0; // Reset dropdown to default
    });

  let inactivityTimer;

  function startInactivityTimer() {
    // Clear any existing timer
    clearTimeout(inactivityTimer);

    // Set a new timer to close the modal after 5 minutes (300,000 milliseconds)
    inactivityTimer = setTimeout(function() {
      console.log('Inactivity timer triggered. Closing modal.');
      const modal = bootstrap.Modal.getInstance(document.getElementById('verticalycentered'));
      if (modal) {
        modal.hide(); // Close the modal
      }
    }, 300000); // 5 minutes
  }

  function resetInactivityTimer() {
    console.log('User interaction detected. Resetting timer.');
    startInactivityTimer();
  }

  // Initialize the timer when the modal is shown
  document.getElementById('verticalycentered').addEventListener('shown.bs.modal', function() {
    startInactivityTimer();
  });

  // Reset timer on any interaction within the modal
  document.getElementById('verticalycentered').addEventListener('click', resetInactivityTimer);
  document.getElementById('deposit-method').addEventListener('change', resetInactivityTimer);
  document.getElementById('deposit-details').addEventListener('input', resetInactivityTimer);

  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('deposit-button').addEventListener('click', function() {
        var amountInput = document.querySelector('input[name="amount"]');
        var amount = amountInput.value;
        var method = document.getElementById('deposit-method').value;
        var csrfToken = document.querySelector('input[name="_token"]').value;

        // Validate amount
        if (!amount || amount <= 0) {
            alert('Please enter a valid deposit amount.');
            return;
        }

        // Send AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route("deposit.request") }}', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert('Deposit Request Successful! Wait For Confirmation!');
                    var response = JSON.parse(xhr.responseText);

                    var modalElement = document.getElementById('verticalycentered');
                    var modal = bootstrap.Modal.getInstance(modalElement);

                    if (modal) {
                        modal.hide();
                    } else {
                        modal = new bootstrap.Modal(modalElement);
                        modal.hide();
                    }
                } else {
                    alert('An error occurred. Please try again.');
                    console.error(xhr.responseText);
                }
            }
        };
        xhr.send(JSON.stringify({
            amount: amount,
            deposit_method: method,
            _token: csrfToken
        }));
    });
});
</script>
@endsection
