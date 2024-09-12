@extends('layouts.userdash')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Copy Trading</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Copy Trading</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-10">
          <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Traders <span>| Copy</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Return Rate</th>
                        <th scope="col">Followers</th>
                        <th scope="col">Profit Share</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/emma.jpg" alt="" class="rounded-circle"></a></th>
                        <td><a href="#" class="text-primary fw-bold">Emma Harrison <img src="images/verify.png" height="28px" alt="" class="rounded-circle"></a></td>
                        <td>64%</td>
                        <td class="fw-bold">124</td>
                        <td>20%</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/jackson.jpg" alt="" class="rounded-circle"></a></th>
                        <td><a href="#" class="text-primary fw-bold">Jackson Lee <img src="images/verify.png" height="28px" alt="" class="rounded-circle"></a></td>
                        <td>46%</td>
                        <td class="fw-bold">98</td>
                        <td>40%</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/oliver.jpg" alt="" class="rounded-circle"></a></th>
                        <td><a href="#" class="text-primary fw-bold">Olivia Taylor </a></td>
                        <td>59%</td>
                        <td class="fw-bold">74</td>
                        <td>35%</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/sofia.jpg" alt="" class="rounded-circle"></a></th>
                        <td><a href="#" class="text-primary fw-bold">Sophia Martinez <img src="images/verify.png" height="28px" alt="" class="rounded-circle"></a></td>
                        <td>32%</td>
                        <td class="fw-bold">163</td>
                        <td>15%</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/liam.jpg" alt="" class="rounded-circle"></a></th>
                        <td><a href="#" class="text-primary fw-bold">Liam Johnson <img src="images/verify.png" height="28px" alt="" class="rounded-circle"></a></td>
                        <td>79%</td>
                        <td class="fw-bold">441</td>
                        <td>20%</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/lucas.jpg" alt="" class="rounded-circle"></a></th>
                        <td><a href="#" class="text-primary fw-bold">Lucas White </a></td>
                        <td>49%</td>
                        <td class="fw-bold">41</td>
                        <td>25%</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/noah.jpg" alt="" class="rounded-circle"></a></th>
                        <td><a href="#" class="text-primary fw-bold">Noah Ramirez <img src="images/verify.png" height="28px" alt="" class="rounded-circle"></a></td>
                        <td>84%</td>
                        <td class="fw-bold">608</td>
                        <td>15%</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/william.jpg" alt="" class="rounded-circle"></a></th>
                        <td><a href="#" class="text-primary fw-bold">William Carter </a></td>
                        <td>59%</td>
                        <td class="fw-bold">209</td>
                        <td>20%</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/alex.jpg" alt="" class="rounded-circle"></a></th>
                        <td><a href="#" class="text-primary fw-bold">Alexander Scott </a></td>
                        <td>70%</td>
                        <td class="fw-bold">100</td>
                        <td>10%</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/david.jpg" alt="" class="rounded-circle"></a></th>
                        <td><a href="#" class="text-primary fw-bold">David Hall <img src="images/verify.png" height="28px" alt="" class="rounded-circle"></a></td>
                        <td>56%</td>
                        <td class="fw-bold">19</td>
                        <td>40%</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/sam.jpg" alt="" class="rounded-circle"></a></th>
                        <td><a href="#" class="text-primary fw-bold">Samuel Green <img src="images/verify.png" height="28px" alt="" class="rounded-circle"></a></td>
                        <td>79%</td>
                        <td class="fw-bold">368</td>
                        <td>20%</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/james.jpg" alt="" class="rounded-circle"></a></th>
                        <td><a href="#" class="text-primary fw-bold">James Allen <img src="images/verify.png" height="28px" alt="" class="rounded-circle"></a></td>
                        <td>80%</td>
                        <td class="fw-bold">790</td>
                        <td>20%</td>
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
@endsection
