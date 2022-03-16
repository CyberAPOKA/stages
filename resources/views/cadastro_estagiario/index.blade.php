@extends('layouts.master')

@section('title', 'Dados Pessoais')


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
                                            <input type="text" id="userinput1" class="form-control border-primary" placeholder="" name="firstname">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mx-auto">
                                        <label class="col-md-3 label-control" for="userinput2">Last Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="userinput2" class="form-control border-primary" placeholder="" name="lastname">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row last mx-auto">
                                        <label class="col-md-3 label-control" for="userinput3">Username</label>
                                        <div class="col-md-9">
                                            <input type="text" id="userinput3" class="form-control border-primary" placeholder="" name="username">
                                        </div>
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                    <div class="form-group row last mx-auto">
                                        <label class="col-md-3 label-control" for="userinput4">Nick Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="userinput4" class="form-control border-primary" placeholder="" name="nickname">
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
                                            <input class="form-control border-primary" type="email" placeholder="" id="userinput5">
                                        </div>
                                    </div>

                                    <div class="form-group row mx-auto">
                                        <label class="col-md-3 label-control" for="userinput6">Website</label>
                                        <div class="col-md-9">
                                            <input class="form-control border-primary" type="url" placeholder="" id="userinput6">
                                        </div>
                                    </div>

                                    <div class="form-group row mx-auto last">
                                        <label class="col-md-3 label-control">Contact Number</label>
                                        <div class="col-md-9">
                                            <input class="form-control border-primary" type="tel" placeholder="" id="userinput7">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mx-auto last">
                                        <label class="col-md-3 label-control" for="userinput8">Bio</label>
                                        <div class="col-md-9">
                                            <textarea id="userinput8" rows="6" class="form-control border-primary" name="bio" placeholder=""></textarea>
                                           </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions text-right">

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

