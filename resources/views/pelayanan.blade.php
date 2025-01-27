<x-layout title="Pelayanan">
    <main class="mt-5">
        <div class="container">
            <div class="position-relative rounded overflow-hidden mb-5" style="height: 400px;">
                <div
                    class="position-absolute top-50 start-50 translate-middle text-center p-4 bg-dark bg-opacity-50 rounded w-75">
                    <h2 class="text-white display-5 fw-bold">Bidang Koperasi Usaha Kecil Menengah (KUKM)</h2>
                    <p class="text-white mt-3">
                        Koperasi Usaha Mikro, Kecil dan Menengah (UMKM) pada DISDAGKOPERIN Kota Cimahi merupakan
                            bidang yang berperan dalam menggerakan perekonomian daerah. Peran bidang KUKM di
                            DISDAGKOPERIN Kota Cimahi meliputi upaya peningkatan kualitas UMKM lokal melalui
                            program-program yang mendorong inovasi, digitalisasi, dan peningkatan akses pasar bagi
                            produk lokal.
                    </p>
                </div>
            </div>
        </div>
    </main>

    <section class="py-5">
        <h2 class="text-center fw-bold text-uppercase mb-5">Pelayanan</h2>
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="card text-center h-100">
                        <img src="img/logo.png" class="card-img-top p-4" alt="Service 1"
                            style="max-width: 200px; margin: auto;">
                        <div class="card-body">
                            <h3 class="card-title fw-bold">WUB</h3>
                            <button class="btn btn-warning text-white">Learn More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center h-100">
                        <img src="{{ asset('img/pelayanan-placeholder.jpg') }}" class="card-img-top p-4" alt="Service 2"
                            style="max-width: 200px; margin: auto;">
                        <div class="card-body">
                            <h3 class="card-title fw-bold">Lorem</h3>
                            <button class="btn btn-warning text-white">Learn More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center h-100">
                        <img src="{{ asset('img/pelayanan-placeholder.jpg') }}" class="card-img-top p-4" alt="Service 3"
                            style="max-width: 200px; margin: auto;">
                        <div class="card-body">
                            <h3 class="card-title fw-bold">Lorem</h3>
                            <button class="btn btn-warning text-white">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
