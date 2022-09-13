<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Welcome {{ Auth::user()->name }}</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>

                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d/m/y') }}.
                                        {{ $user->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @endforeach


                            </tr>
                        </tbody>
                    </table>
                    {{-- @foreach ($users as $user)
                    <p>{{ $loop->index + 1 }}. {{ $user->name }}</p>
                @endforeach --}}
                    {{-- {{ __('You are logged in!') }} --}}
                    {{ $users->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Add User') }}</div>

                <div class="card-body">
                    @if (session('user_status'))
                        <div class="alert alert-success">
                            {{ session('user_status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ url('/user/insert') }}">
                        @csrf
                        <div class="form-group">
                            {{-- @error('category_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="name" name="name">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="email"
                                name="email">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="password"
                                name="password">
                            <br>
                            <label for="">Role</label>
                            <select name="role" class="form-control" id="">
                                <option value="">-Select One-</option>
                                <option value="2">Admin</option>
                                <option value="3">Shop Keeper</option>
                            </select>

                        </div>

                        <button type="submit" class="btn btn-primary">Add User</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
