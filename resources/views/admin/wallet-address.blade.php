@extends('layouts.admin')
  
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-slack bg-blue"></i>
                        <div class="d-inline">
                            <h5>Wallet Addresses</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newWalletModal"><i class="ik ik-plus-square"></i>New Wallet</button>
                <div class="modal fade" id="newWalletModal" tabindex="-1" role="dialog" aria-labelledby="newWalletModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <form class="forms-sample" id="new-wallet">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newWalletModalLabel">Add New Wallet</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-header"><h3>Wallet Details</h3></div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Wallet image</label>
                                                <input type="file" name="qr_image" class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                    <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputWalletName">Wallet Name</label>
                                                <input type="text" name="wallet_name" class="form-control" id="inputWalletName" placeholder="Wallet Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputWalletAddress">Wallet Address</label>
                                                <input type="text" name="wallet_address" class="form-control" id="inputWalletAddress" placeholder="Wallet Address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="separator mb-20"></div>

                <div class="row layout-wrap" id="layout-wrap">
                    @foreach($wallets as $wallet)
                    <div class="col-12 list-item list-item-thumb">
                        <div class="card d-flex flex-row mb-3">
                            <a class="d-flex card-img mr-5" href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem">
                                <img src="{{ asset($wallet->qr_image) }}" alt="QR Code" class="list-thumbnail responsive border-0">
                                
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero card-content">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-1" href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem">
                                        {{$wallet->wallet_address}}
                                    </a>
                                    <p class="mb-1 text-muted text-small category w-30 w-xs-100"><strong>{{$wallet->wallet_name}}</strong></p>
                                </div>
                                <div class="list-actions w-15">
                                    <a href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem"><i class="ik ik-eye"></i></a>
                                    <a href="layout-edit-item.html"><i class="ik ik-edit-2"></i></a>
                                    <a href="{{route('admin.wallet.delete',['id'=>$wallet->id])}}" class="list-delete"><i class="ik ik-trash-2"></i></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>
<aside class="right-sidebar">
    <div class="sidebar-chat" data-plugin="chat-sidebar">
        <div class="sidebar-chat-info">
            <h6>Chat List</h6>
            <form class="mr-t-10">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search for friends admin."> 
                    <i class="ik ik-search"></i>
                </div>
            </form>
        </div>
        <div class="chat-list">
            <div class="list-group row">
                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Gene Newman">
                    <figure class="user--online">
                        <img src="admin/img/users/1.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Gene Newman</span>  <span class="username">@gene_newman</span> </span>
                </a>
                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Billy Black">
                    <figure class="user--online">
                        <img src="admin/img/users/2.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Billy Black</span>  <span class="username">@billyblack</span> </span>
                </a>
                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Herbert Diaz">
                    <figure class="user--online">
                        <img src="admin/img/users/3.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Herbert Diaz</span>  <span class="username">@herbert</span> </span>
                </a>
                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Sylvia Harvey">
                    <figure class="user--busy">
                        <img src="admin/img/users/4.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Sylvia Harvey</span>  <span class="username">@sylvia</span> </span>
                </a>
                <a href="javascript:void(0)" class="list-group-item active" data-chat-user="Marsha Hoffman">
                    <figure class="user--busy">
                        <img src="admin/img/users/5.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Marsha Hoffman</span>  <span class="username">@m_hoffman</span> </span>
                </a>
                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Mason Grant">
                    <figure class="user--offline">
                        <img src="admin/img/users/1.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Mason Grant</span>  <span class="username">@masongrant</span> </span>
                </a>
                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Shelly Sullivan">
                    <figure class="user--offline">
                        <img src="admin/img/users/2.jpg" class="rounded-circle" alt="">
                    </figure><span><span class="name">Shelly Sullivan</span>  <span class="username">@shelly</span></span>
                </a>
            </div>
        </div>
    </div>
</aside>
<div class="modal fade edit-layout-modal" id="editLayoutItem" tabindex="-1" role="dialog" aria-labelledby="editLayoutItemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLayoutItemLabel">Sed id mi non quam iaculis pulvinar.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="lead">Nullam elementum aliquam porta.</p>
                <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus fermentum imperdiet ligula, et mollis quam sagittis ac. In quis interdum sem. Vivamus blandit fringilla hendrerit. Suspendisse vulputate sapien vitae mi convallis dictum. Sed blandit felis ut quam accumsan, at condimentum nibh varius. Mauris ornare ultricies ipsum.</p>
                <div class="row">
                    <div class="col-md-6"><img src="admin/img/portfolio-1.jpg" class="img-fluid" alt=""></div>
                    <div class="col-md-6"><img src="admin/img/portfolio-8.jpg" class="img-fluid" alt=""></div>
                </div>
                <div class="jumbotron pt-30 pb-30 mt-30">
                    <h2 class="mt-0">Hello, world!</h2>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                </div>
                <p>Praesent eleifend ac felis dignissim mattis. Suspendisse eget congue enim, ac fermentum risus. Donec eget risus lacus. Nullam nec lectus quis tortor ultrices consectetur. Etiam dui erat, tristique vel quam a, maximus porttitor enim. Ut molestie turpis in est iaculis, ut congue massa porta.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="layout-edit-item.html" class="btn btn-primary">Edit</a>
                <button type="button" class="btn btn-danger list-delete">Delete</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#new-wallet').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this); // Create a FormData object from the form

            $.ajax({
                url: '{{ route("save-wallet.store") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        $('#new-wallet')[0].reset();
                        $('#newWalletModal').modal('hide'); 
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