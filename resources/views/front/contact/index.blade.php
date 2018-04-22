@extends('layouts.front_master')

@section('content')
    <div id="content">
        <div class="container floated">
            <div class="sixteen floated page-title">
                <h2>Contact Us</h2>
            </div>
        </div>
        <div class="container floated">
            <div class="eleven floated">
                <section class="page-content">
                    <h3 class="margin-reset">Our Location</h3>
                    <br />
                    <section class="google-map-container">
                        <div id="googlemaps" class="google-map google-map-full" style="padding-bottom:40%"></div>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-eEkmdPjDzDlSjFQEOXAv5c3zHeJoWSM"></script>
                        <script src="https://cdn.jsdelivr.net/gmap3/7.2.0/gmap3.min.js"></script>
                        <script type="text/javascript">
                            {{--jQuery('#googlemaps').gMap({--}}
                                {{--maptype: 'ROADMAP',--}}
                                {{--scrollwheel: false,--}}
                                {{--zoom: 16,--}}
                                {{--markers: [--}}
                                    {{--{--}}
                                        {{--address: '{{ $contact->gmap_address }}',--}}
                                        {{--html: '',--}}
                                        {{--popup: false--}}
                                    {{--}--}}
                                {{--]--}}
                            {{--});--}}

                            var center = [{{ $contact->gmap_address }}];
                            $('#googlemaps')
                                .gmap3({
                                    center: center,
                                    zoom: 16,
                                    mapTypeId : google.maps.MapTypeId.ROADMAP
                                })
                                .marker({
                                    position: center,
                                    icon: 'http://maps.google.com/mapfiles/marker_green.png'
                                });

                        </script>
                    </section>
                </section>
            </div>
            <div class="four floated sidebar right">
                <aside class="sidebar padding-reset">
                    <div class="widget">
                        <h4>General Information</h4>
                        <ul class="contact-informations">
                            <li><span class="address">{{ $contact->address_line_1 }}</span></li>
                            <li><span class="address">{{ $contact->address_line_2 }}</span></li>
                        </ul>
                        <ul class="contact-informations second">
                            <li><i class="halflings headphones"></i> <p>{{ $contact->phone }}</p></li>
                            <li><i class="halflings envelope"></i> <p>{{ $contact->email }}</p></li>
                            <li><i class="halflings globe"></i> <p>{{ $contact->website }}</p></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection