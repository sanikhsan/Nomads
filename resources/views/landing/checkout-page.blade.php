@extends('landing.layouts.app')

@section('title', '- Checkout')

@section('landing-section')
<section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
          <div class="row">
            <div class="col p-0 pl-3 pl-lg-0">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">
                    Paket Travel
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    Details
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Checkout
                  </li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 pl-lg-0">
              <div class="card card-details mb-3">
                <h1>Who is Going?</h1>
                <p>
                  {{$travel->TrxTravel->title}}, {{$travel->TrxTravel->location}}
                </p>
                <div class="attendee">
                  <table class="table table-responsive-sm text-center">
                    <thead>
                      <tr>
                        <td scope="col">Picture</td>
                        <td scope="col">Name</td>
                        <td scope="col">Nationality</td>
                        <td scope="col">Visa</td>
                        <td scope="col">Passport</td>
                        <td scope="col"></td>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($travel->TrxDetail as $detail)
                        <tr>
                          <td>
                            <img
                              src="https://ui-avatars.com/api/?name={{$detail->username}}"
                              alt=""
                              height="60"
                              style="border-radius: 50%"
                            />
                          </td>
                          <td class="align-middle">{{$detail->username}}</td>
                          <td class="align-middle">{{$detail->nationality}}</td>
                          <td class="align-middle">{{$detail->is_visa == 1 ? 'YES' : 'NO'}}</td>
                          <td class="align-middle">{{$detail->doe_passport <= Carbon\Carbon::now() ? 'Expired' : 'Active'}}</td>
                          <td class="align-middle">
                            <a href="{{route('customer.remove_member', $detail->id)}}">
                              <img src="{{asset('landing/images/ic_remove.png')}}" alt="Delete Member" />
                            </a>
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td class="text-center" colspan="6">
                            <h5>No one want to Trip?</h5>
                          </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
                <div class="member mt-3">
                  <h2>Add Member</h2>
                  <form class="form-inline" action="{{route('customer.add_member', $travel->id)}}" method="POST">
                    @csrf
                    <label class="sr-only" for="inputUsername">Username</label>
                        <input
                          type="text"
                          class="form-control mb-2 mr-sm-2"
                          id="inputUsername"
                          name="username"
                          placeholder="Username"
                          required
                        />
                        <input
                          type="text"
                          class="form-control mb-2 mr-sm-2"
                          id="inputUsername"
                          placeholder="NA"
                          style="width: 50px"
                          name="nationality"
                          maxlength="3"
                          required
                        />
                        <select
                          class="custom-select mb-2 mr-sm-2"
                          id="inlineFormCustomSelectPref"
                          name="is_visa"
                          required
                        >
                          <option value="0">N/A</option>
                          <option value="1" selected>VISA</option>
                        </select>

                        <label class="sr-only" for="doePassport"
                          >DOE Passport</label
                        >
                        <div class="input-group mb-2 mr-sm-2">
                          <input
                            type="text"
                            class="form-control datepicker"
                            id="doePassport"
                            placeholder="DOE Passport"
                            name="doe_passport"
                            required
                          />
                        </div>
                        <button type="submit" class="btn btn-add-now mb-2 px-4 float-right">
                          Add Now
                        </button>
                  </form>
                  <h3 class="mt-2 mb-0">Note</h3>
                  <p class="disclaimer mb-0">
                    You are only able to invite member that has registered in
                    Nomads.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-details card-right">
                <h2>Checkout Information</h2>
                <table class="trip-informations">
                  <tr>
                    <th width="50%">Members</th>
                    <td width="50%" class="text-right">{{$travel->TrxDetail->count()}}</td>
                  </tr>
                  <tr>
                    <th width="50%">Additional Visa</th>
                    <td width="50%" class="text-right">$ {{$travel->additional_visa}},00</td>
                  </tr>
                  <tr>
                    <th width="50%">Trip Price</th>
                    <td width="50%" class="text-right">$ {{$travel->TrxTravel->price}},00 / person</td>
                  </tr>
                  <tr>
                    <th width="50%">Sub Total</th>
                    <td width="50%" class="text-right">$ {{$travel->transaction_total}},00</td>
                  </tr>
                  <tr>
                    <th width="50%">Total (+Unique)</th>
                    <td width="50%" class="text-right text-total">
                      <span class="text-blue">$ {{$travel->transaction_total}},</span
                      ><span class="text-orange">{{rand(1, 99)}}</span>
                    </td>
                  </tr>
                </table>

                <hr />
                <h2>Payment Instructions</h2>
                <p class="payment-instructions">
                  Please complete your payment before to continue the wonderful
                  trip
                </p>
                <div class="bank">
                  <div class="bank-item pb-3">
                    <img
                      src="{{asset('landing/images/ic_bank.png')}}"
                      alt=""
                      class="bank-image"
                    />
                    <div class="description">
                      <h3>PT Nomads ID</h3>
                      <p>
                        0881 8829 8800
                        <br />
                        Bank Central Asia
                      </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="bank-item">
                    <img
                      src="{{asset('landing/images/ic_bank.png')}}"
                      alt=""
                      class="bank-image"
                    />
                    <div class="description">
                      <h3>PT Nomads ID</h3>
                      <p>
                        0899 8501 7888
                        <br />
                        Bank HSBC
                      </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="join-container">
                <a
                  href="{{route('customer.checkout-success', $travel->id)}}"
                  class="btn btn-block btn-join-now mt-3 py-2"
                  >I Have Made Payment</a
                >
              </div>
              <div class="text-center mt-3">
                <a href="{{route('customer.checkout-cancel', $travel->id)}}" class="text-muted">Cancel Booking</a>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection

@push('addon-style')
<link rel="stylesheet" href="{{asset('landing/libraries/gijgo/css/gijgo.min.css')}}" />
@endpush

@push('addon-script')
<script src="{{asset('landing/libraries/gijgo/js/gijgo.min.js')}}"></script>
<script>
$(document).ready(function() {
  $('.datepicker').datepicker({
  format: 'yyyy-mm-dd',
  uiLibrary: 'bootstrap4',
  icons: {
      rightIcon: '<img src="{{asset('landing/images/ic_doe.png')}}" alt="" />'
  }
  });
});
</script>
@endpush