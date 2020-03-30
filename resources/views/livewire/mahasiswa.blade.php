<div class="container-fluid mt-4">
    <h2>Mahasiswa</h2>
    <form wire:submit.prevent="submit" id="add-mhs">
        <div class="form-group">
            <input type="text" wire:model="name" autofocus class="form-control @error('name') is-invalid @enderror"
                   id="inputName" aria-describedby="inputNameHelp" placeholder="Name">
            @error('name')
            <div class="invalid-feedback text-left">{{ $message }}</div> @enderror
        </div>
        <div class="form-groupl">
            <input type="text" wire:model="nrp" class="form-control @error('nrp') is-invalid @enderror"
                   id="inputNRP" aria-describedby="inputNRPHelp" placeholder="NRP">
            @error('nrp')
            <div class="invalid-feedback text-left">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-3">Tambah</button>
    </form>

    <div wire:init="loadMahasiswa">
        <h3 class="m-2">List of Mahasiswa</h3>
        <ul class="list-group list-group-flush p-0 m-0 text-left">
            @if(!$readyToLoad)
                loading...
            @endif
            @foreach ($mahasiswa as $mhs)
                <li class="list-group-item d-flex justify-content-between align-items-center my-2">
                    <div class="col">

                        {{$mhs->name}} - {{$mhs->nrp}}
                    </div>
                    <div class="col-1">
                        <button wire:click="delete({{$mhs->id}})" class="btn btn-danger">hapus</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>