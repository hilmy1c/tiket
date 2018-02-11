@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Booking</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Kode Pemesanan</th>
                    <th>User</th>
                    <th>Tanggal Pesan</th>
                    <th>Status Pembayaran</th>
                    <th>Bank</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->booking_code }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->payment_status }}</td>
                        <td><img src="{{ Storage::url($booking->bankAccount->image) }}" alt="" width="50px"></td>
                        <td>
                            @switch ($booking->payment_status)
                                @case ('Menunggu Konfirmasi')
                                    <form action="">
                                        <button type="submit" class="btn btn-sm btn-success">Konfirmasi Pembayaran</button>
                                    </form>
                                    @break
                            
                                @case ('Belum Dibayar')
                                    <form action="{{ route('booking.destroy', ['id' => $booking->id]) }}" method="POST" class="form-inline">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}}

                                        <button type="submit" class="btn btn-sm btn-danger">Batalkan Pesanan</button>
                                    </form>
                                    @break

                                @case ('Sudah Dibayar')
                                    <form action="{{ route('booking.destroy', ['id' => $booking->id]) }}" method="POST" class="form-inline">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}}

                                        <button type="submit" class="btn btn-sm btn-danger">Hapus Pesanan</button>
                                    </form>
                                    @break
                            @endswitch
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>  
@endsection
