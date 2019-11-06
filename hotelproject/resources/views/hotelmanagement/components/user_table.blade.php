<table class="table table-bodered">
    <thead>
        <tr>
            <th class="col-sm-1">STT</th>
            <th class="col-sm-2">Họ và tên</th>
            <th class="col-sm-2">Ngày sinh</th>
            <th class="col-sm-2">Khách sạn</th>
            <th class="col-sm-2">Vị trí</th>
            <th class="col-sm-3">Thao tác</th>
        </tr>
    </thead>
    <tbody>
    @if(!$users->isEmpty())
        <input type="text" id="hidden-current-page" value="{{ $users->url($users->currentPage()) }}" hidden>
        @php($i = 0)
        @foreach($users as $user)
            <tr>
                <td>{{ $users->firstItem() + $i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->birthday }}</td>
                <td>{{ $user->hotel_name }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <button id="edit-hotel-btn" class="btn btn-primary" data-id="{{ $user->id }}">Cập nhật</button>
                    <button id="delete-hotel-btn" class="btn btn-danger" data-id="{{ $user->id }}">Xóa bỏ</button>
                </td>
            </tr>
            @php($i++)
        @endforeach
    @else
        <tr>
            <th colspan="5" class="text-center">
                Danh sách trống!
            </th>
        </tr>
    @endif
    </tbody>
</table>
