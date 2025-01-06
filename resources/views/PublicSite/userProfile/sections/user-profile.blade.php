<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    
    <style>
    /*--------------------------------------------------------------
    # User-Profile
    --------------------------------------------------------------*/

    .custom-card {
        border-radius: 15px;
        border: none;
        box-shadow: 0 0 20px rgba(177, 116, 87, 0.1);
        transition: transform 0.3s ease;
    }

    .custom-card:hover {
        transform: translateY(-5px);
    }

    .profile-header {
        background: linear-gradient(135deg, #b17457 0%, #925c42 100%);
        color: white;
        border-radius: 15px 15px 0 0;
        padding: 20px;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        box-shadow: 0 0 0 2px rgba(177, 116, 87, 0.2);
        border-color: #b17457;
    }

    .btn-custom {
        background: linear-gradient(135deg, #b17457 0%, #925c42 100%);
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(177, 116, 87, 0.3);
        background: linear-gradient(135deg, #c49081 0%, #b17457 100%);
        color: white;
    }

    .input-group-text {
        background-color: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 8px 0 0 8px;
        color: #b17457;
    }

    .profile-icon {
        font-size: 1.2rem;
        color: #b17457;
    }

    .form-label {
        font-weight: 500;
        color: #374151;
        margin-bottom: 8px;
    }

    .card-body {
        padding: 2rem;
    }

    .form-select {
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    .form-select:focus {
        box-shadow: 0 0 0 2px rgba(177, 116, 87, 0.2);
        border-color: #b17457;
    }

    /* Order History Styles */
    .orders-slider {
        position: relative;
        padding: 0 40px;
    }

    .order-slide {
        padding: 10px;
    }

    .order-card {
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
        background: white !important;
    }

    .order-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(177, 116, 87, 0.15);
    }

    .order-details {
        padding: 15px 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .order-items {
        padding-top: 15px;
    }

    /* Slick Slider Custom Styles */
    .slick-prev,
    .slick-next {
        width: 30px;
        height: 30px;
        background: linear-gradient(135deg, #b17457 0%, #925c42 100%);
        border-radius: 50%;
        z-index: 1;
    }

    .slick-prev:hover,
    .slick-next:hover {
        background: linear-gradient(135deg, #c49081 0%, #b17457 100%);
    }

    .slick-prev:before,
    .slick-next:before {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 14px;
    }

    .slick-prev:before {
        content: "\f104";
    }

    .slick-next:before {
        content: "\f105";
    }

    .slick-prev {
        left: 0;
    }

    .slick-next {
        right: 0;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .orders-slider {
            padding: 0 20px;
        }
    }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold" style="color: #b17457;">User Profile</h2>
            <p class="text-muted">Manage your personal information and security settings</p>
        </div>
        
        <div class="row g-4">
            <!-- Profile Details Card -->
            <div class="col-md-6">
                <div class="custom-card">
                    <div class="profile-header">
                        <h4 class="m-0 text-white"><i class="fas fa-user-circle me-2"></i>Profile Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-user profile-icon me-3"></i>
                                <div>
                                    <h6 class="mb-0">{{ $user->name }} {{ $user->last_name }}</h6>
                                    <small class="text-muted">Full Name</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-envelope profile-icon me-3"></i>
                                <div>
                                    <h6 class="mb-0">{{ $user->email }}</h6>
                                    <small class="text-muted">Email Address</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-phone profile-icon me-3"></i>
                                <div>
                                    <h6 class="mb-0">{{ $user->phone_number }}</h6>
                                    <small class="text-muted">Phone Number</small>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('user.profile.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">City</label>
                                <select class="form-select" name="city">
                                    <option value="" disabled selected>{{ $user->city ?? 'Select your city' }}</option>
                                    @foreach(['Amman', 'Zarqa', 'Irbid', 'Aqaba', 'Madaba', 'Jerash', 'Ajloun', 'Karak', 'Tafilah', 'Maan', 'Balqa', 'Mafraq'] as $city)
                                        <option value="{{ $city }}" {{ $user->city == $city ? 'selected' : '' }}>{{ $city }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Street</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-road"></i></span>
                                    <input type="text" name="street" class="form-control" value="{{ $user->street }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-custom w-100">
                                <i class="fas fa-save me-2"></i>Update Profile
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Change Password Card -->
            <div class="col-md-6">
                <div class="custom-card">
                    <div class="profile-header">
                        <h4 class="m-0 text-white"><i class="fas fa-lock me-2"></i>Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.profile.change-password') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">Current Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" name="current_password" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="new_password" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Confirm New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="new_password_confirmation" class="form-control" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-custom w-100">
                                <i class="fas fa-key me-2"></i>Change Password
                            </button>
                        </form>
                    </div> 
                </div>
            </div>

            <!-- Order History Card -->
            <div class="col-12">
                <div class="custom-card">
                    <div class="profile-header">
                        <h4 class="m-0 text-white"><i class="fas fa-shopping-bag me-2"></i>Order History</h4>
                    </div>
                    <div class="card-body">
                        @if($orders->isEmpty())
                            <p class="text-muted text-center">No orders found.</p>
                        @else
                            <div class="orders-slider">
                                @foreach($orders as $order)
                                    <div class="order-slide mb-4">
                                        <div class="order-card p-4 bg-light rounded-3">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="mb-0" style="color: #b17457;">Order #{{ $order->id }}</h5>
                                                <span class="badge" style="background: linear-gradient(135deg, #b17457 0%, #925c42 100%);">
                                                    {{ $order->order_status }}
                                                </span>
                                            </div>
                                            
                                            <div class="order-details mb-3">
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="fas fa-calendar-alt profile-icon me-2"></i>
                                                    <span>{{ $order->created_at->format('d M Y') }}</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-dollar-sign profile-icon me-2"></i>
                                                    <span>${{ $order->order_total }}</span>
                                                </div>
                                            </div>

                                            <div class="order-items">
                                                <h6 class="mb-2" style="color: #374151;">Items:</h6>
                                                <ul class="list-unstyled">
                                                    @foreach($order->items as $item)
                                                        <li class="d-flex align-items-center mb-2">
                                                            <i class="fas fa-circle me-2" style="font-size: 0.5rem; color: #b17457;"></i>
                                                            {{ $item->item_name }} 
                                                            <span class="ms-2 text-muted">(x{{ $item->pivot->quantity }})</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Slick Slider JS -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Initialize Slick Slider -->
    <script>
        $(document).ready(function(){
            $('.orders-slider').slick({
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>'
                swipe: true,
                accessibility: true
            });
        });
    </script>
</body>
</html>