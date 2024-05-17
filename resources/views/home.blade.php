@extends('layouts.app')
@section('content')
<style>
    
</style>
    <div class="page-content">
        <div class="container">
            <div class="row gx-1 justify-content-between">
              <div class="col-lg-2 col-md-12">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="white" d="M3.5 8a5.5 5.5 0 1 1 8.596 4.547a9.005 9.005 0 0 1 5.9 8.18a.751.751 0 0 1-1.5.045a7.5 7.5 0 0 0-14.993 0a.75.75 0 0 1-1.499-.044a9.005 9.005 0 0 1 5.9-8.181A5.5 5.5 0 0 1 3.5 8M9 4a4 4 0 1 0 0 8a4 4 0 0 0 0-8m8.29 4q-.221 0-.434.03a.75.75 0 1 1-.212-1.484a4.53 4.53 0 0 1 3.38 8.097a6.69 6.69 0 0 1 3.956 6.107a.75.75 0 0 1-1.5 0a5.19 5.19 0 0 0-3.696-4.972l-.534-.16v-1.676l.41-.209A3.03 3.03 0 0 0 17.29 8"/></svg>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah Warga</h6>
                                <h6 class="font-extrabold mb-0">2.000</h6>
                            </div>
                        </div> 
                    </div>
                </div>
              </div>
          
              <div class="col-lg-2 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 2048 2048"><path fill="white" d="M1790 1717q98 48 162 135t81 196h-110q-11-57-41-106t-73-84t-97-56t-112-20q-59 0-112 20t-97 55t-73 85t-41 106h-110q16-108 80-195t163-136q-57-45-88-109t-32-136q0-45 12-87t36-79t57-66t74-49q-27-39-62-69t-76-53t-86-33t-93-12q-80 0-153 31t-127 91q24 65 24 134q0 92-41 173t-115 136q65 33 117 81t90 108t57 128t20 142H896q0-79-30-149t-82-122t-123-83t-149-30q-80 0-149 30t-122 82t-83 123t-30 149H0q0-73 20-141t57-128t89-108t118-82q-74-55-115-136t-41-173q0-79 30-149t82-122t122-83t150-30q85 0 161 36t132 100q26-25 56-45t63-38q-74-55-115-136t-41-173q0-79 30-149t82-122t122-83t150-30q79 0 149 30t122 82t83 123t30 149q0 92-41 173t-115 136q70 37 126 90t95 123q64 0 120 24t99 67t66 98t24 121q0 72-31 136t-89 109M512 1536q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100q0 53 20 99t55 82t81 55t100 20m384-896q0 53 20 99t55 82t81 55t100 20q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100m704 630q-42 0-78 16t-64 43t-44 64t-16 79t16 78t43 64t64 44t79 16t78-16t64-43t44-64t16-79t-16-78t-43-64t-64-44t-79-16"/></svg>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah Keluarga</h6>
                                <h6 class="font-extrabold mb-0">112.000</h6>
                            </div>
                        </div> 
                    </div>
                </div>
              </div>
          
              <div class="col-lg-2 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 2048 2048"><path fill="white" d="M1536 1024q106 0 199 40t163 109t110 163t40 200t-40 199t-109 163t-163 110t-200 40t-199-40t-163-109t-110-163t-40-200t40-199t109-163t163-110t200-40m0 896q79 0 149-30t122-82t83-122t30-150q0-79-30-149t-82-122t-123-83t-149-30q-80 0-149 30t-122 82t-83 123t-30 149q0 80 30 149t82 122t122 83t150 30m0-384h192v128h-320v-384h128zm-366-524q-28 20-53 42t-48 47q-69-37-145-57t-156-20q-88 0-170 23t-153 64t-129 100t-100 130t-65 153t-23 170H0q0-120 35-231t101-205t156-167t204-115q-113-74-176-186t-64-248q0-106 40-199t109-163T568 40T768 0t199 40t163 109t110 163t40 200q0 66-16 129t-48 119t-76 104t-101 82q70 28 131 66M384 512q0 80 30 149t82 122t122 83t150 30q79 0 149-30t122-82t83-122t30-150q0-79-30-149t-82-122t-123-83t-149-30q-80 0-149 30t-122 82t-83 123t-30 149"/></svg>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Warga Pendatang</h6>
                                <h6 class="font-extrabold mb-0">112.000</h6>
                            </div>
                        </div> 
                    </div>
                </div>
              </div>

              <div class="col-lg-2 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 48 48"><g fill="white"><path d="M22 13a4.5 4.5 0 1 0 0-9a4.5 4.5 0 0 0 0 9m13 12a3 3 0 0 0-3 3v.343a1 1 0 1 0 2 0V28a1 1 0 1 1 2 0v14.946a1 1 0 1 0 2 0V28a3 3 0 0 0-3-3m-5.291-4.821L28 19.433l1.595.677zm1.226 1.062a5 5 0 0 0-1.226-1.062L36 22.928v-.096v.002c.095 1.1-.755 2.067-1.899 2.16c-1.134.09-2.132-.714-2.241-1.801v-.002l-.015-.086a4 4 0 0 0-.115-.434a4.5 4.5 0 0 0-.795-1.43"/><path fill-rule="evenodd" d="m36 22.831l-6.405-2.72A7 7 0 0 0 28 19.432V42a2 2 0 0 1-3.99.199l-1-10A2 2 0 0 1 23 32h-2q0 .1-.01.199l-1 10A2 2 0 0 1 16 42V27.919c-1.679-.223-3.09-.898-4.136-1.925A6.2 6.2 0 0 1 10 21.481A6.34 6.34 0 0 1 11.92 17c1.29-1.259 3.129-2 5.335-2h7.32c4.973 0 7.944 1.722 9.62 3.759a8.4 8.4 0 0 1 1.494 2.695c.146.44.26.893.309 1.353v.015l.002.006zm-21.169.362c.257.252.631.496 1.169.648V19.17c-.5.152-.864.389-1.123.641a2.4 2.4 0 0 0-.72 1.708c-.006.64.232 1.24.674 1.674" clip-rule="evenodd"/></g></svg>    
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah Lansia</h6>
                                <h6 class="font-extrabold mb-0">112.000</h6>
                            </div>
                        </div> 
                    </div>
                </div>
              </div>
          
              <div class="col-lg-2 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="white" d="M18.5 4A2.5 2.5 0 0 1 21 6.5A2.5 2.5 0 0 1 18.5 9A2.5 2.5 0 0 1 16 6.5A2.5 2.5 0 0 1 18.5 4m-14 16A1.5 1.5 0 0 1 3 18.5A1.5 1.5 0 0 1 4.5 17h7a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5zm11.59-1l-1.4-4H11l-4.25-4.25S9 8.25 12.5 8.25c3 0 3.35 1 3.56 1.62L18.92 18c.28.78-.14 1.64-.92 1.92c-.78.27-1.64-.14-1.91-.92"/></svg>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah Balita</h6>
                                <h6 class="font-extrabold mb-0">112.000</h6>
                            </div>
                        </div> 
                    </div>
                </div>
              </div>
          
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Statistik Data Penduduk</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis tincidunt tempus.
                                Duis vitae facilisis enim, at rutrum lacus. Nam at nisl ut ex egestas placerat
                                sodales id quam. Aenean sit amet nibh quis lacus pellentesque venenatis vitae at
                                justo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur
                                ridiculus mus. Suspendisse venenatis tincidunt odio ut rutrum. Maecenas ut urna
                                venenatis, dapibus tortor sed, ultrices justo. Phasellus scelerisque, nibh quis
                                gravida venenatis, nibh mi lacinia est, et porta purus nisi eget nibh. Fusce pretium
                                vestibulum sagittis. Donec sodales velit cursus convallis sollicitudin. Nunc vel
                                scelerisque elit, eget facilisis tellus. Donec id molestie ipsum. Nunc tincidunt
                                tellus sed felis vulputate euismod.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Persentase Data Penduduk</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis tincidunt tempus.
                                Duis vitae facilisis enim, at rutrum lacus. Nam at nisl ut ex egestas placerat
                                sodales id quam. Aenean sit amet nibh quis lacus pellentesque venenatis vitae at
                                justo.  
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>


    
@endsection
