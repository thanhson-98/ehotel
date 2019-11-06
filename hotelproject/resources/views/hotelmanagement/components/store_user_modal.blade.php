<div id="store-user-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="store-user-modal-title" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="storeUserForm">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="id" id="user-id-input" value="" hidden>
                    </div>
                    <div class="form-group">
                        <label for="user-name-input">Họ và tên:</label>
                        <input type="text" name="name" class="form-control" id="user-name-input" placeholder="Nhập họ và tên...">
                        <p id="name-error" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label for="user-birthday-input">Ngày sinh:</label>
                        <input type="text" name="birthday" class="form-control" id="user-birthday-input" placeholder="Nhập ngày sinh...">
                        <p id="birthday-error" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label for="user-hotelName-input">Tên khách sạn:</label>
                        <input type="text" name="hotel_id" class="form-control" id="user-hotelName-input" placeholder="Nhập tên khách sạn...">
                        <p id="hotelName-error" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label for="user-role-input">Vị trí:</label>
                        <input type="tel" name="role" class="form-control" id="user-role-input" placeholder="Nhập số điện thoại...">
                        <p id="role-error" class="text-danger"></p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                <button id="save-user" type="button" class="btn btn-primary">Lưu lại</button>
            </div>
        </div>
    </div>
</div>
