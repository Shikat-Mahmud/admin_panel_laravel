@extends('admin.layouts.master')
@section('title', 'Admin Panel')
@push('styles')
<style>
    .highlight {
        background-color: yellow;
    }
    .table-responsive {
        margin-top: 20px;
    }
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }
    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }
    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }
    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: 2px;
    }
</style>
@endpush
@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <div class="p-3 row">
                <div id="search-results" class="col">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-primary order-card">
                        <div class="card-body">
                            <h6 class="text-white">Orders Received</h6>
                            <h2 class="text-end text-white"><i
                                    class="feather icon-shopping-cart float-start"></i><span>486</span>
                            </h2>
                            <p class="m-b-0">Completed Orders<span class="float-end">351</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-success order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Sales</h6>
                            <h2 class="text-end text-white"><i class="feather icon-tag float-start"></i><span>1641</span>
                            </h2>
                            <p class="m-b-0">This Month<span class="float-end">213</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-warning order-card">
                        <div class="card-body">
                            <h6 class="text-white">Revenue</h6>
                            <h2 class="text-end text-white"><i
                                    class="feather icon-repeat float-start"></i><span>$42,562</span></h2>
                            <p class="m-b-0">This Month<span class="float-end">$5,032</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-danger order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Profit</h6>
                            <h2 class="text-end text-white"><i
                                    class="feather icon-award float-start"></i><span>$9,562</span></h2>
                            <p class="m-b-0">This Month<span class="float-end">$542</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-7">
                    <div class="card">
                        <div class="card-header">
                            <h5>New Order From United States</h5>
                        </div>
                        <div class="card-body">
                            <div id="world-map-markers" class="set-map" style="height:365px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-5">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>New Order From United States</h5>
                            <div class="dropdown">
                                <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                        class="material-icons-two-tone f-18">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avtar avtar-s bg-light-primary flex-shrink-0">
                                    <i class="ph ph-money f-20"></i>
                                </div>
                                <div class="media-body ms-3">
                                    <p class="mb-0 text-muted">Total Earnings</p>
                                    <h5 class="mb-0">$249.95</h5>
                                </div>
                            </div>
                            <div id="earnings-users-chart"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="media align-items-center">
                                        <div class="avtar avtar-s bg-grd-primary flex-shrink-0">
                                            <i class="ph ph-money f-20 text-white"></i>
                                        </div>
                                        <div class="media-body ms-2">
                                            <p class="mb-0 text-muted">Total Profit</p>
                                            <h6 class="mb-0">$1,783</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="media align-items-center">
                                        <div class="avtar avtar-s bg-grd-success flex-shrink-0">
                                            <i class="ph ph-shopping-cart text-white f-20"></i>
                                        </div>
                                        <div class="media-body ms-2">
                                            <p class="mb-0 text-muted">Product Sold</p>
                                            <h6 class="mb-0">15,830</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card statistics-card-1">
                        <div class="card-body">
                            <img src="{{ asset('/images/widget/img-status-4.svg') }}"
                                alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                                <h6 class="mb-0">Daily Sales</h6>
                                <div class="dropdown">
                                    <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            class="material-icons-two-tone f-18">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0">$249.95</h3>
                                <span class="badge bg-light-success ms-2">36%</span>
                            </div>
                            <p class="text-muted mb-2 text-sm mt-3">You made an extra 35,000 this daily</p>
                            <div class="progress" style="height: 7px">
                                <div class="progress-bar bg-brand-color-1" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card statistics-card-1">
                        <div class="card-body">
                            <img src="{{ asset('/images/widget/img-status-5.svg') }}"
                                alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                                <h6 class="mb-0">Monthly Sales</h6>
                                <div class="dropdown">
                                    <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            class="material-icons-two-tone f-18">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0">$249.95</h3>
                                <span class="badge bg-light-primary ms-2">20%</span>
                            </div>
                            <p class="text-muted mb-2 text-sm mt-3">You made an extra 35,000 this Monthly</p>
                            <div class="progress" style="height: 7px">
                                <div class="progress-bar bg-brand-color-3" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card statistics-card-1 bg-brand-color-1">
                        <div class="card-body">
                            <img src="{{ asset('/images/widget/img-status-6.svg') }}"
                                alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                                <h6 class="mb-0 text-white">Yearly Sales</h6>
                                <div class="dropdown">
                                    <a class="avtar avtar-xs btn-link-secondary bg-transparent text-white dropdown-toggle arrow-none"
                                        href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><i
                                            class="material-icons-two-tone bg-white f-18">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">View</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <h3 class="text-white f-w-300 d-flex align-items-center m-b-0">$249.95</h3>
                            </div>
                            <p class="text-white text-opacity-75 mb-2 text-sm mt-3">You made an extra 35,000 this Daily</p>
                            <div class="progress" style="height: 7px">
                                <div class="progress-bar bg-brand-color-3" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>Recent Orders</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Code</th>
                                        <th>Customer</th>
                                        <th>Purchased On</th>
                                        <th>Status</th>
                                        <th>Transaction ID</th>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ asset('/images/widget/p1.jpg') }}" alt="prod img" class="img-fluid">
                                        </td>
                                        <td>PNG002413</td>
                                        <td>Jane Elliott</td>
                                        <td>06-01-2017</td>
                                        <td><span class="badge bg-primary">Shipping</span></td>
                                        <td>#7234421</td>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ asset('/images/widget/p2.jpg') }}" alt="prod img" class="img-fluid">
                                        </td>
                                        <td>PNG002344</td>
                                        <td>John Deo</td>
                                        <td>05-01-2017</td>
                                        <td><span class="badge bg-danger">Failed</span></td>
                                        <td>#7234486</td>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ asset('/images/widget/p3.jpg') }}" alt="prod img" class="img-fluid">
                                        </td>
                                        <td>PNG002653</td>
                                        <td>Eugine Turner</td>
                                        <td>04-01-2017</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td>#7234417</td>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ asset('/images/widget/p4.jpg') }}" alt="prod img" class="img-fluid">
                                        </td>
                                        <td>PNG002156</td>
                                        <td>Jacqueline Howell</td>
                                        <td>03-01-2017</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>#7234454</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#search-button').on('click', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var query = $('#search-input').val();

            $.ajax({
                url: '{{ route('admin.search') }}', // Use route helper
                method: 'GET',
                data: {
                    query: query
                },
                success: function(response) {
                    // Process the response (update the DOM with search results)
                    var resultsDiv = $('#search-results');
                    resultsDiv.empty(); // Clear previous results

                    // Check if response is empty
                    if (response.length === 0) {
                        resultsDiv.append('<p>No results found</p>');
                    } else {
                        // Iterate over the response and append the results
                        response.forEach(function(result) {
                            var resultHtml = '<div style="margin-bottom: 30px;">';
                            resultHtml += '<h4>' + result.model + '</h4>'; // Model name
                            resultHtml += '<div class="table-responsive"><table class="table table-bordered"><tbody>';

                            for (var key in result) {
                                if (result.hasOwnProperty(key) && key !== 'model') {
                                    var value = result[key];

                                    // Highlight the search term
                                    var regex = new RegExp('(' + query + ')', 'gi');
                                    value = String(value).replace(regex, '<span style="background-color: yellow;">$1</span>');

                                    // Check if the key is 'photo' and render an image
                                    if (key === 'photo' || key === 'image' || key.includes('photo') || key.includes('image')) {
                                        var imagePath = '{{ asset('storage') }}/' + result[key];
                                        resultHtml += '<tr><td>' + key + '</td><td><img src="' + imagePath + '" alt="' + result[key] + '" style="max-width: 100px;"></td></tr>';
                                    } else {
                                        resultHtml += '<tr><td>' + key + '</td><td>' + value + '</td></tr>';
                                    }
                                }
                            }

                            resultHtml += '</tbody></table></div></div>';
                            resultsDiv.append(resultHtml);
                        });
                    }
                },
                error: function(xhr) {
                    // Handle error
                    console.error(xhr);
                    alert('An error occurred while processing your request.');
                }
            });
        });
    });
</script>
@endpush