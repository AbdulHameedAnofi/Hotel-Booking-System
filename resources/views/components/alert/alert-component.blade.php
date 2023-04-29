
@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <h6 class="alert-heading d-flex align-items-center fw-bold mb-2">Success</h6>
    <p class="mb-0">{{ session()->get('message') }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger" role="alert">
  <h6 class="alert-heading fw-bold mb-2">Errors</h6>
  <p class="mb-0">{{ session()->get('error') }}</p>
</div>
@endif

@if($errors->any())
  @foreach ($errors->all() as $error)
  <div class="alert alert-danger" role="alert">
    <h6 class="alert-heading fw-bold mb-2">Errors</h6>
    <p class="mb-0"> {{ $error }}</p>
  </div>
  @endforeach
@endif
