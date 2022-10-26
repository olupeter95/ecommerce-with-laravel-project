<div class="col-md-2"><br>
                <img src="{{ (!empty($user->profile_photo_path)) ? 
                url('storage/upload/user_image/'.$user->profile_photo_path) : url('storage/upload/no_image.jpg')  }}" 
                alt="User Avatar" alt="" style="width:100%; height:50%; border-radius:50%"
                class="card-img-top"><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ route('change.user.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('my-orders') }}" class="btn btn-primary btn-sm btn-block">My Order</a>
                        <a href="{{ route('view-returned-orders') }}" class="btn btn-primary btn-sm btn-block">Returned Order</a>
                        <a href="{{ route('cancel-orders') }}" class="btn btn-primary btn-sm btn-block">Cancelled Order</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
            </div>