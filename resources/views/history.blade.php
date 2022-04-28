<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-2">

                <div class="table-responsive">

                    <button type="button" class="btn btn-success mt-2 btn-sm" data-bs-toggle="modal" data-bs-target="#modaltopup">
                        Tambah Saldo
                    </button>

                    <table class="table table-sm mt-2 table-striped">
                        <thead class="table-dark ">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama User</th>
                                <th scope="col">Nominal</th>
                                <th scope="col">Sisa Saldo</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Wicaks</td>
                                <td>{{ rupiah(100000) }}</td>
                                <td>{{ rupiah(200000) }}</td>
                                <td>Topup</td>
                                <td class="text-center"><button type="button" class="btn btn-success btn-sm" disabled>Success</button></td>
                            </tr>

                            <tr>
                                <td>1</td>
                                <td>Wicaks</td>
                                <td>{{ rupiah(100000) }}</td>
                                <td>{{ rupiah(200000) }}</td>
                                <td>Topup</td>
                                <td class="text-center"><button type="button" class="btn btn-success btn-sm" disabled>Success</button></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Top up-->
    <div class="modal fade" id="modaltopup" tabindex="-1" aria-labelledby="modalTopup" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTopup">Topup Saldo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Topup</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>