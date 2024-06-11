@php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $to = 'tarikulislam.smartsoftware@gmail.com';
        $subject = "New message from $name";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Send email
        if (mail($to, $subject, $body)) {
            echo 'Your message has been sent successfully.';
        } else {
            echo 'Failed to send your message. Please try again later.';
        }
    }
@endphp


@php
    $company = App\Models\backend\CompanyInformation::first();
@endphp

<style>
    .cover {
        background-image: url({{ asset('images/' . $company->cantactbackground ?? '') }});
        /* Replace 'background.jpg' with the path to your background image */
        background-size: cover;
        background-position: center;
    }

    .form-container {
        background: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .custom-btn {
        background-color: #F9C700;
        height: 65px;
        width: 300px;
        border: none;
    }

    .custom-btn:hover {
        /* Optionally, you can add hover effects */
        background-color: #F9C700;
        /* Change to a darker shade of yellow on hover */
    }

    #name::placeholder {
        color: white;
        /* Set the color of the placeholder text */
    }

    #email::placeholder {
        color: white;
        /* Set the color of the placeholder text */
    }

    #message::placeholder {
        color: white;
        /* Set the color of the placeholder text */
    }
</style>
<div class="cover mb-5">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <h2 class="text-center text-white mt-5 mb-4">{{ __('language.quick') }}</h2>
                <form action="" method="POST">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="{{ __('language.name') }}" required
                            style="background-color: transparent; color: white;">
                    </div>
                    <div class="form-group">
                        <input style="background-color: transparent; color: white;" type="email" class="form-control"
                            id="email" name="email" placeholder="{{ __('language.email') }}" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="message" name="message" placeholder="{{ __('language.message') }}" rows="5"
                            required style="background-color: transparent; color: white;"></textarea>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <button type="submit"
                                    class="btn btn-primary btn-block mb-5 custom-btn">{{ __('language.send') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
