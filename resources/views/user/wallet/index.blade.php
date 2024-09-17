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
                                            <th scope="row"><img src="assets/img/bitcoin.svg" alt="" height="30px"> BTC</th>
                                            <td class="fw-bold text-large">{{$btc}}</td>
                                            <td class="text-large">0.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><img src="assets/img/ethereum.svg" alt="" height="30px"> ETH</th>
                                            <td class="fw-bold text-large">{{$eth}}</td>
                                            <td class="text-large">0.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><img src="assets/img/tether.svg" alt="" height="30px"> USDT</th>
                                            <td class="fw-bold text-large">{{$usdt}}</td>
                                            <td class="text-large">0.00</td>
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
document.addEventListener('DOMContentLoaded', function() {
    const methodSelect = document.getElementById('deposit-method');
    const detailsContainer = document.getElementById('deposit-details');
    let cryptoData = null; // Variable to store the fetched data

    // Function to fetch crypto prices and store them
    async function fetchCryptoPrices() {
        try {
            const response = await fetch('/api/crypto-prices');
            const text = await response.text();
            cryptoData = JSON.parse(text);
            console.log('Fetched Crypto Data:', cryptoData);
        } catch (error) {
            console.error('Error fetching prices:', error);
        }
    }

    // Fetch crypto prices on page load
    fetchCryptoPrices();

    // Function to update deposit method details
    function updateDepositMethod() {
        const method = methodSelect.value;

        if (method) {
            detailsContainer.classList.remove('d-none');
        } else {
            detailsContainer.classList.add('d-none');
            return;
        }

        let detailsHTML = '';

        switch (method) {
            case 'btc':
                detailsHTML = `
                    <p>Scan the QR code below or Click to copy Address to deposit BTC</p>
                    <img src="assets/img/qr_code.png" alt="BTC QR Code" height="250px" onerror="this.onerror=null; this.src='wallets/btc.jpeg'"> <br><br>
                    <p>Enter Amount in £(pounds) to calculate Amount of BTC to Send</p>
                    <input type="number" name="amount_in_gbp" id="btc-amount" class="form-control mt-3" placeholder="Enter amount to calculate deposit" required>
                    <h5>Amount in BTC: <span id="btc-amount-display"></span></h5>
                    <input type="hidden" id="btc-calculated-amount" name="amount" step="0.00000001" min="0.00000001">
                    <h5><span class="strong" data-bs-toggle="tooltip" title="Click to copy" onclick="copyToClipboard(this, 'bc1qzcm9nctqv5hngndqnj7pu2523ywunc5xyl9d5y')">(click to copy)BTC Address: <span class="copiable-text">bc1qzcm9nctqv5hngndqnj7pu2523ywunc5xyl9d5y</span></span></h5>
                `;
                break;
            case 'eth':
                detailsHTML = `
                    <p>Scan the QR code below or Click to copy Address to deposit ETH</p>
                    <img src="assets/img/qr_code.png" alt="ETH QR Code" height="250px" onerror="this.onerror=null; this.src='wallets/eth.jpeg'"> <br><br>
                    <p>Enter Amount in £(pounds) to calculate Amount of ETH to Send</p>
                    <input type="number" name="amount_in_gbp" id="eth-amount" class="form-control mt-3" placeholder="Enter amount to calculate deposit" required>
                    <h5>Amount in ETH: <span id="eth-amount-display"></span></h5>
                    <input type="hidden" id="eth-calculated-amount" name="amount" step="0.00000001" min="0.00000001">
                    <h5><span class="strong" data-bs-toggle="tooltip" title="Click to copy" onclick="copyToClipboard(this, '0x7886522615f0eb3d8dF52756E3b27DefedeCF7AF')">ETH Address: <span class="copiable-text">0x7886522615f0eb3d8dF52756E3b27DefedeCF7AF</span></span></h5>
                `;
                break;
            case 'usdt':
                detailsHTML = `
                    <p>Scan the QR code below or Click to copy Address to deposit USDT</p>
                    <img src="assets/img/qr_code.png" alt="USDT QR Code" height="250px" onerror="this.onerror=null; this.src='wallets/usdt.jpeg'"> <br><br>
                    <p>Enter Amount in £(pounds) to calculate Amount of USDT to Send</p>
                    <input type="number" name="amount_in_gbp" id="usdt-amount" class="form-control mt-3" placeholder="Enter amount to calculate deposit" required>
                    <h5>Amount in USDT: <span id="usdt-amount-display"></span></h5>
                    <input type="hidden" id="usdt-calculated-amount" name="amount" step="0.00000001" min="0.00000001">
                    <h5><span class="strong" data-bs-toggle="tooltip" title="Click to copy" onclick="copyToClipboard(this, '0x1234567890abcdef1234567890abcdef12345678')">USDT Address: <span class="copiable-text">0x1234567890abcdef1234567890abcdef12345678</span></span></h5>
                `;
                break;
        }

        detailsContainer.innerHTML = detailsHTML;

        const amountInput = document.getElementById(`${method}-amount`);
        const amountDisplay = document.getElementById(`${method}-amount-display`);
        const calculatedAmountField = document.getElementById(`${method}-calculated-amount`);

        if (amountInput) {
            amountInput.addEventListener('input', () => {
                const amount = parseFloat(amountInput.value);
                if (isNaN(amount) || amount <= 0) {
                    amountDisplay.textContent = '0.00';
                    calculatedAmountField.value = '';
                    return;
                }

                if (cryptoData) {
                    let priceInGbp = 0;

                    switch (method) {
                        case 'btc':
                            priceInGbp = cryptoData.bitcoin?.gbp || 0;
                            break;
                        case 'eth':
                            priceInGbp = cryptoData.ethereum?.gbp || 0;
                            break;
                        case 'usdt':
                            priceInGbp = cryptoData.tether?.gbp || 0;
                            break;
                    }

                    if (priceInGbp === 0) {
                        amountDisplay.textContent = 'Error';
                        calculatedAmountField.value = '';
                        return;
                    }

                    const priceInCrypto = amount / priceInGbp;
                    amountDisplay.textContent = priceInCrypto.toFixed(8);
                    calculatedAmountField.value = priceInCrypto.toFixed(8);
                } else {
                    amountDisplay.textContent = 'Data not available';
                    calculatedAmountField.value = '';
                }
            });
        }
    }

    // Add event listener to update deposit method when the selection changes
    if (methodSelect) {
        methodSelect.addEventListener('change', updateDepositMethod);
    }
});

