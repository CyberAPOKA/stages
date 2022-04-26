@include('layouts.master')

@section('title', 'Cadastro')


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-fullscreen">
            <div class="card-header">
                <h4 class="card-title" id="bordered-layout-colored-controls">User Profile</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-minimize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <div class="card-text">

                    </div>
                    <form class="form form-horizontal form-bordered">
                        <div class="form-body">
                            <h4 class="form-section"><i class="la la-eye"></i> About User</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row mx-auto">
                                        <label class="col-md-3 label-control" for="userinput1">Fist Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="userinput1" class="form-control border-primary" placeholder="First Name" name="firstname">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mx-auto">
                                        <label class="col-md-3 label-control" for="userinput2">Last Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="userinput2" class="form-control border-primary" placeholder="Last Name" name="lastname">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row last mx-auto">
                                        <label class="col-md-3 label-control" for="userinput3">Username</label>
                                        <div class="col-md-9">
                                            <input type="text" id="userinput3" class="form-control border-primary" placeholder="Username" name="username">
                                        </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group row last mx-auto">
                                        <label class="col-md-3 label-control" for="userinput4">Nick Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="userinput4" class="form-control border-primary" placeholder="Nick Name" name="nickname">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-section"><i class="ft-mail"></i> Contact Info &amp; Bio</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row mx-auto">
                                        <label class="col-md-3 label-control" for="userinput5">Email</label>
                                        <div class="col-md-9">
                                            <input class="form-control border-primary" type="email" placeholder="email" id="userinput5">
                                        </div>
                                    </div>

                                    <div class="form-group row mx-auto">
                                        <label class="col-md-3 label-control" for="userinput6">Website</label>
                                        <div class="col-md-9">
                                            <input class="form-control border-primary" type="url" placeholder="http://" id="userinput6">
                                        </div>
                                    </div>

                                    <div class="form-group row mx-auto last">
                                        <label class="col-md-3 label-control">Contact Number</label>
                                        <div class="col-md-9">
                                            <input class="form-control border-primary" type="tel" placeholder="Contact Number" id="userinput7">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mx-auto last">
                                        <label class="col-md-3 label-control" for="userinput8">Bio</label>
                                        <div class="col-md-9">
                                            <textarea id="userinput8" rows="6" class="form-control border-primary" name="bio" placeholder="Bio"></textarea>
                                           </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions text-right">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
