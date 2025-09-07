<form action="<?= BASE_URL ?>?action=register" method="post" >
    <div class="mb-3">
        <label for="Name" class="form-label">Name</label>
        <input type="text" class="form-control" id="Name" name="name">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="password">
  </div>
  <div class="mb-3">
    <label for="Confirm" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="Confirm" name="confirm">
  </div>
  <div class="mb-3">
    <label for="PhoneNumber" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="PhoneNumber" name="phone">
  </div>
  <div class="mb-3">
    <label for="Address" class="form-label">Address</label>
    <textarea id="Address" class="form-control" name="address"></textarea>
  </div>
  <div class="flex">
    <span>Đã có tài khoản - </span> 
    <a href="<?= BASE_URL ?>?action=login">Đăng nhập</a>
  </div>
  <button type="submit" class="btn btn-primary">Đăng ký</button>
</form>