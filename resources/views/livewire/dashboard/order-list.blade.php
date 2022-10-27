<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaction /</span> Order </h4>
  <div class="card">
    <h5 class="card-header">Tabel Pesanan</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>No. Pesanan</th>
            <th>Tempat Wisata</th>
            <th>Total</th>
            <th>Status</th>
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
              <td>Rp {{ $order->tour_place->price }}</td>
              <td>
                @if ($order->status == 'pending')
                  <span class="badge bg-label-warning me-1"> {{ $order->status }} </span>
                @elseif ($order->status == 'selesai')
                  <span class="badge bg-label-success me-1"> {{ $order->status }} </span>
                @else
                  <span class="badge bg-label-danger me-1"> {{ $order->status }} </span>
                @endif
              </td>
              <td>
                <a class="btn btn-sm btn-primary" href="#"> Detail </a>
                <button class="btn btn-sm btn-danger"> Hapus </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <hr class="my-5">
</div>
