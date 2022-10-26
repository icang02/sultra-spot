<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaction /</span> Cart </h4>

  @if ($carts->count() !== 0)
    <div class="card">
      <h5 class="card-header">Cart Table</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>No.</th>
              <th>Nama Tempat</th>
              <th>Jumlah Tiket</th>
              <th>Harga</th>
              <th class="text-center">Sewa Kamera</th>
              <th class="text-center">Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">

            @foreach ($carts as $key => $cart)
              <tr>
                <td><input type="checkbox" class="form-check-input checkboxone" value="1"></td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong> {{ $key + $carts->firstItem() }}
                  </strong></td>
                <td> {{ $cart->tour_place->name }} </td>
                <td><input value="{{ $cart->quantity }}" type="text" readonly="" class="form-control"
                    style="width: 50px; text-align: center;">
                </td>
                <td> Rp {{ $cart->tour_place->price }} </td>
                <td class="text-center">
                  @if ($cart->price_kamera > 0)
                    {{ $cart->price_kamera }}
                  @elseif ($cart->price_kamera === 0)
                    -
                  @elseif (is_null($cart->price_kamera))
                    <span class="text-warning">Not available</span>
                  @endif
                </td>
                <td class="text-end"> Rp {{ $cart->total_payment }} </td>
                <td>
                  <button class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#smallModal">
                    <i class="bx bx-edit"></i>
                  </button>
                  <button wire:click="deleteInCart({{ $cart->id }})" wire:loading.class="disabled"
                    class="btn btn-sm btn-danger">
                    <i class="bx bx-message-square-x"></i>
                  </button>
                </td>
              </tr>
            @endforeach

            <tr>
              <td colspan="7"></td>
              <td>
                <form class="d-inline"><button type="submit" class="btn btn-info">Continue</button></form>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  @else
    <div>
      <h4 class="text-light text-center"> Shopping cart is empty :) </h4>
    </div>
  @endif
  <hr class="my-5">
</div>
