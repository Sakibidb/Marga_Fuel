<?php

$about = App\Models\backend\Aboutus::first();
$privacy =App\Models\backend\Privacy::first();
$terms= App\Models\backend\TermsCondition::first();
$refund= App\Models\backend\Refund::first();
$webcontent= App\Models\backend\Webcontent::first();
$contact = App\Models\backend\CompanyInformation::first();
// $select = App\Models\backend\OrderPageSelectColumn::all();





    return [
        'Civil-Service'                         => 'নাগরিক সেবা',
        'home'                                  => 'হোম',
        'more'                                  => 'আরও পরিষেবা',
        'contact'                               => 'যোগাযোগ',
        'solution'                              => 'ফুয়েল সলিউশন',
        'footHead'                              => 'সামাজিক নেটওয়ার্কগুলিতে আমাদের সাথে সংযুক্ত হন:',
        'quick'                                 => 'দ্রুত যোগাযোগ',
        'name'                                  => 'নাম',
        'email'                                 => 'ইমেইল',
        'message'                               => 'বার্তা',
        'send'                                  => 'আপনার বার্তা পাঠান',
        'contact'                               => 'যোগাযোগ',
        'help'                                  => 'সাহায্য',
        'ab'                                    => 'আমাদের সম্পর্কে',
        'pr'                                    => 'গোপনীয়তা নীতি',
        'te'                                    => 'বিধি - নিষেধ এবং শর্তাবলী',
        're'                                    => 'রিফান্ড এবং রিটার্ন নীতি',
        'order_now'                             => 'এখনি অর্ডার করুন',
        'order_place'                           => 'অর্ডার করুন',
        'price'                                 => 'মূল্য',

        // checkout page
        'p_name'                                 => 'পণ্যের নাম',
        'o_details'                              => 'অর্ডার বিবরণী',
        'your_order'                             => 'আপনার অর্ডার',
        'p_type'                                 => 'পেমেন্টের ধরণ',
        't_price'                                => 'মোট দাম',
        'online'                                 => 'অনলাইন',
        'cash'                                   => 'নগদ মূল্যে প্রদান',
        'by'                                     => 'মার্গা নেট অ্যাপ থেকে পণ্য/পরিষেবা ক্রয় করে। আমি Marga Net one LTD-এর সমস্ত শর্তাবলী সম্পূর্ণরূপে সম্মত এবং স্বীকার করছি।',
        'address'                                => 'ঠিকানা',
        's_quantity'                             => 'পরিমাণ বাছাই করুন',
        'quantity'                               => 'নির্বাচন করুন',
        '15'                                     => '১৫ লিটার',
        '20'                                     => '২০ লিটার',
        '25'                                     => '২৫ লিটার',
        'login'                                  => 'প্রবেশ করুন',
        'registration'                           => 'নিবন্ধন করুন',
        'forgate'                                => 'পাসওয়ার্ড ভুলে গেছেন?',
        'dont'                                   => 'অ্যাকাউন্ট নেই?',
        'password'                               => 'পাসওয়ার্ড',
        'welcome'                                => 'স্বাগত, একটি অ্যাকাউন্ট তৈরি করুন',
        'have'                                   => 'একাউন্ট আছে?',
        'confirm'                                => 'পাসওয়ার্ড নিশ্চিত করুন',
        'nid'                                    => 'NID/ড্রাইভিং লাইসেন্স',
        'mobile'                                 => 'মোবাইল নম্বর',









        // checkout page end

        // 6 service
        'car_wash'                              => 'গাড়ী ধোয়া',
        'lube_oil'                              => 'তেল',
        'tyres'                                 => 'টায়ার',
        'services'                              => 'সার্ভিসেস',
        'battery'                               => 'ব্যাটারি',
        'inspection'                            => 'পরীক্ষা',
        // 6 service end

        // Customer Deshboard

        'hello'                                 => 'হ্যালো',
        'personal'                              => 'ব্যক্তিগত তথ্য',
        'mypersonal'                            => 'আমার ব্যক্তিগত তথ্য',
        'mo'                                    => 'আমার অর্ডার',
        'mao'                                   => 'আমার সব অর্ডার',





        'about'   => $about->banglaDescription ?? '',
        'privacy'   => $privacy->banglaDescription ?? '',
        'terms'   => $terms->banglaDescription ?? '',
        'refund'   => $refund->banglaDescription ?? '',
        'footer_description'   => $webcontent->bangla_footer ?? '',
        'header_text'   => $webcontent->bangla_text ?? '',
        'header_scrolling'   => $webcontent->bangla_scrolling ?? '',
        'cardup'   => $webcontent->bangla_cardup ?? '',
        'company_name'   => $contact->bangla_company_name ?? '',
        // 'selects'   => $select->category_bn,
   ];
