<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Foods</h1>
        <a href="#" class="btn btn-sm btn-primary shadow-sm" style="margin-right: -62%;;">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate PDF
        </a>
        <a href="#" class="btn btn-sm btn-success shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate XLS
        </a>
    </div>

    <!-- Flash Data -->
    <!-- Flash Data -->
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(session('statusDelete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('statusDelete') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Foods
                <span>
                    <a href="/foods/create" class="text-primary float-right">
                        <i class="fas fa-plus"><span class="ml-2">Add Foods</span></i>
                    </a>
                </span>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">No.</th>
                            <th scope="col" class="text-center">ID Makanan</th>
                            <th scope="col" class="text-center">Nama Makanan</th>
                            <th scope="col" class="text-center">Harga</th>
                            <th scope="col" class="text-center">Stok Makanan</th>
                            <th scope="col" class="text-center">Gambar Makanan</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foods as $food)
                        <tr>
                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                            <td class="text-center">{{ $food->id_makanan }}</td>
                            <td class="text-center">{{ $food->nama_makanan }}</td>
                            <td class="text-center">{{ $food->harga_makanan }}</td>
                            <td class="text-center">{{ $food->qty_makanan }}</td>
                            <td><img width="150px" src="{{ asset('image/'.$food->gambar_makanan) }}"></td>
                            <td class="text-center">
                                <a href="/foods/{{ $food->id_makanan }}/edit" class="btn btn-small text-success">
                                    <i class="fa fa-edit"></i><span class="ml-2">Edit</span>
                                </a>
                                <form action="/foods/{{ $food->id_makanan}}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-small text-danger">
                                        <i class=" fa fa-trash"></i><span class="ml-2">Delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->