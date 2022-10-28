<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaction /</span> Order </h4>

  @if ($orderList->count() !== 0)
    <div class="card">
      <h5 class="card-header">Order Table</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>No. Order</th>
              <th>Tour Name</th>
              <th class="text-center">Total</th>
              <th class="text-center">Status</th>
              @if (Auth()->user()->role_id == 3)
                <th class="text-center">Confirm / Cancel</th>
              @endif
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($orderList as $order)
              <tr>
                <td>
                  <i class="fab fa-angular fa-lg text-danger me-3"></i>
                  <strong> {{ $order->no_order }} </strong>
                </td>
                <td> {{ $order->tour_place->name }} </td>
                <td class="text-end">
                  Rp {{ number_format($order->total_payment, 0, ',', '.') }}
                </td>
                <td class="text-center">
                  @if ($order->image_tf_public_id && $order->status == 'pending')
                    <span class="badge bg-label-warning me-1"> Proses </span>
                  @elseif ($order->status == 'pending')
                    <span class="badge bg-label-warning me-1"> {{ $order->status }} </span>
                  @elseif ($order->status == 'selesai')
                    <span class="badge bg-label-success me-1"> {{ $order->status }} </span>
                  @else
                    <span class="badge bg-label-danger me-1"> {{ $order->status }} </span>
                  @endif
                </td>
                @if (Auth()->user()->role_id == 3)
                  <td class="text-center">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        @if ($order->status != 'pending')
                          <button class="dropdown-item">Done</button>
                        @else
                          <button wire:click="confirmOrder({{ $order->id }})"
                            class="dropdown-item btn btn-success btn-sm">Confirm</button>
                          <button wire:click="cancelOrder({{ $order->id }})"
                            class="dropdown-item btn btn-danger btn-sm">Cancel</button>
                        @endif
                      </div>
                    </div>
                  </td>
                @endif
                <td>
                  <a class="btn btn-sm btn-primary" href="{{ url("order/$order->id") }}"> Detail </a>

                  @if (Auth::user()->role_id == 3 && $order->image_tf_public_id)
                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal"
                      data-bs-whatever="@mdo">Evidence of transfer</button>
                  @endif

                  @if (is_null($order->image_tf_public_id) && Auth()->user()->role_id == 2 && $order->status == 'pending')
                    <button wire:click="confirmDelete({{ $order->id }})"class="btn btn-sm btn-danger"> Cancel
                    </button>
                  @endif
                </td>
              </tr>

              {{-- Modal Start --}}
              <div wire:ignore.self class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Evidence of transfer</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <img src="{{ $order->image_tf }}" alt="nota.jpg" class="img-fluid">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              {{-- Modal End --}}
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @else
    <div>
      <h4 class="text-light text-center"> No order yet please make an order 😜 </h4>
    </div>
  @endif
  <hr class="my-5">
</div>