function copyToClipboard(element, text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('Copied to clipboard');
    }).catch(err => {
        console.error('Failed to copy: ', err);
    });
}
// Initialize with empty details on modal show
document.getElementById('verticalycentered').addEventListener('shown.bs.modal', function() {
        document.getElementById('deposit-details').classList.add('d-none');
        document.getElementById('deposit-method').selectedIndex = 0; // Reset dropdown to default
    });
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('deposit-button').addEventListener('click', function() {
        var amountInput = document.querySelector('input[name="amount"]');
        var amount = amountInput ? amountInput.value : '';
        var method = document.getElementById('deposit-method').value;
        var amountInGbpInput = document.getElementById(`${method}-amount`);
        var amountInGbp = amountInGbpInput ? amountInGbpInput.value : '';
        var csrfToken = document.querySelector('input[name="_token"]').value;

        // Validate amounts
        if (!amount || amount <= 0) {
            alert('Please enter a valid deposit amount.');
            return;
        }
        if (!amountInGbp || amountInGbp <= 0) {
            alert('Please enter a valid amount in GBP.');
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
                    try {
                        var response = JSON.parse(xhr.responseText);
                        alert('Deposit Request Successful! Wait For Confirmation!');
                        var modalElement = document.getElementById('verticalycentered');
                        var modal = bootstrap.Modal.getInstance(modalElement);

                        if (modal) {
                            modal.hide();
                        } else {
                            new bootstrap.Modal(modalElement).hide();
                        }
                    } catch (e) {
                        console.error('Error parsing JSON response:', e);
                        alert('An error occurred while processing the response.');
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
            amount_in_gbp: amountInGbp, // Send the GBP amount to the server
            _token: csrfToken
        }));
    });
});

</script>
@endsection
