@extends('backend.layout.app')

@section('content')
    <style>
        .switch-initial {
            position: relative;
            width: 30px;
            height: 30px;
            background-color: rgb(153, 153, 153);
            border-radius: 50%;
            z-index: 1;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgb(187, 187, 187);
            box-shadow: 0px 0px 2px rgb(248, 248, 248) inset;
        }

        .powersign-initial {
            position: relative;
            width: 40%;
            height: 40%;
            border: 2px solid rgb(248, 248, 248);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .powersign-initial::before {
            content: "";
            width: 4px;
            height: 60%;
            background-color: rgb(248, 248, 248);
            position: absolute;
            top: -60%;
            z-index: 2;
        }

        .powersign-initial::after {
            content: "";
            width: 2px;
            height: 60%;
            background-color: rgb(182, 182, 182);
            position: absolute;
            top: -60%;
            z-index: 3;
        }
    </style>
    <style>
        .switch-active {
            position: relative;
            width: 30px;
            height: 30px;
            background-color: rgb(136, 219, 150);
            border-radius: 50%;
            z-index: 1;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgb(255, 255, 255);
            box-shadow: 0px 0px 1px rgb(150, 255, 194) inset,
            0px 0px 1px rgb(150, 255, 194) inset,
            0px 0px 5px rgb(150, 255, 194) inset,
            0px 0px 20px rgb(150, 255, 194),
            0px 0px 50px rgb(150, 255, 194),
            0px 0px 3px rgb(150, 255, 194);
        }

        .powersign-active {
            position: relative;
            width: 40%;
            height: 40%;
            border: 2px solid rgb(255, 255, 255);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 5px rgb(151, 243, 255),
            0px 0px 3px rgb(151, 243, 255) inset;
        }

        .powersign-active::before {
            content: "";
            width: 4px;
            height: 60%;
            background-color: rgb(255, 255, 255);
            position: absolute;
            top: -60%;
            z-index: 2;
        }

        .powersign-active::after {
            content: "";
            width: 2px;
            height: 60%;
            background-color: rgb(150, 255, 194);
            position: absolute;
            top: -60%;
            z-index: 3;
        }
    </style>


    <div class="card">
        <div class="card-header">
            <h5>List of Users</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-styling table-hover">
                    <thead>
                    <tr class="table-primary">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }} (<span style="font-style: italic; color: #0a966c;">{{ $user->role->name }}</span>)</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->status == 1)
                                    <a href="/user-stats-change/{{ $user->id }}" class="switch-link">
                                        <div class="switch-active">
                                            <div class="powersign-active"></div>
                                        </div>
                                    </a>
                                @else
                                    <a href="/user-stats-change/{{ $user->id }}" class="switch-link">
                                        <div class="switch-initial">
                                            <div class="powersign-initial"></div>
                                        </div>
                                    </a>
                                @endif

                            </td>
                            <td style="overflow: hidden;">
                                <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}" style="width: 40px; float: left; margin-right: 2px;"><i class="icofont icofont-edit-alt"></i></a>
                                <form action="{{ route('user.destroy', $user->id ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="width: 40px" {{ $user->id==1 ? 'disabled' : '' }}>
                                        <i class="icofont icofont-bin"></i>
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
    <script>
        {!! session('success') ? 'showToast("Status Changed!", 5000, "rgba(13, 179, 13, 0.77)", "#fff");' : (session('error') ? 'showToast("You cannot make you off!", 5000, "rgba(13, 179, 13, 0.77)", "#fff");' : '') !!}
        function showToast(message, duration, bgColor, textColor) {
            var toastContainer = document.createElement("div");
            toastContainer.textContent = message;
            toastContainer.style.position = "fixed";
            toastContainer.style.bottom = "90%";
            toastContainer.style.right = "2%";
            toastContainer.style.transform = "translateX(-50%)";
            toastContainer.style.backgroundColor = bgColor;
            toastContainer.style.color = textColor;
            toastContainer.style.padding = "10px 20px";
            toastContainer.style.fontSize = "16px";
            toastContainer.style.borderRadius = "5px";
            toastContainer.style.zIndex = 9999;
            toastContainer.style.textShadow = "2px 2px 4px rgba(0, 0, 0, 0.5)";
            toastContainer.style.boxShadow = "0px 4px 8px rgba(0, 0, 0, 0.3)";
            document.body.appendChild(toastContainer);
            setTimeout(function () {
                document.body.removeChild(toastContainer);
            }, duration);
        }
    </script>
@endsection
