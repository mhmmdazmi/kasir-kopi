@extends('layout.app')
@section('title', 'contact_us')
@section('content')
<div class="container">
    <h1>Contact Us</h1>

    <div>
        <p>Alamat Lengkap:</p>
        <p>Jln. Desa Limbangansari Kp. Mekarsari, Cianjur, Jawa Barat, Indonesia</p>
        <p>Foto Kantor:</p>
        <img src="https://obs.line-scdn.net/0h6hSIxcAhaUduMEJPLVAWEFRmaihdXHpECgY4WT5eN3MWB3kUBlQgckJjZX8WCS4ZB1cmJk04cnYTUH0XVlUg/w644" alt="Foto Kantor">
    </div>
    <div>
        <p>Google Maps Lokasi Kantor:</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d247.6028737069618!2d107.1261032475762!3d-6.812843587729818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1713855671249!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
    <div>
        <h2>Kirim Pertanyaan kepada Developer</h2>
        <form method="POST" action="{{ url('contact.submit') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="message">Pertanyaan:</label>
                <textarea id="message" name="message" rows="5" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
@endsection