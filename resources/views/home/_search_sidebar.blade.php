<div class="col-md-3">
    <form method="POST" action="{{ route('criteria') }}" aria-label="{{ __('Criteria') }}">
    @csrf
    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-calendar-check-o"></i> Search Criteria <span class="badge pull-right"></span></h3>
        </div>
        <div class="panel-body">
            <div class="nav nav-pills nav-stacked category-menu">
                <div class="form-group">
                    <input type="text" name="key" id="key"  class="form-control" placeholder="Keyword" @if(!empty($find['key'])) value="{{ $find['key'] }}" @endif>
                </div>
<!--                <div class="form-group">
                    <select class="form-control m-bot15" id="Sub_Id" name="Sub_Id" title="Specialization">
                        <option value="">All Specialization</option>
                        @if($categories->count() != 0)
                        @foreach($categories as $category)
                        <optgroup label="{{ $category->Cat_Name }}">
                            @foreach($category->Job_sub_categories as $sub)
                            <option value="{{ $sub->Sub_Id }}" @if(!empty($find['spec']) && $find['spec']== $sub->Sub_Id)  selected  @endif >{{ $sub->Sub_Name }}</option>
                            @endforeach
                        </optgroup>
                        @endforeach
                        @else
                            <option>No record found</option>
                        @endif
                    </select>
                </div>-->
                <div class="form-group">
                    <select class="form-control m-bot15" id="Loc_Name" name="Loc_Name" name="Location" title="Location">
                        <option value="">All Location</option>
                        <option value="Johor" @if(!empty($find['loc']) && $find['loc']== 'Johor')  selected  @endif>Johor</option>
                        <option value="Kedah" @if(!empty($find['loc']) && $find['loc']== 'Kedah')  selected  @endif>Kedah</option>
                        <option value="Kelantan" @if(!empty($find['loc']) && $find['loc']== 'Kelantan')  selected  @endif>Kelantan</option>
                        <option value="Kuala Lumpur" @if(!empty($find['loc']) && $find['loc']== 'Kuala Lumpur')  selected  @endif>Kuala Lumpur</option>
                        <option value="Melaka" @if(!empty($find['loc']) && $find['loc']== 'Melaka')  selected  @endif>Melaka</option>
                        <option value="Negeri Sembilan" @if(!empty($find['loc']) && $find['loc']== 'Negeri Sembilan')  selected  @endif>Negeri Sembilan</option>
                        <option value="Pahang" @if(!empty($find['loc']) && $find['loc']== 'Pahang')  selected  @endif>Pahang</option>
                        <option value="Penang" @if(!empty($find['loc']) && $find['loc']== 'Penang')  selected  @endif>Penang</option>
                        <option value="Perak" @if(!empty($find['loc']) && $find['loc']== 'Perak')  selected  @endif>Perak</option>
                        <option value="Perlis" @if(!empty($find['loc']) && $find['loc']== 'Perlis')  selected  @endif>Perlis</option>
                        <option value="Sabah" @if(!empty($find['loc']) && $find['loc']== 'Sabah')  selected  @endif>Sabah</option>
                        <option value="Sarawak" @if(!empty($find['loc']) && $find['loc']== 'Sarawak')  selected  @endif>Sarawak</option>
                        <option value="Selangor" @if(!empty($find['loc']) && $find['loc']== 'Selangor')  selected  @endif>Selangor</option>
                        <option value="Terengganu" @if(!empty($find['loc']) && $find['loc']== 'Terengganu')  selected  @endif>Terengganu</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" id="Allowance" name="Allowance" class="form-control" @if(!empty($find['min'])) value="{{ $find['min'] }}" @else placeholder="Minimum Salary" @endif>
                </div>
                <div class="form-group">
                    <button class="btn btn-info form-control" type="submit"><i class="glyphicon glyphicon-search"></i>Search
                  </button>
                </div>
            </div> 
        </div>
    </div>
    </form>

    <div class="panel panel-default sidebar-menu">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-newspaper-o"></i> Browse Job</h3>
        </div>
        <div class="panel-body">
                <ul class="nav nav-pills nav-stacked category-menu">
                    <!--<li><a href="specialization">Specializations</a></li>-->
                    <li><a href="location">Locations</a></li>
                    <li><a href="companylist">Company Names</a></li>
                </ul>
        </div>
    </div>
</div>
