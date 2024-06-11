<?php
$about = App\Models\backend\Aboutus::first();
$privacy =App\Models\backend\Privacy::first();
$terms= App\Models\backend\TermsCondition::first();
$refund= App\Models\backend\Refund::first();
$webcontent= App\Models\backend\Webcontent::first();
$contact = App\Models\backend\CompanyInformation::first();
// $select = App\Models\backend\OrderPageSelectColumn::all();





    return [
        'Civil-Service'                         => 'Nagorik Seba',
        'home'                                  => 'HOME',
        'more'                                  => 'MORE SERVICE',
        'contact'                               => 'CONTACTS',
        'solution'                              => 'FUEL SOLUTION',
        'footHead'                              => 'Get connected with us on social networks:',
        'quick'                                 => 'QUICK CONTACTS',
        'name'                                  => 'Name',
        'email'                                 => 'Email',
        'message'                               => 'Message',
        'send'                                  => 'SEND YOUR MESSAGE',
        'contact'                               => 'CONTACT',
        'help'                                  => 'HELP',
        'ab'                                    => 'About Us',
        'pr'                                    => 'Privacy Policy',
        'te'                                    => 'Terms & Condition',
        're'                                    => 'Refund & Return Policy',
        'order_now'                             => 'Order Now',
        'order_place'                           => 'Place Order',
        'price'                                 => 'Price',

        // checkout page
        'p_name'                                 => 'Product Name',
        'o_details'                              => 'Order Details',
        'your_order'                             => 'Your Order',
        'p_type'                                 => 'Payment Type',
        't_price'                                => 'Total Price',
        'online'                                 => 'Online',
        'cash'                                   => 'Cash on Delivery',
        'by'                                     => 'By purchasing products/services from Marga Net App. I fully agree and accept all the terms and condition of Marga Net one LTD.',
        'address'                                => 'Address',
        'quantity'                               => 'Select',
        's_quantity'                             => 'Select Quantity',
        '15'                                     => '15L',
        '20'                                     => '20L',
        '25'                                     => '25L',


        // login registration
        'login'                                  => 'LOGIN',
        'registration'                           => 'REGISTRATION',
        'forgate'                                => 'Forgot Password?',
        'dont'                                   => 'Dont Have Account?',
        'password'                               => 'Password',
        'welcome'                                => 'Welcome, Please Create an acount',
        'have'                                   => 'Have an account?',
        'confirm'                                => 'Confirm Password',
        'nid'                                    => 'NID/Driving Licence',
        'mobile'                                 => 'Mobile Number',



        // checkout page end
        // 6 service
        'car_wash'                              => 'Car Wash',
        'lube_oil'                              => 'Lube oil',
        'tyres'                                 => 'Tyres',
        'services'                              => 'Services',
        'battery'                               => 'Battery',
        'inspection'                            => 'Inspection',
        // 6 service end


        // Customer Deshboard

        'hello'                                 => 'Hello',
        'personal'                              => 'Personal Information',
        'mypersonal'                            => 'My Personal Information',
        'mo'                                    => 'My Order',
        'mao'                                   => 'My All Order',




        'about'   => $about->description ?? '',
        'privacy'   => $privacy->description ?? '',
        'terms'   => $terms->description ?? '',
        'refund'   => $refund->description ?? '',
        'footer_description'   => $webcontent->footer ?? '',
        'header_text'   => $webcontent->text ?? '',
        'header_scrolling'   => $webcontent->scrolling ?? '',
        'cardup'   => $webcontent->cardup ?? '',
        'company_name'   => $contact->name ?? '',
        // 'selects'   => $select->category_en,

   ];
