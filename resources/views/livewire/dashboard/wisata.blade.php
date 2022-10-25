<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Wisata &amp; Event /</span> Wisata </h4>
  <div class="row mb-4 px-md-4 px-1 justify-content-center">

    @foreach ($allWisata as $wisata)
      <div class="col-md-6 mb-2"><a class="card mb-3 cursor-pointer shadow" href="wisata/{{ $wisata->id }}">
          <div class="row g-0">
            <div class="col-md-4"><img class="card-img card-img-left"
                src="{{ asset('sneat/img/wisata/thumb/' . $wisata->image) }}" alt="Card image" width="1000"></div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"> {{ $wisata->name }} </h5>
                <p class="card-text"><i class="bx bxs-map"></i> {{ $wisata->address }}</p>
                <p class="card-text"><small class="text-muted"> {{ $wisata->city }} </small></p>
              </div>
            </div>
          </div>
        </a>
      </div>
    @endforeach

  </div>
</div>
<hr class="my-5">
</div>
