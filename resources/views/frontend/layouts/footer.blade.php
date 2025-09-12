@php
    $footer = $footer ?? \App\Models\Footer::query()->latest('id')->first();
    $has = fn ($v) => isset($v) && trim($v) !== '';

    // Build WhatsApp URL
    $waUrl = null;
    if ($footer) {
        if ($has($footer->whatsapp) && preg_match('~^(https?://|whatsapp://|https://wa\.me/|https://api\.whatsapp\.com/)~i', $footer->whatsapp)) {
            $waUrl = $footer->whatsapp;
        } elseif ($has($footer->whatsapp_number)) {
            $digits = preg_replace('/\D+/', '', $footer->whatsapp_number);
            if ($has($digits)) $waUrl = 'https://wa.me/' . $digits;
        }
    }

    $telHref = $footer && $has($footer->phone) ? 'tel:' . preg_replace('/\s+/', '', $footer->phone) : null;
@endphp

<style>
    footer { color:#fff; background:#0f3a30; }
    .footer-top h4, .widget-title h3 { color:#fff; margin-bottom:15px; }

    /* --- Contact Info --- */
    .contact-info { display:flex; align-items:center; gap:14px; margin-bottom:18px; }
    .contact-icon-circle{
        width:48px;height:48px;border-radius:50%;
        background:#F2C200; display:flex;align-items:center;justify-content:center;
        flex:0 0 48px;
    }
    .contact-icon-circle i{ font-size:20px; color:#0F3A30; }
    .contact-info h5{ margin:0; font-weight:700; color:#ffffff; }
    .contact-info a, .contact-info span{ display:block; color:#ffffff; opacity:.95; }

    /* --- Social Media --- */
    .social-media{ display:flex; gap:12px; list-style:none; padding:0; margin:0; }
    .social-media a{
        width:48px;height:48px;border-radius:50%;background:#F2C200;
        display:flex;align-items:center;justify-content:center;
        text-decoration:none; transition:0.3s ease;
    }
    .social-media a:hover{ background:#ffd633; }
    .social-media i{ font-size:20px; color:#0F3A30; }

    /* --- Quick Links --- */
    .widget-title ul{ list-style:none; padding:0; }
    .widget-title ul li{ margin-bottom:8px; }
    .widget-title ul li a{ color:#fff; text-decoration:none; }
    .widget-title ul li i{ color:#F2C200; margin-right:6px; }

    /* --- Lower Footer --- */
    .wpo-lower-footer{ margin-top:30px; padding-top:20px; border-top:1px solid rgba(255,255,255,0.2);
        display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; }
    .wpo-lower-footer a{ color:#fff; margin:0 8px; text-decoration:none; }
    .wpo-lower-footer p{ margin:0; }
</style>

<footer>
    <div class="container">
        {{-- Top Section --}}
        <div class="footer-top row mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="footer-logo">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                    <h3>Islamic community centre</h3>
                </div>
            </div>

            {{-- ✅ Fixed Connect with us --}}
            <div class="col-lg-3 col-md-6">
                <h4>Connect with us</h4>
                <ul class="social-media">
                    @if($footer?->facebook)
                        <li><a href="{{ $footer->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    @endif
                    @if($footer?->instagram)
                        <li><a href="{{ $footer->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    @endif
                    @if($footer?->tiktok)
                        <li><a href="{{ $footer->tiktok }}" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                    @endif
                    @if($waUrl)
                        <li><a href="{{ $waUrl }}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                    @endif
                </ul>
            </div>

            <div class="col-lg-6">
                <h4>Subscribe Newsletter</h4>
                <form class="subscribe d-flex" method="POST" action="#">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email address..." class="form-control me-2" required>
                    <button class="btn btn-warning" type="submit">Subscribe</button>
                </form>
            </div>
        </div>

        {{-- Info + Contact + Quick Links --}}
        <div class="row Information pb-0">
            <div class="col-lg-4 col-md-6">
                <div class="widget-title">
                    <h3>Information</h3>
                    <p>QuranHome is a global online Qur’an learning platform offering live classes for kids and adults — Qaida, Nazra, Hifz, Tajweed, and Tafseer — with certified teachers and flexible schedules.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="widget-title">
                    <h3>Contact Info</h3>
                    @if($footer && $footer->phone)
                        <div class="contact-info">
                            <div class="contact-icon-circle"><i class="fas fa-phone"></i></div>
                            <div>
                                <h5>Phone No:</h5>
                                <a href="{{ $telHref }}">{{ $footer->phone }}</a>
                            </div>
                        </div>
                    @endif
                    @if($waUrl || $footer?->whatsapp_number)
                        <div class="contact-info">
                            <div class="contact-icon-circle"><i class="fab fa-whatsapp"></i></div>
                            <div>
                                <h5>WhatsApp:</h5>
                                <a href="{{ $waUrl }}">{{ $footer->whatsapp_number }}</a>
                            </div>
                        </div>
                    @endif
                    @if($footer && $footer->address)
                        <div class="contact-info">
                            <div class="contact-icon-circle"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <h5>Address:</h5>
                                <span>{{ $footer->address }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="widget-title">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><i class="fa-solid fa-angle-right"></i><a href="{{ url('/our-courses') }}"> Online Courses</a></li>
                        <li><i class="fa-solid fa-angle-right"></i><a href="{{ url('/audio') }}"> Audio Listening</a></li>
                        <li><i class="fa-solid fa-angle-right"></i><a href="{{ url('/ramadan') }}"> Sehri & Iftar</a></li>
                        <li><i class="fa-solid fa-angle-right"></i><a href="{{ url('/events') }}"> Our Events</a></li>
                        <li><i class="fa-solid fa-angle-right"></i><a href="{{ url('/hifz') }}"> Quran Hifz Classes</a></li>
                        <li><i class="fa-solid fa-angle-right"></i><a href="{{ url('/about') }}"> About</a></li>
                        <li><i class="fa-solid fa-angle-right"></i><a href="{{ url('/services') }}"> Our Services</a></li>
                        <li><i class="fa-solid fa-angle-right"></i><a href="{{ url('/donate') }}"> Urgent Donation</a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Lower Footer --}}
        <div class="wpo-lower-footer">
            <p>© {{ now()->year }} <b>{{ config('app.name', 'QuranHome') }}</b>. All rights reserved.</p>
            <div>
                <a href="{{ url('/terms') }}">Terms</a> | <a href="{{ url('/privacy') }}">Privacy</a>
            </div>
        </div>
    </div>
</footer>
