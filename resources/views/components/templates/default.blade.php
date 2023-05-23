<!doctype html>
<html lang="en">
@include('components.templates.partials.header')
  <body >
    <div class="page">
@include('components.templates.partials.sidebar')
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <!-- Page pre-title -->

                <h2 class="page-title">
                  {{ $title ?? 'Dashboard' }}
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  <span class="d-none d-sm-inline">
                  </span>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl col-sm-6 col-lg-12">
            {{-- ALERT AMBIL DARI COMPONENTS/FORMS/ALERT.BLADE.PHP --}}
            <x-forms.alert />
            
            {{ $slot }}

          </div>

<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin keluar dari aplikasi?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="logout">Logout</button>
      </div>
    </div>
  </div>
</div>
        </div>
    @include('components.templates.partials.footer')
      </div>
    </div>
    @include('components.templates.partials.scripts')
  </body>
</html>