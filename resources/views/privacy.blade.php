@extends('layouts.app')

@section('content')

<style>
    h1{
         display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-size: 80px;
        background: radial-gradient(
        circle,
        rgba(255,0,234,1) 0%,
        rgba(255,255,255,1) 50%,
        rgba(255,0,234,1) 100%
    );

    -webkit-background-clip:text;
    -webkit-text-fill-color: transparent;

    text-shadow: 0 0 10px #ff00ea,0 0 20px #ff00ea,0 0 40px #ff00ea;
    }
    .privacy{
         display: block;
    background:transparent;
    max-width:1400px;
    width:90%;
    margin:20px auto;
    }
    
</style>

<h1>Privacy Policy</h1>

<div class="privacy">
    <p><strong>Introduction</strong></p>
    Welcome to the privacy policy of Carpatic LTD.

Carpatic LTD values your privacy and is committed to protecting your personal information. This Privacy Policy explains how we collect, use, store, and safeguard your personal data whenever you visit or interact with our website, regardless of where you access it from. It also outlines your privacy rights and the legal protections available to you.

    <p><strong>Purpose of This Privacy Policy</strong></p>
    The purpose of this Privacy Policy is to clearly explain how Carpatic LTD collects and processes personal information through your use of our website, including any information you provide when:

subscribing to newsletters or updates;
purchasing products or services;
entering competitions, raffles, or giveaways; or
contacting us through the website.
Our website and services are not intended for children, and we do not knowingly collect personal information relating to individuals under the applicable legal age.

This Privacy Policy should be read together with any additional privacy notices or fair processing information we may provide on specific occasions when collecting or processing your data. These additional notices supplement this Privacy Policy and do not replace it.
    <p><strong>Contact Information</strong></p>
    If you have any questions regarding this Privacy Policy, your personal information, or your legal rights, please contact us using the details below:

<p>Company Name: RGIVEAWAY LTD</p>
<p>Data Privacy Manager: Alexandroae Claudiu</p>
<p>Phone Number: 0735916451</p>
<p>Website: RGIVEAWAY</p>
    <p><strong></strong></p>
    <p><strong></strong></p>
</div>


@endsection