<div class="col-md-8 order-md-1">
    <h4 class="mb-3">Billing address</h4>
    <form class="needs-validation p-2 bg-white card" novalidate="">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="firstName">First name</label>
          <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName">Last name</label>
          <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="username">Username</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">@</span>
          </div>
          <input type="text" class="form-control" id="username" placeholder="Username" required="">
          <div class="invalid-feedback" style="width: 100%;">
            Your username is required.
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="email">Email <span class="text-muted">(Optional)</span></label>
        <input type="email" class="form-control" id="email" placeholder="you@example.com">
        <div class="invalid-feedback">
          Please enter a valid email address for shipping updates.
        </div>
      </div>

      <div class="mb-3">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
        <div class="invalid-feedback">
          Please enter your shipping address.
        </div>
      </div>

      <div class="mb-3">
        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
      </div>

      <div class="row">
        <div class="col-md-5 mb-3">
          <label for="country">Country</label>
          <select class="custom-select d-block w-100" id="country" required="">
            <option value="">Choose...</option>
            <option>United States</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid country.
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="state">State</label>
          <select class="custom-select d-block w-100" id="state" required="">
            <option value="">Choose...</option>
            <option>California</option>
          </select>
          <div class="invalid-feedback">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="zip">Zip</label>
          <input type="text" class="form-control" id="zip" placeholder="" required="">
          <div class="invalid-feedback">
            Zip code required.
          </div>
        </div>
      </div>
      <hr class="mb-4">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="same-address">
        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="save-info">
        <label class="custom-control-label" for="save-info">Save this information for next time</label>
      </div>
      <hr class="mb-4">

      <h4 class="mb-1">Payment</h4>

      <div class="d-block my-2">
        <div class="custom-control custom-radio">
          <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
          <label class="custom-control-label" for="credit">Credit card</label>
        </div>
        <div class="custom-control custom-radio">
          <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
          <label class="custom-control-label" for="debit">Debit card</label>
        </div>
        <div class="custom-control custom-radio">
          <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
          <label class="custom-control-label" for="paypal">Paypal</label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="cc-name">Name on card</label>
          <input type="text" class="form-control" id="cc-name" placeholder="" required="">
          <small class="text-muted">Full name as displayed on card</small>
          <div class="invalid-feedback">
            Name on card is required
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="cc-number">Credit card number</label>
          <input type="text" class="form-control" id="cc-number" placeholder="" required="">
          <div class="invalid-feedback">
            Credit card number is required
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <label for="cc-expiration">Expiration</label>
          <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
          <div class="invalid-feedback">
            Expiration date required
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="cc-expiration">CVV</label>
          <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
          <div class="invalid-feedback">
            Security code required
          </div>
        </div>
      </div>
      <button class="btn btn-info btn-lg btn-block" type="submit">Continue to checkout</button>
    </form>
  </div>

  <div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="form-group">
                        <h5>Light overlay</h5>
                        <p>Light overlay.</p>
                        <button class="btn btn-lg btn-block font-medium-1 btn-outline-success mb-1 block-light-overlay">Light overlay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="form-group">
                        <h5>Opaque Overlay</h5>
                        <p>Opaque Overlay</p>
                        <button class="btn btn-lg btn-block font-medium-1 btn-outline-warning mb-1 block-opaque-overlay">Opaque Overlay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="form-group">
                        <h5>Custom Overlay</h5>
                        <p>Custom Overlay</p>
                        <button class="btn btn-lg btn-block font-medium-1 btn-outline-danger mb-1 block-custom-overlay">Custom Overlay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row match-height">
    <div class="col-12 col-md-4">
      <div class="card" style="height: 445px;">
        <div class="card-header">
          <h4 class="card-title">Doctors Available</h4>
        </div>
        <div class="card-content">
          <div class="table-responsive">
            <table id="recent-orders" class="table table-hover table-xl mb-0">
            <tbody>
              <tr>
                <td class="text-truncate p-1 border-top-0">

                </td>
                <td class="text-truncate pl-0 border-top-0">
                  <div class="name">Jane Andre</div>
                  <div class="designation text-light font-small-2">Dentist</div>
                </td>
                <td class="text-right border-top-0">
                  <a href="hospital-book-appointment.html" class="btn btn-sm btn-outline-success">Book Appointment</a>
                </td>
              </tr>
              <tr>
                <td class="text-truncate p-1">

                </td>
                <td class="text-truncate pl-0 border-top-0">
                  <div class="name">Kail Reack</div>
                  <div class="designation text-light font-small-2">Dentist</div>
                </td>
                <td class="text-right border-top-0 ">
                  <a href="hospital-book-appointment.html" class="btn btn-sm btn-outline-success">Book Appointment</a>
                </td>
              </tr>
              <tr>
                <td class="text-truncate p-1">

                </td>
                <td class="text-truncate pl-0 border-top-0 border-top-0 ">
                  <div class="name">Shail Black</div>
                  <div class="designation text-light font-small-2">Dentist</div>
                </td>
                <td class="text-right">
                  <a href="hospital-book-appointment.html" class="btn btn-sm btn-outline-success">Book Appointment</a>
                </td>
              </tr>
              <tr>
                <td class="text-truncate p-1">

                </td>
                <td class="text-truncate pl-0 border-top-0">
                  <div class="name">Zena wall</div>
                  <div class="designation text-light font-small-2">Dentist</div>
                </td>
                <td class="text-right">
                  <a href="hospital-book-appointment.html" class="btn btn-sm btn-outline-success">Book Appointment</a>
                </td>
              </tr>
              <tr>
                <td class="text-truncate p-1 border-bottom-0 ">

                </td>
                <td class="text-truncate pl-0 border-top-0 border-bottom-0 ">
                  <div class="name">Colin Welch</div>
                  <div class="designation text-light font-small-2">Dentist</div>
                </td>
                <td class="text-right border-bottom-0 ">
                  <a href="hospital-book-appointment.html" class="btn btn-sm btn-outline-success">Book Appointment</a>
                </td>
              </tr>
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


    <div id="recent-appointments" class="col-12 ">
      <div class="card" style="height: 445px;">
        <div class="card-header">
          <h4 class="card-title">Recent Appointments</h4>
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="hospital-book-appointment.html" target="_blank">View all</a></li>
            </ul>
          </div>
        </div>
        <div class="card-content mt-1">
          <div class="table-responsive">
              <table id="recent-orders-doctors" class="table table-hover table-xl mb-0">
                  <thead>
              <tr>
                <th class="border-top-0">Doctor</th>
                <th class="border-top-0">Patients</th>
                <th class="border-top-0">Specialities</th>
                <th class="border-top-0">Timings</th>
                <th class="border-top-0">Amount</th>
              </tr>
                  </thead>
                  <tbody>
              <tr class="pull-up">
                <td class="text-truncate">Jane Andre</td>
                <td class="text-truncate p-1">

                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-outline-danger round">Dentist</button>
                </td>
                <td class="text-truncate">8:00 A.M. - 12:00 P.M.</td>
                <td class="text-truncate">$ 1200.00</td>
              </tr>
              <tr class="pull-up">
                <td class="text-truncate">Kail Reack</td>
                <td class="text-truncate p-1">

                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-outline-success round">Dermatologist</button>
                </td>
                <td class="text-truncate">10:00 A.M. - 1:00 P.M.</td>
                <td class="text-truncate">$ 1190.00</td>
              </tr>
              <tr class="pull-up">
                <td class="text-truncate">Shail Black</td>
                <td class="text-truncate p-1">

                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-outline-danger round">Psychiatrist</button>
                </td>
                <td class="text-truncate">11:00 A.M. - 2:00 P.M.</td>
                <td class="text-truncate">$ 999.00</td>
              </tr>
              <tr class="pull-up">
                <td class="text-truncate">Zena wall</td>
                <td class="text-truncate p-1">

                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-outline-success round">Gastroenterologist</button>
                </td>
                <td class="text-truncate">11:30 A.M. - 3:00 P.M.</td>
                <td class="text-truncate">$ 1150.00</td>
              </tr>
              <tr class="pull-up">
                <td class="text-truncate">Colin Welch</td>
                <td class="text-truncate p-1">

                </td>
                <td>
                  <button type="button" class="btn btn-sm btn-outline-danger round">Pediatrician</button>
                </td>
                <td class="text-truncate">5:00 P.M. - 8:00 P.M.</td>
                <td class="text-truncate">$ 1180.00</td>
              </tr>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>



@stop
