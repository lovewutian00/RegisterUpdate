<div class="col-md-12">
    <div class="search-form">
        <form class="navbar-form" method="POST" action="{{ route('search') }}" aria-label="{{ __('Search') }}">
        @csrf
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Job" name="key" id="key" >
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>
        </form>
    </div>
</div>