<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Wisata &amp; Event /</span> Wisata </h4>
  <div class="row px-md-4 px-1">
    <div class="col-md-7 mb-md-0 mb-4">
      <div class="card">
        <h5 class="card-header"> {{ $wisata->name }} </h5>
        <div class="card-body">
          <h6 class="text-light"><i class="bx bx-map me-1"></i> {{ $wisata->address }}</h6>
          <hr class="my-3"><img class="img-fluid" src="{{ asset('sneat/img/wisata/' . $wisata->image) }}"
            alt="Image">
          <div class="mt-3"> {{ $wisata->description }} </div>
          <hr class="my-4">
          <form>
            <div class="mb-3">
              <div class="form-label">Jumlah Tiket</div><input min="1" max="{{ $wisata->ticket_stock }}"
                type="number" class="form-control" name="qty" id="quantity" required="">
            </div>
            <div class="form-check"><input class="form-check-input" type="checkbox" name="rental" id="rental"><label
                class="form-check-label" for="rental"> Tambah <span class="fw-bold">Rp 50.000</span> untuk sewa kamera
              </label></div>
            <div class="mt-4">
              <div as="button" class="btn btn-info me-1"><i class="bx bx-right-arrow me-1"></i> Pesan </div><button
                class="btn btn-warning"><i class="bx bxs-cart-add me-1"></i> Simpan </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <h5><i class="bx bxs-map-pin me-1"></i> MAPS</h5>
          <hr><img class="img-fluid" src="{{ asset('sneat/img/maps/maps.png') }}" alt="Image">
          <div class="d-grid mt-2"><a href="{{ $wisata->maps }}" target="_blank" class="btn btn-primary"><i
                class="bx bx-paper-plane me-1"></i> Open Direction</a></div>
          <hr class="my-3">
          <div class="row mb-3">
            <div class="col-md-1 col-1"><i class="bx bxs-map"></i></div>
            <div class="col-md-11 col-11">
              <div class="fw-bold">ALAMAT</div> {{ $wisata->address }}
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-1 col-1"><i class="bx bxs-phone"></i></div>
            <div class="col-md-11 col-11">
              <div class="fw-bold">TELEPON</div> {{ $wisata->telp }}
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-1 col-1"><i class="bx bxs-purchase-tag-alt"></i></div>
            <div class="col-md-11 col-11">
              <div class="fw-bold">HARGA TIKET</div> Rp {{ $wisata->price }}
            </div>
          </div>
          <div class="row">
            <div class="col-md-1 col-1"><i class="bx bxs-plane-take-off"></i></div>
            <div class="col-md-11 col-11">
              <div class="fw-bold">STOK</div><span>60</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="my-5">
</div>
