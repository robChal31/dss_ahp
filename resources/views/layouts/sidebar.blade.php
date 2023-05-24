<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/kriteria" target="_blank">
        <img src="{{ asset('/') }}img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">SPK SISWA</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../pages/dashboard.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white dropdown-toggle" data-bs-toggle="collapse" href="#collapseKriteria" role="button" aria-expanded="false" aria-controls="collapseKriteria">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">scale</i>
            </div>
            <span class="nav-link-text ms-1">Kriteria</span>
          </a>
          <div class="collapse" id="collapseKriteria">
            <ul class="navbar-nav">
              <li class="nav-item">
                
                <a class="nav-link text-white" style="padding-left: 35px;" href="../kriteria">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">list</i>
                    <span class="nav-link-text ms-1">List Kriteria</span>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </li>
       
        <li class="nav-item">
          <a class="nav-link text-white dropdown-toggle" data-bs-toggle="collapse" href="#collapseSiswa" role="button" aria-expanded="false" aria-controls="collapseSiswa">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons">person_outline</i> <!-- Icon representing a student with an outline -->
            </div>
            <span class="nav-link-text ms-1">Siswa</span>
          </a>
          <div class="collapse" id="collapseSiswa">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-white" style="padding-left: 35px;" href="../siswa">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">list</i>
                    <span class="nav-link-text ms-1">List Siswa</span>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white dropdown-toggle" data-bs-toggle="collapse" href="#collapsePerhitungan" role="button" aria-expanded="false" aria-controls="collapsePerhitungan">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons">table_view</i> <!-- Icon representing a student with an outline -->
            </div>
            <span class="nav-link-text ms-1">Perhitungan</span>
          </a>
          <div class="collapse" id="collapsePerhitungan">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-white" style="padding-left: 35px;" href="../perhitungan">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons">grid_on</i>
                  </div>
                  <span class="nav-link-text ms-1">Matrix Kriteria</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" style="padding-left: 35px;" href="../perhitungan_subkriteria">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons">grid_on</i>
                  </div>
                  <span class="nav-link-text ms-1">Matrix Subkriteria</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" style="padding-left: 35px;" href="../perhitungan_subkriteria/alternatif">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons">calculate</i>
                  </div>
                  <span class="nav-link-text ms-1">Hitung Alternatif</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

      
       
      </ul>
    </div>
  </aside>