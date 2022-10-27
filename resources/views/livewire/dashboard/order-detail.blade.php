<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaction / Order / </span> Detail </h4>
  <div class="row px-md-4 px-1">
    <div class="col-md-7 mb-md-0 mb-4">
      <div class="card">
        <h5 class="card-header" wire:click="clickMe">No. Order : SP0000001</h5>
        <div class="card-body"><img src="http://localhost:8001/assets/img/wisata/tamborasi.jpg" alt="Image"
            class="img-fluid">
          <div class="row mt-4">
            <div class="col-md-6 col-6">
              <div>
                <h6 class="fw-bold">Nama Pemesan</h6>
                <p>Ilmi Faizan</p>
              </div>
              <div>
                <h6 class="fw-bold">Harga Tiket</h6>
                <p>Rp 15000</p>
              </div>
              <div>
                <h6 class="fw-bold">Total</h6>
                <p>Rp 80000</p>
              </div>
            </div>
            <div class="col-md-6 col-6">
              <div>
                <h6 class="fw-bold">Tujuan Wisata</h6>
                <p>Tamborasi</p>
              </div>
              <div>
                <h6 class="fw-bold">Jumlah Tiket</h6>
                <p>2</p>
              </div>
              <div>
                <h6 class="fw-bold">Tanggal Pemesanan</h6>
                <p>2022-10-20 14:22:22</p>
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <form>
            <h6 class="fw-bold">Upload Bukti Transfer</h6>
            <div class="input-group mt-3"><input type="file" class="form-control"
                accept="image/jpg, image/jpeg, image/png"><button class="btn btn-outline-primary" type="submit"> Kirim
              </button>
              <div class="invalid-feedback"></div>
            </div>
          </form>
          <!--v-if-->
        </div>
      </div>
    </div>
  </div>
  <hr class="my-5"><!-- Modal Form Edit -->
  <div class="modal fade" id="basicModal1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-basic" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2"></h5><button type="button" class="btn-close"
            data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row g-2">
            <div class="col mb-0"><img src="nota.jpg" class="img-fluid"></div>
          </div>
        </div>
        <div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Kembali </button></div>
      </div>
    </div>
  </div>
</div>
