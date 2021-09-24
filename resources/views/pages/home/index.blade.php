@extends('layouts.main')



@section('Tentang')
@forelse ($items as $item)
<td>{{ $item->deskripsi }}</td>
@empty
<tr>
    <td colspan="3" class="text-center">
        Tidak Ada Data
    </td>
</tr>
@endforelse
@endsection

<!-- misi -->

@section('Visi')
@forelse ($items as $item)
<td>{{ $item->visi }}</td>
@empty
<tr>
    <td colspan="3" class="text-center">
        Tidak Ada Data
    </td>
</tr>
@endforelse
@endsection



<!-- misi -->

@section('Misi')
@forelse ($items as $item)
<td>{{ $item->misi }}</td>
@empty
<tr>
    <td colspan="3" class="text-center">
        Tidak Ada Data
    </td>
</tr>
@endforelse
@endsection

@section('Sejarah')
@forelse ($items as $item)
<td>{{ $item->sejarah }}</td>
@empty
<tr>
    <td colspan="3" class="text-center">
        Tidak Ada Data
    </td>
</tr>
@endforelse
@endsection

@section('Foto')
@forelse ($items as $item)
<td><img src="{{ Storage::url($item->foto) }}" width="200px"></td>
@empty
<tr>
    <td colspan="3" class="text-center">
        Tidak Ada Data
    </td>
</tr>
@endforelse
@endsection