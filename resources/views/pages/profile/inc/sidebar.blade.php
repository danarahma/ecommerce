<div class="col-sm-4">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" style="border-radius: 50%;" src="#" height="100%" width="100%" alt="Card Image Cap">
        <ul class="list-group list-group-flush">
            <a href="{{ route('home') }}" class="btn btn-primary btn-sm btn-block">Home</a>
            <a href="{{ route('user.order') }}" class="btn btn-primary btn-sm btn-block">My Orders</a>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{_('Logout')}}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
</div>