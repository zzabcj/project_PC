<div class="card border-0 text-bg-light mb-4" style="min-height: 0">
    <div class="p-4">
        <h4>Địa chỉ nhận hàng</h4>
        <hr>
        <div class="user-address row">
                <div class="user-address-info col-12">
                    <div class="mb-3">
                        <label for="name_receiver" class="form-label">Tên người nhận</label>
                        <input type="text" class="form-control" id="name_receiver" placeholder="Thái Tử Hoàng" name="name_receiver" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email_receiver" class="form-label">Email người nhận</label>
                        <input type="email" class="form-control" id="email_receiver" placeholder="padao8a3@gmail.com" name="email_receiver" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_receiver" class="form-label">Số điện thoại người nhận</label>
                        <input type="number" class="form-control" id="phone_receiver" placeholder="0822006661" name="phone_receiver" required>
                    </div>
                    <div class="mb-3">
                        <label for="address_receiver" class="form-label">Địa chỉ người nhận</label>
                        <input type="text" class="form-control" id="address_receiver" placeholder="238/30 Hà Giang" name="address_receiver" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <select class="form-select city" aria-label="Default select example" name="city" required>
                                <option selected>Tỉnh/Thành Phố</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->matp }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-select province" aria-label="Default select example" name="province" required>
                                <option>Quận/Huyện</option>
                            </select>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<style>
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus{
        -webkit-text-fill-color: #000000;
    }
</style>

