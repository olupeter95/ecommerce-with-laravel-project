@extends('admin.admin_master')

@section('content')

<section class="content">
    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <h3 class="card-header">Search By Date</h3>
                <div class="card-body">
                    <form action="{{route('search-by-date')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="date">Select Date</label>
                            <input type="Date" class="form-control" name="date">
                            @error('date')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div><!--- end card --->
        </div>
        <div class="col-md-4">
            <div class="card">
                <h3 class="card-header">Search By Month</h3>
                <div class="card-body">
                    <form action="{{route('search-by-month')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="date">Select Month</label>
                             <select name="month" id="month" class="form-control">
                                <option>Choose One</option>
                                <option value="January">January</option>
                                <option value="Febuary">Febuary</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            @error('month')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="year">Select Year</label>
                            <select name="year" id="year" class="form-control">
                                <option>Choose One</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                            @error('year')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div><!--- end card --->
        </div>

        <div class="col-md-4">
            <div class="card">
                <h3 class="card-header">Select Year</h3>
                <div class="card-body">
                    <form action="{{route('search-by-year')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="year">Year</label>
                            <select name="year" id="year" class="form-control">
                                <option>Choose One</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                            @error('year')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div><!--- end card --->

        </div>
 
    </div>
</section>
@endsection